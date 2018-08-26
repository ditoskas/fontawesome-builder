# fontawesome-builder
Render the font-awesome icons using php

Add to the composer.json file the below repository and require section to install the library

```javascript
  {
    "require": {
      "ditoskas/fontawesome-builder": "dev-master"
    }
  }
```

or run 

```php
composer require ditoskas/fontawesome-builder
```

To use the library on the project, add the use statement, declare a FaIcon model or use the static FontAwesomeBuilder and call the icon function. 

```php
<?php
use \FontAwesomeBuilder\Models\FaIcon;

$faIcon = new FaIcon();
echo $faIcon->create()->icon(FontAwesomeClassEnum::STROOPWAFEL);

```
Check the [documentation](https://ditoskas.github.io/fontawesome-builder/) page with more examples
