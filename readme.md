# ACF Menu Depth Extension for Webpacket Starter Theme
This extension enables you to set the depth of the menu field in ACF. This is useful when you want to display some fields only on the first level of the menu and other fields on the second level of the menu.
## Dependencies
```
ACF Pro plugin
```
## Install guide
1. Clone the files into the theme folder.
2. Set the desired number of levels you want to display by updating the `$levels` variable inside the extension file.
3. Update the `EXTENSIONS` array inside the `config.php` file.
```php
'EXTENSIONS' => [
    'AcfMenuDepthExtension'
]
```
