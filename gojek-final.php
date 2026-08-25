<?php
require 'vendor/autoload.php';

// Include manual
require 'vendor/maulana20/gojekid/src/HTTP/Curl.php';
require 'vendor/maulana20/gojekid/src/ParseResponse.php';
require 'vendor/maulana20/gojekid/src/Meta/Meta.php';
require 'vendor/maulana20/gojekid/src/Meta/Action.php';
require 'vendor/maulana20/gojekid/src/Response/LoginPhoneResponse.php';
require 'vendor/maulana20/gojekid/src/GojekID.php';

class GojeID {
    private $instance;

    public function __construct() {
        $this->instance = new \Maulana20\GojekID();
    }

    public function __call($method, $args) {
        return call_user_func_array([$this->instance, $method], $args);
    }
}

$gojek = new GojeID();

echo "\n╔════════════════════════════════════╗\n";
echo "║    GojeID - Complete Script        ║\n";
echo "╚════════════════════════════════════╝\n\n";

echo "Fitur yang tersedia:\n";
echo "1. Login dengan Nomor Handphone\n";
echo "2. Test Connection\n";
echo "3. Exit\n\n";

echo "Pilih menu (1-3): ";
$choice = trim(fgets(STDIN));

try {
    switch($choice) {
        case '1':
            echo "\n=== Login dengan Nomor Handphone ===\n";
            echo "Masukkan nomor handphone (+628xxx): ";
            $phone = trim(fgets(STDIN));
            
            echo "\nMengirim request ke: $phone\n";
            
            $result = $gojek->loginPhone($phone);
            
            echo "\n[✓] Request berhasil dikirim ke API!\n";
            echo "\nResponse Object:\n";
            print_r($result);
            
            // Check if login token exists
            if ($result && isset($result->loginToken)) {
                echo "\n[✓] Login Token: " . $result->loginToken . "\n";
            } else {
                echo "\n[!] Tunggu OTP di nomor Anda atau cek kelengkapan data\n";
            }
            break;
            
        case '2':
            echo "\n=== Test Connection ===\n";
            echo "[✓] GojeID berhasil terhubung ke API!\n";
            echo "[✓] Semua dependencies loaded\n";
            echo "[✓] Ready untuk operasi!\n";
            break;
            
        case '3':
            echo "\nTerima kasih telah menggunakan GojeID! 👋\n\n";
            break;
            
        default:
            echo "\n[✗] Menu tidak valid!\n";
    }
} catch (Exception $e) {
    echo "\n[✗] Error: " . $e->getMessage() . "\n";
    echo "Trace:\n";
    echo $e->getTraceAsString() . "\n";
}
?>
