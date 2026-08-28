<?php
// Script de despliegue automático para cPanel (Webhook)
// Protegido con un token secreto

$secret_token = "latam_deploy_2026_secreto";

if (!isset($_GET['token']) || $_GET['token'] !== $secret_token) {
    http_response_code(403);
    die("Acceso denegado.");
}

$themeDir = __DIR__ . "/wp-content/themes/buildlatam-theme";
$tmpZip = __DIR__ . "/theme.zip";
$extractTo = __DIR__ . "/wp-content/themes/";

echo "Iniciando despliegue...<br>";

// 1. Descargar el zip de GitHub
echo "Descargando tema desde GitHub...<br>";
$zipUrl = "https://github.com/RodrigoAlonsoDc/buyinlatam-theme/archive/refs/heads/main.zip";
$zipData = @file_get_contents($zipUrl);
if ($zipData === false) {
    die("Error: No se pudo descargar el archivo zip de GitHub.");
}
file_put_contents($tmpZip, $zipData);

// 2. Eliminar el tema antiguo (función recursiva)
function deleteDir($dirPath) {
    if (!is_dir($dirPath)) return;
    $files = scandir($dirPath);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $path = $dirPath . '/' . $file;
            is_dir($path) ? deleteDir($path) : unlink($path);
        }
    }
    rmdir($dirPath);
}

if (file_exists($themeDir)) {
    echo "Eliminando versión anterior del tema...<br>";
    deleteDir($themeDir);
}

// 3. Descomprimir el nuevo zip
echo "Descomprimiendo archivos...<br>";
$zip = new ZipArchive;
if ($zip->open($tmpZip) === TRUE) {
    $zip->extractTo($extractTo);
    $zip->close();
    
    // El zip de GitHub siempre se extrae en una carpeta llamada "buyinlatam-theme-main"
    // Lo renombramos a "buildlatam-theme" que es el nombre real de tu tema
    rename($extractTo . "buyinlatam-theme-main", $themeDir);
    
    // Limpiar zip temporal
    unlink($tmpZip);
    
    echo "<b>¡Despliegue completado con éxito!</b>";
} else {
    die("Error: No se pudo descomprimir el archivo zip.");
}
?>
