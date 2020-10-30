# Eloquent Custom Fields

This package gives a basic way of attaching arbitrary fields to an Eloquent model. The Custom Fields are simply a
collection of Eloquent models that are related to your own models via a `MorphToMany` relation.

## Instalation

This package can be installed through Composer.

```shell
composer require stelianandrei/eloquent-custom-fields
```

Make sure you publish the required migration:

```shell
php artisan vendor:publish --provider="StelianAndrei\EloquentCustomFields\ServiceProvider" --tag="migrations"
```

Optionally, to publish the configuration:

```shell
php artisan vendor:publish --provider="StelianAndrei\EloquentCustomFields\ServiceProvider" --tag="config"
```

## The CustomField model

The model is very simple, it has just two attributes:

- `label` - (required) mainly used to identify the CustomField in a human-readable form
- `type` - (optional) what the custom field represents. This can be used to determine how to deal with that field (eg. "
  text", "email", "textarea") or something else as a clue for data manipulation (eg. "json", "currency"
  , "lat_long").

If you need to add extra functionality to this model, just create a new model, extend
the `StelianAndrei\EloquentCustomFields\CustomField` class and update the value for `field_class` in the config file (
make sure you publish it first, see above).

## Usage

In order to allow your models to use this functionality, you need to use the `HasCustomFields` trait:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use StelianAndrei\EloquentCustomFields\HasCustomFields;

class MyModel extends Model
{
    use HasCustomFields;

    //
}
```

Create the fields as you would create any other model then associate it to your own models with the desired value.

```php

use StelianAndrei\EloquentCustomFields\CustomField;

$firstName = CustomField::new(['label' => 'First Name']);
$lastName = CustomField::new(['label' => 'Last Name']);

$myModel->customFields()->attach($firstName, ['value' => 'John']);
$myModel->customFields()->attach($lastName, ['value' => 'Doe']);
```

Any other methods of creating or removing relations between models. should also work.