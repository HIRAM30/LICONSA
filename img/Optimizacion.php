<?php
function optimizeImage($source, $destination, $quality) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
        imagejpeg($image, $destination, $quality);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
        imagepng($image, $destination, $quality / 10);
    }
    imagedestroy($image);
}

$source_img = 'uploads/source.jpg';
$destination_img = 'uploads/optimized.jpg';
$quality = 75;
optimizeImage($source_img, $destination_img, $quality);
?>
