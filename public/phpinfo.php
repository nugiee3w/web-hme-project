<?php
// File untuk memeriksa versi PHP dan informasi sistem
echo "<h1>Informasi PHP untuk Web HME Project</h1>";
echo "<h2>Versi PHP: " . PHP_VERSION . "</h2>";
echo "<h3>Informasi Detail:</h3>";
echo "<ul>";
echo "<li><strong>PHP Version:</strong> " . phpversion() . "</li>";
echo "<li><strong>PHP SAPI:</strong> " . php_sapi_name() . "</li>";
echo "<li><strong>Operating System:</strong> " . PHP_OS . "</li>";
echo "<li><strong>Server Software:</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'N/A') . "</li>";
echo "<li><strong>Document Root:</strong> " . ($_SERVER['DOCUMENT_ROOT'] ?? 'N/A') . "</li>";
echo "</ul>";

echo "<h3>Extensions yang Terinstall:</h3>";
$extensions = get_loaded_extensions();
sort($extensions);
echo "<div style='columns: 3; column-gap: 20px;'>";
foreach($extensions as $ext) {
    echo "• " . $ext . "<br>";
}
echo "</div>";

echo "<h3>Konfigurasi PHP Penting:</h3>";
echo "<ul>";
echo "<li><strong>Memory Limit:</strong> " . ini_get('memory_limit') . "</li>";
echo "<li><strong>Max Execution Time:</strong> " . ini_get('max_execution_time') . " seconds</li>";
echo "<li><strong>Max Upload Size:</strong> " . ini_get('upload_max_filesize') . "</li>";
echo "<li><strong>Max Post Size:</strong> " . ini_get('post_max_size') . "</li>";
echo "<li><strong>Display Errors:</strong> " . (ini_get('display_errors') ? 'On' : 'Off') . "</li>";
echo "</ul>";

echo "<hr>";
echo "<small>Generated on: " . date('Y-m-d H:i:s') . "</small>";
?>
