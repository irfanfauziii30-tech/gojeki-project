<?php
require 'vendor/autoload.php';

use Maulana20\GojekID;

echo "============ GojeID Demo ============\n";
echo "✓ GojeID berhasil diinstall!\n";
echo "=====================================\n\n";

try {
    $gojek = new GojekID();
    echo "[SUCCESS] GojekID initialized\n";
    echo "Status: Ready to use\n";
} catch (Exception $e) {
    echo "[ERROR] " . $e->getMessage() . "\n";
}
?>
