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

// Test
echo "[✓] Semua classes loaded!\n";
$gojek = new GojeID();
echo "[✓] GojeID initialized\n";

try {
    $result = $gojek->loginPhone('+6283849222586');
    echo "[✓] Login berhasil!\n";
    print_r($result);
} catch (Exception $e) {
    echo "[✗] Error: " . $e->getMessage() . "\n";
}
?>
