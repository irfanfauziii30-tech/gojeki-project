<?php
require 'vendor/autoload.php';

// Wrapper untuk GojeID
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

echo "========== Login dengan Nomor HP ==========\n\n";

$phone = '+62812345678';

try {
    echo "Mengirim request login ke: $phone\n";
    
    $response = $gojek->loginPhone($phone);
    
    echo "\n[✓] Login berhasil!\n";
    echo "Response:\n";
    print_r($response);
    
} catch (Exception $e) {
    echo "\n[✗] Error: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
?>
