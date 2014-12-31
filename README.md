PHP Menu Grab and Convert
=========================

[![GitHub release](http://img.shields.io/github/release/chrisvogt/php-menu-grab-and-convert.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert/releases)
[![Build Status](https://travis-ci.org/chrisvogt/php-menu-grab-and-convert.svg)](https://travis-ci.org/chrisvogt/php-menu-grab-and-convert)
[![Code Climate](http://img.shields.io/codeclimate/coverage/github/triAGENS/ashikawa-core.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert)
[![License: MIT](http://img.shields.io/badge/license-MIT-70a1fb.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert/blob/master/LICENSE)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d8ba3b7d-608b-49f0-8b71-e72f90f0da3f/mini.png)](https://insight.sensiolabs.com/projects/d8ba3b7d-608b-49f0-8b71-e72f90f0da3f)

PHP Menu Grab and Convert (Mgac) is a small library that makes it easy to clone, convert, and render another site's navigation menu. Uses [sunra/php-simple-html-dom-parser/](https://github.com/sunra/php-simple-html-dom-parser), an adaptation of the [PHP Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/).

This project was born as a quick, simple solution to replicate a navigation menu on a top-level domain to a set of static pages underneath, each of which may be in a different style or front-end framework yet need to contain the same menu items and hyperlinks.

Please be free to utilize the [suggestion box](https://github.com/chrisvogt/php-menu-grab-and-convert/issues/new) or [read the documentation](https://github.com/chrisvogt/php-menu-grab-and-convert/wiki).

Install
-------

 composer.phar
```json
{
    "repositories": [
        {
            "url": "https://github.com/chrisvogt/php-menu-grab-and-convert.git",
            "type": "git"
        }
    ],
    "require": {
        "chrisvogt/php-menu-grab-and-convert": "*"
    }
}
```

Usage
-----

```php
use \MenuGrabAndConvert;

require_once __DIR__ . '/vendor/autoload.php';

$target  = array( // Required
    'url'       => 'http://sandbox-php.dev/demo/',
    'element'   => 'ul[id=topnav]'
);
$options = array( // Optional, for Bootstrap conversion
    'validateBaseUrl'       => true,
    'convertToBootstrap'    => true,
    'selectors'             => array(
        'top-nav'            => 'ul[id=topnav]',
        'li-with-child'      => 'li.menu-item-has-children',
        'submenu-ul'         => 'ul.sub-menu'
    )
);

$config = new \MenuGrabAndConvert\Configuration($target, $options);
$mgac = new \MenuGrabAndConvert\Mgac($config);
```
