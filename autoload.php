<?php
spl_autoload_register(function ($class) {
    // Define multiple namespace prefixes and their corresponding base directories
    $namespaceMap = [
        'Iterator\\' => __DIR__ . '/pattern/',
    ];

    foreach ($namespaceMap as $prefix => $base_dir) {
        $len = strlen($prefix);

        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }

        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});
