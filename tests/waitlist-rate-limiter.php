<?php

require_once __DIR__ . '/../app/waitlist-rate-limiter.php';

function expectSame(mixed $expected, mixed $actual, string $message): void
{
    if ($expected !== $actual) {
        fwrite(STDERR, $message . PHP_EOL);
        exit(1);
    }
}

$directory = sys_get_temp_dir() . '/ringside-rate-limit-test-' . bin2hex(random_bytes(8));
$now = 1_800_000_000;

try {
    for ($attempt = 1; $attempt <= 20; $attempt++) {
        expectSame(0, consumeWaitlistRateLimit('192.0.2.10', 'test-secret', $directory, $now), 'An attempt below the limit should pass.');
    }

    expectSame(3600, consumeWaitlistRateLimit('192.0.2.10', 'test-secret', $directory, $now), 'An attempt over the limit should be throttled for the remainder of its window.');
    expectSame(3599, consumeWaitlistRateLimit('192.0.2.10', 'test-secret', $directory, $now + 1), 'The retry delay should shrink as the window expires.');
    expectSame(0, consumeWaitlistRateLimit('192.0.2.11', 'test-secret', $directory, $now), 'A different client should have an independent limit.');
    expectSame(0, consumeWaitlistRateLimit('192.0.2.10', 'test-secret', $directory, $now + 3600), 'The limit should reset after one hour.');

    $blockedPath = $directory . '-blocked';
    file_put_contents($blockedPath, 'not a directory');
    expectSame(null, consumeWaitlistRateLimit('192.0.2.12', 'test-secret', $blockedPath, $now), 'The limiter should fail closed when storage cannot be created.');
    unlink($blockedPath);

    $storedState = file_get_contents($directory . '/waitlist.json');

    if ($storedState === false || str_contains($storedState, '192.0.2.10')) {
        fwrite(STDERR, "The limiter must not persist a raw visitor address.\n");
        exit(1);
    }

    fwrite(STDOUT, "Waitlist rate limiter checks passed.\n");
} finally {
    $stateFile = $directory . '/waitlist.json';

    if (is_file($stateFile)) {
        unlink($stateFile);
    }

    if (is_dir($directory)) {
        rmdir($directory);
    }
}
