# Nova TextLinked custom field


[![Packagist Version](https://img.shields.io/packagist/v/lednerb/nova-text-linked-field.svg?style=flat-square)](https://packagist.org/packages/lednerb/nova-text-linked-field)
[![Packagist Downloads](https://img.shields.io/packagist/dt/lednerb/nova-text-linked-field.svg?style=flat-square)](https://packagist.org/packages/lednerb/nova-text-linked-field)


This package is an enhanced version of the original [nikans/text-linked](https://github.com/nikans/text-linked) field with additional features:
- open links in new tabs / targets
- trim functionality with nova tooltip support

**NB:** The field is compatible to the original one, if you plan to change to this package you only have to update the imports.

-----

Nova custom Text Field with a link to a resource (or any URL) on index screen.

Nova links ID fields to a resource by default. 
The custom field is useful if you're using a [text ID field](https://github.com/laravel/nova-issues/issues/268) 
or want to **link a resource's title**, as shown below.

![Nova TextLinked Field Example](https://github.com/lednerb/nova-text-linked-field/blob/master/nova-text-linked-field-example.png "Nova TextLinked Field Example")

The field behaves just like the default text field on detail and form screens.


## Installation

```bash
composer require lednerb/nova-text-linked-field
```

## Usage options

### Automatically link a resource to a title or text ID field

```php
use Lednerb\TextLinked\TextLinked;

...

TextLinked::make('Title', 'title')
    ->link($this),
    
TextLinked::make('ID')
    ->link($this),
```

### Link a resource by `uriKey` and `id`

```php
TextLinked::make('Title', 'title')
    ->linkResource($this->uriKey(), $this->id),
```

### Add a random URL

```php
TextLinked::make('ID')
    ->url("https://novapackages.com"),
```

### Open the link in a new tab or target

```php
TextLinked::make('Title', 'title')
    ->link($this)
    ->openInNewTab(),

TextLinked::make('Title', 'title')
    ->link($this)
    ->openInNewTab('myTarget'), 
```

### Trim long values to a specific amount of chars

![Nova TextLinked Field Trim Functionality](https://github.com/lednerb/nova-text-linked-field/blob/master/tooltip-preview.png "Tooltip Preview")

```php
TextLinked::make('Title', 'title')
    ->link($this)
    ->trim(), // Default are 50 chars

TextLinked::make('Title', 'title')
    ->link($this)
    ->trim(60), 
```

By default a tooltip will be shown on hover state with the full untrimed value.
If you don't want the tooltip, you can disable it as follows:

```php
TextLinked::make('Title', 'title')
    ->link($this)
    ->trim()
    ->hideTooltip(),
```