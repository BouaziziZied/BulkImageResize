# BulkImageResize

Using this package you can resize all images inside specific folder

## Usage

Put images inside `images` folder and run `php index.php` from the
project's root directory.

If you want to integrate this into your project use class ImageResize

```php
$resizeImage = new ImageResize();
$resizeImage->resizeAllImages('directory under which you want to resize');
```
