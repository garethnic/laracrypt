# LaraCrypt

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel package to handle database encryption. In the current state of this project, only symmetric encryption is possible.

## Install

Via Composer

Make sure you have [libsodium](https://download.libsodium.org/doc/installation/index.html) installed.

Add the following to your `composer.json` file:

```
"garethnic/laracrypt": "dev-master"
```

Add the garethnic\ServiceProvider to your config/app.php providers array:

``` php
garethnic\Repo\LaraCryptServiceProvider::class,
```

Then create the following directory `storage/keys`.

**For your database schema make sure the encrypted columns are of type `BLOB`.**

## Usage

There are multiple ways to go about encrypting/decrypting:

`AppServiceProvider`

``` php
// Encrypting all attributes
Post::saving(function ($post) {
    foreach($post['attributes'] as $key => $value) {
        $post->$key = LaraCrypt::encrypt($value);
    }
});

// Encrypting all attributes
Post::saving(function ($post) {
    $post->body = LaraCrypt::encrypt($post->body);
});
```

Or in your `Model` you could do:
``` php
public function setBodyAttribute($value)
{
    $this->attributes['title'] = LaraCrypt::encrypt($value);
}
```

Decrypting:

It's as simple as `LaraCrypt::decrypt($text)`.

In your `Model`:

``` php
public function getBodyAttribute($value)
{
    return LaraCrypt::decrypt($value);
}
```

## TODO

* Add configuration options
* Add support for asymmetric encryption
* Clean up code

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/garethnic/laracrypt.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/garethnic/laracrypt/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/garethnic/laracrypt.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/garethnic/laracrypt.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/garethnic/laracrypt.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/garethnic/laracrypt
[link-travis]: https://travis-ci.org/garethnic/laracrypt
[link-scrutinizer]: https://scrutinizer-ci.com/g/garethnic/laracrypt/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/garethnic/laracrypt
[link-downloads]: https://packagist.org/packages/garethnic/laracrypt
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
