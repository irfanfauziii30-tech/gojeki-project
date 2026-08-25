<?php
require 'vendor/autoload.php';

$files = [
    'vendor/maulana20/gojekid/src/HTTP/Curl.php',
    'vendor/maulana20/gojekid/src/ParseResponse.php',
    'vendor/maulana20/gojekid/src/GojekID.php',
];

foreach ($files as $file) {
    if (file_exists($file)) {
        require $file;
    }
}

class GojeIDManager {
    private $gojek;
    
    public function __construct() {
        $this->gojek = new \Maulana20\GojekID();
    }
    
    public function loginPhone($phone) {
        return $this->gojek->loginPhone($phone);
    }
}

if (php_sapi_name() === 'cli') {
    echo "[✓] GojeID Manager Ready!\n";
}
?>
