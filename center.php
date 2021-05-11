<?php

$user=$_POST["name"];
$source='assets/img/Eid1.jpg';
$font = $font = dirname(__FILE__) . '/fonts/THARWATEMARARUQAA.ttf';  

$font_size = 20;
$angle = 45;
$output= "assets/img/text.jpg";


require('./I18N/Arabic.php'); 
    $Arabic = new I18N_Arabic('Glyphs');
  $text = $Arabic->utf8Glyphs($user);


// Create Image From Existing File
  $image = imagecreatefromjpeg($source);

// Allocate A Color For The Text
 $white = imagecolorallocate($image,91,88,55);
 $color =imagecolorallocate($image, 255, 255, 255);
// Get image Width and Height
$image_width = @imagesx($image);  
$image_height = @imagesy($image);

// Get Bounding Box Size
$text_box = @imagettfbbox($font_size,$angle,$font,$user);


// Get your Text Width and Height
    $text_width = $text_box[2]-$text_box[0];
    $text_height = $text_box[7]-$text_box[1];

// Calculate coordinates of the text
$x = ($image_width/2) - ($text_width/2);
$y = ($image_height/3) - ($text_height/2);



// Add the text
imagettftext($image, $font_size, 0,$x, $y+450, $white, $font, $text);


  // Send Image to Browser
 // @imagejpeg($image,$output,99);

// Add the text
//imagettftext($image, 20, 0, 10, 20, $white, $font, $text);

// Using imagepng() results in clearer text compared with imagejpeg()
imagejpeg($image,$output,99);
//@imagedestroy($image);
?>
<img src="<?php echo $output; ?>">


