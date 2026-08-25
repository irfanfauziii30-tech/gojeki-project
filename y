<?php
require 'vendor/autoload.php';

use Maulana20\GojeID;

echo "============ GojeID Demo ============\n";
echo "✓ GojeID berhasil diinstall!\n";
echo "=====================================\n\n";

try {
    $gojek = new GojeID();
    echo "[SUCCESS] GojeID initialized\n";
    echo "Status: Ready to use\n";
} catch (Exception $e) {
    echo "[ERROR] " . $e->getMessage() . "\n";
}
?>
