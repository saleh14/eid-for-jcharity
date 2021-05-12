<!DOCTYPE html>
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>عيد سعيد</title>
    <style>
      .hide {
        display: none;
      }
      .lds-grid {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
      }
      .lds-grid div {
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #fff;
        animation: lds-grid 1.2s linear infinite;
      }
      .lds-grid div:nth-child(1) {
        top: 8px;
        left: 8px;
        animation-delay: 0s;
      }
      .lds-grid div:nth-child(2) {
        top: 8px;
        left: 32px;
        animation-delay: -0.4s;
      }
      .lds-grid div:nth-child(3) {
        top: 8px;
        left: 56px;
        animation-delay: -0.8s;
      }
      .lds-grid div:nth-child(4) {
        top: 32px;
        left: 8px;
        animation-delay: -0.4s;
      }
      .lds-grid div:nth-child(5) {
        top: 32px;
        left: 32px;
        animation-delay: -0.8s;
      }
      .lds-grid div:nth-child(6) {
        top: 32px;
        left: 56px;
        animation-delay: -1.2s;
      }
      .lds-grid div:nth-child(7) {
        top: 56px;
        left: 8px;
        animation-delay: -0.8s;
      }
      .lds-grid div:nth-child(8) {
        top: 56px;
        left: 32px;
        animation-delay: -1.2s;
      }
      .lds-grid div:nth-child(9) {
        top: 56px;
        left: 56px;
        animation-delay: -1.6s;
      }
      @keyframes lds-grid {
        0%,
        100% {
          opacity: 1;
        }
        50% {
          opacity: 0.5;
        }
      }

      .loading {
        opacity: 0;
        transition: opacity 0.23s;
        transition-delay: 0.3s;
      }
      .loaded {
        opacity: 1;
      }

      img {
        width: 100%;
        max-width: 100%;
      }
      body {
        min-height: 100vh;
        display: grid;
        grid-template-rows: auto;
        justify-content: center;
        align-items: center;
        margin: 0;
        background-color: black;
      }
    </style>
  </head>
  <body>
    <div id="lds-grid">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    <a href="./assets/text.jpeg" target="_blank">
      <img src="<?php echo $output; ?>" />
    </a>
  </body>
  <script>
    const img = document.querySelector('img')
    const grid = document.querySelector('#lds-grid')
    let stillLoading = true
    new Promise((r) => setTimeout(r, 600)).then(() =>{
      if(stillLoading)
        grid.classList.add('lds-grid')
    })
    img.onload = () => {
    stillLoading = false
      img.classList.add('loaded')
      grid.classList.remove('lds-grid')
      grid.classList.add('hide')

      // window.location.href = window.location.origin + '/assets/text.jpeg'
    }
  </script>
</html>



