<?php
require 'vendor/autoload.php';

use Maulana20\GojekID;

$gojek = new GojekID();

echo "========== Login dengan Nomor HP ==========\n\n";

// Ganti dengan nomor kamu (format: +628xxxx... atau 08xxxx...)
$phone = '+62812345678';

try {
    echo "Mengirim request login ke: $phone\n";
    
    $response = $gojek->loginPhone($phone);
    
    echo "\n[✓] Login berhasil!\n";
    echo "Response:\n";
    print_r($response);
    
} catch (Exception $e) {
    echo "\n[✗] Error: " . $e->getMessage() . "\n";
}
?>
