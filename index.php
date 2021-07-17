<?php

require 'vendor/autoload.php';
use Imagine\Image\Box;
        
class ImageResize {
  public $imagine;

  public function __construct() {
    $this->imagine = new Imagine\Gd\Imagine();
  }
  
  // Resize all images inside specific folder
  public function resizeAllImages($dir) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            // Resize image
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            if (in_array($extension, ['jpg', 'png', 'jpeg'])){
              $this->imagine->open($path)
                    ->thumbnail(new Box(200, 200))
                    ->save($path);
            }        
        } else if ($value != "." && $value != "..") {
            resizeAllImages($path);
        }
    }
  }
}

$imageResize = new ImageResize();

$imageResize->resizeAllImages('images');