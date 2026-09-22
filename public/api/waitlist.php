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

header('Content-Type: application/json');
header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    exit;
}

$email = filter_var($input['email'] ?? '', FILTER_VALIDATE_EMAIL);

if (!$email) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email']);
    exit;
}

$product = $input['product'] ?? 'ringside';

if ($product !== 'ringside') {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid product']);
    exit;
}

$apiKey = getenv('RESEND_API_KEY') ?: ($_ENV['RESEND_API_KEY'] ?? '');

if (!$apiKey) {
    http_response_code(500);
    echo json_encode(['error' => 'API key not configured']);
    exit;
}

// First, ensure we have an audience. We'll create contacts directly.
$ch = curl_init('https://api.resend.com/audiences');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
    ],
]);
$responseBody = curl_exec($ch);
$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($responseBody === false || $responseCode < 200 || $responseCode >= 300) {
    http_response_code(502);
    echo json_encode(['error' => 'Waitlist service unavailable']);
    exit;
}

$response = json_decode($responseBody, true);

$audienceId = null;
if (!empty($response['data'])) {
    foreach ($response['data'] as $audience) {
        if (stripos($audience['name'], 'waitlist') !== false || stripos($audience['name'], 'Ringside') !== false) {
            $audienceId = $audience['id'];
            break;
        }
    }
    // Fall back to first audience
    if (!$audienceId) {
        $audienceId = $response['data'][0]['id'] ?? null;
    }
}

// If no audience exists, create one
if (!$audienceId) {
    $ch = curl_init('https://api.resend.com/audiences');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS => json_encode(['name' => 'Waitlist']),
    ]);
    $resultBody = curl_exec($ch);
    $resultCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($resultBody === false || $resultCode < 200 || $resultCode >= 300) {
        http_response_code(502);
        echo json_encode(['error' => 'Waitlist service unavailable']);
        exit;
    }

    $result = json_decode($resultBody, true);
    $audienceId = $result['id'] ?? null;
}

if (!$audienceId) {
    http_response_code(500);
    echo json_encode(['error' => 'Could not find or create audience']);
    exit;
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
    echo json_encode(['success' => true]);
} else {
    http_response_code(502);
    echo json_encode(['error' => 'Waitlist service unavailable']);
}
