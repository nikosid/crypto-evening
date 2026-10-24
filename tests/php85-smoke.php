<?php

$directory = sys_get_temp_dir() . '/crypto-evening-php85-' . bin2hex(random_bytes(6));
mkdir($directory, 0700);
$transport = $directory . '/sendmail';
$record = $directory . '/message';
file_put_contents($transport, "#!/bin/sh\ncat > " . escapeshellarg($record) . "\n");
chmod($transport, 0700);
try {
    foreach (['mail.php', 'mail2.php'] as $handler) {
        foreach ([false, true] as $valid) {
            @unlink($record);
            $data = $valid ? ['Theme' => 'PHP85 fixture', 'Name' => 'PHP85 fixture',
                'Email' => 'fixture@example.test', 'Telegram/WhatsApp' => 'fixture'] : [];
            $code = 'set_error_handler(static function($n,$m){throw new RuntimeException($m);}); '
                . '$_GET = ' . var_export($data, true) . '; require '
                . var_export(dirname(__DIR__) . '/' . $handler, true) . ';';
            $process = proc_open([PHP_BINARY, '-d', 'error_reporting=32767', '-d',
                'sendmail_path=' . escapeshellarg($transport), '-r', $code],
                [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
            $output = stream_get_contents($pipes[1]);
            $errors = stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            if (proc_close($process) !== 0 || $errors !== '' || $valid !== file_exists($record)
                || ($valid && !str_contains(file_get_contents($record), 'PHP85 fixture'))
                || (!$valid && $output !== 'Invalid form data')) {
                throw new RuntimeException($handler . ' transport/validation failed: ' . $errors);
            }
        }
    }
    echo "PASS: both forms use the intercepted sendmail transport; empty requests send nothing\n";
} finally {
    @unlink($record);
    unlink($transport);
    rmdir($directory);
}
