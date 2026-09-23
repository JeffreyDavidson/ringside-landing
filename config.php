<?php

return [
    'production' => false,
    'baseUrl' => '',
    'title' => 'Ringside',
    'description' => 'Wrestling promotion management for independent promoters.',
    'cssVersion' => substr(hash_file('sha256', __DIR__ . '/source/css/tailwind.css'), 0, 16),
    'build' => [
        'destination' => 'public',
    ],
    'collections' => [],
];
