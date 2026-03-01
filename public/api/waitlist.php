<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

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
$email = filter_var($input['email'] ?? '', FILTER_VALIDATE_EMAIL);

if (!$email) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email']);
    exit;
}

$product = $input['product'] ?? 'ringside';

$apiKey = 're_QE74YDW7_LDWWYLNCnisMVscoxLfwA9ZK';

// First, ensure we have an audience. We'll create contacts directly.
$ch = curl_init('https://api.resend.com/audiences');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
    ],
]);
$response = json_decode(curl_exec($ch), true);
curl_close($ch);

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
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS => json_encode(['name' => 'Waitlist']),
    ]);
    $result = json_decode(curl_exec($ch), true);
    curl_close($ch);
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
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => json_encode([
        'email' => $email,
        'unsubscribed' => false,
        'properties' => [
            ['key' => 'product', 'value' => 'ringside'],
        ],
    ]),
]);

$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode >= 200 && $httpCode < 300) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to add contact', 'details' => json_decode($result, true)]);
}
