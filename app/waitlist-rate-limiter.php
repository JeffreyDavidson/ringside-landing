<?php

function consumeWaitlistRateLimit(
    string $clientAddress,
    string $secret,
    string $storageDirectory,
    int $now,
    int $maxAttempts = 20,
    int $windowSeconds = 3600,
): ?int {
    if (!is_dir($storageDirectory)) {
        $parentDirectory = dirname($storageDirectory);

        if (file_exists($storageDirectory) || !is_dir($parentDirectory) || !is_writable($parentDirectory)) {
            return null;
        }

        if (!mkdir($storageDirectory, 0700, true) && !is_dir($storageDirectory)) {
            return null;
        }
    }

    if (is_link($storageDirectory) || !is_writable($storageDirectory)) {
        return null;
    }

    $handle = fopen($storageDirectory . '/waitlist.json', 'c+');

    if ($handle === false) {
        return null;
    }

    if (!flock($handle, LOCK_EX)) {
        fclose($handle);

        return null;
    }

    try {
        rewind($handle);
        $contents = stream_get_contents($handle);

        if ($contents === false) {
            return null;
        }

        $records = $contents === '' ? [] : json_decode($contents, true);

        if (!is_array($records)) {
            return null;
        }

        foreach ($records as $fingerprint => $record) {
            if (!is_array($record) || !isset($record['window_started_at'], $record['attempts'])) {
                unset($records[$fingerprint]);
                continue;
            }

            if ((int) $record['window_started_at'] > $now
                || (int) $record['window_started_at'] + $windowSeconds <= $now) {
                unset($records[$fingerprint]);
            }
        }

        $fingerprint = hash_hmac('sha256', $clientAddress, $secret);
        $record = $records[$fingerprint] ?? ['window_started_at' => $now, 'attempts' => 0];
        $windowStartedAt = (int) $record['window_started_at'];

        if ((int) $record['attempts'] >= $maxAttempts) {
            return max(1, $windowStartedAt + $windowSeconds - $now);
        }

        if (!isset($records[$fingerprint]) && count($records) >= 10000) {
            return $windowSeconds;
        }

        $records[$fingerprint] = [
            'window_started_at' => $windowStartedAt,
            'attempts' => (int) $record['attempts'] + 1,
        ];

        $encoded = json_encode($records);

        if (!is_string($encoded) || !rewind($handle) || !ftruncate($handle, 0)) {
            return null;
        }

        $written = fwrite($handle, $encoded);

        if ($written !== strlen($encoded) || !fflush($handle)) {
            return null;
        }

        return 0;
    } finally {
        flock($handle, LOCK_UN);
        fclose($handle);
    }
}
