<?php

$img = @imagecreatefromjpeg('assets/img/Eid.JPG');
$white = @imagecolorallocate($img, 255, 255, 255);
$font = "fonts\arial.ttf";
@imagettftext($img, 24, 0, 5, 24, $white, $font, "TEXT");
@imagejpeg($img, "SAVE.JPG", 100);

?>
