# Gravatar

Install Gravatar using composer:
`composer require dionbosschieter/gravatar`

Implement the avataruserinterface on your users model
`use Gravatar\UserGravatarInterface`

The gravatar class expects a `getEmailAdres` method on your user model
```php
<?php

use Gravatar\UserGravatarInterface;

class User extends Model  
{
  
  public function getEmailAdres()
  {
      return $this->email;
  }
}
```

##Usage 

```php
$avatar = new \Gravatar\Gravatar($usermodel);
$avatar->getImageUrl();
$avatar->getImageUrlForSize();
```

Register the class using your frameworks dependency container:
```php
// Laravel
App::bind('gravatar', function()
{
    $grav = new \Gravatar\Gravatar(app('auth')->user());

    return $grav;
});
```
