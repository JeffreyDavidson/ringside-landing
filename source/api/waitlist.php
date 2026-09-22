<?php

// Load .env from project root
$envFile = __DIR__ . '/../../.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (str_starts_with(trim($line), '#')) continue;
        if (str_contains($line, '=')) {
            putenv(trim($line));
        }
    }
}

header('Cache-Control: no-store');

$contentType = strtolower($_SERVER['CONTENT_TYPE'] ?? '');
$accept = strtolower($_SERVER['HTTP_ACCEPT'] ?? '');
$isJsonRequest = str_contains($contentType, 'application/json');
$expectsHtml = !$isJsonRequest && str_contains($accept, 'text/html');

function respond(int $status, bool $success, bool $expectsHtml, string $message): void
{
    http_response_code($status);

    if (!$expectsHtml) {
        header('Content-Type: application/json');
        echo json_encode($success ? ['success' => true] : ['error' => $message]);
        exit;
    }

    header('Content-Type: text/html; charset=UTF-8');
    $title = $success ? 'You’re on the list.' : 'We couldn’t complete your signup.';
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $escapedMessage = htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $destination = $success ? '/#top' : '/#waitlist';
    $linkLabel = $success ? 'Back to Ringside' : 'Return to signup';

    echo <<<HTML
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="theme-color" content="#101112">
            <title>{$escapedTitle} | Ringside</title>
            <link rel="stylesheet" href="/css/tailwind.css">
        </head>
        <body>
            <main class="mx-auto grid min-h-screen w-[calc(100%-2.5rem)] max-w-[80rem] content-center gap-6 py-12 sm:w-[calc(100%-6rem)]">
                <p class="text-xs font-bold uppercase tracking-[0.1em] text-ringside-signal">Founding access</p>
                <h1 class="max-w-[16ch] font-display text-[clamp(2.5rem,6vw,5rem)] leading-[1.05]">{$escapedTitle}</h1>
                <p class="max-w-2xl text-lg leading-relaxed text-ringside-muted">{$escapedMessage}</p>
                <a class="mt-2 inline-flex min-h-12 w-fit items-center border border-ringside-outline px-6 py-3 text-sm font-bold hover:border-ringside-white focus-visible:outline-3 focus-visible:outline-ringside-white focus-visible:outline-offset-2" href="{$destination}">{$linkLabel}</a>
            </main>
        </body>
        </html>
        HTML;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, false, $expectsHtml, 'Please use the signup form to join the list.');
}

$input = $isJsonRequest
    ? json_decode(file_get_contents('php://input'), true)
    : $_POST;

if (!is_array($input)) {
    respond(400, false, $expectsHtml, 'Please enter a valid email address and try again.');
}

$email = filter_var($input['email'] ?? '', FILTER_VALIDATE_EMAIL);

if (!$email) {
    respond(400, false, $expectsHtml, 'Please enter a valid email address and try again.');
}

$product = $input['product'] ?? 'ringside';

if ($product !== 'ringside') {
    respond(400, false, $expectsHtml, 'We couldn’t process that signup. Please return to the form and try again.');
}

$apiKey = getenv('RESEND_API_KEY') ?: ($_ENV['RESEND_API_KEY'] ?? '');
$audienceId = getenv('RESEND_AUDIENCE_ID') ?: ($_ENV['RESEND_AUDIENCE_ID'] ?? '');

if (!$apiKey || !$audienceId) {
    respond(500, false, $expectsHtml, 'The signup service is temporarily unavailable. Please try again later.');
}

// Add contact to audience
$ch = curl_init("https://api.resend.com/audiences/{$audienceId}/contacts");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => json_encode([
        'email' => $email,
        'unsubscribed' => false,
        'properties' => (object) ['product' => 'ringside'],
    ]),
]);

$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode >= 200 && $httpCode < 300) {
    respond(200, true, $expectsHtml, 'Thanks for joining the Ringside founding list. We’ll be in touch.');
} else {
    respond(502, false, $expectsHtml, 'We couldn’t save your signup. Please try again.');
}
