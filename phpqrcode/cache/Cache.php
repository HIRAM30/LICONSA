<?php
$cachefile = 'cache/' . md5($_SERVER['REQUEST_URI']) . '.html';
$cachetime = 600; // 10 minutos

if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    echo "<!-- Cached copy, generated " . date('H:i', filemtime($cachefile)) . " -->\n";
    readfile($cachefile);
    exit;
}

ob_start();
?>

<!-- Contenido de la página -->

<?php
file_put_contents($cachefile, ob_get_contents());
ob_end_flush();
?>
