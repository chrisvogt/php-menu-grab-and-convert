PHP Menu Grab and Convert
=========================

[![Build Status](https://travis-ci.org/chrisvogt/php-menu-grab-and-convert.svg)](https://travis-ci.org/chrisvogt/php-menu-grab-and-convert)
[![GitHub release](http://img.shields.io/github/release/chrisvogt/php-menu-grab-and-convert.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert/releases)
[![Code Climate](http://img.shields.io/codeclimate/coverage/github/triAGENS/ashikawa-core.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert)
[![License: MIT](http://img.shields.io/badge/license-MIT-70a1fb.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert/blob/master/LICENSE)
[![Twitter: @c1v0](http://img.shields.io/badge/contact-%40c1v0-70a1fb.svg?style=flat)](https://twitter.com/c1v0)

A library that makes it easy to clone and render another site's navigation menu targeted by url and menu element. Uses [sunra/php-simple-html-dom-parser/](https://github.com/sunra/php-simple-html-dom-parser), an adaptation of the [PHP Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/).

This project was born as a quick, simple solution to replication a navigation menu on a top level domain to a set of static pages underneath, each of which may be in a different style or front-end framework yet need to contain the same menu items and hyperlinks.

In its current version (0.7._x_), Menu Grab and Convert may be unstable and simply gets the job it needs to (above) done for that specific project. It is ready to share by the 0.9._x_ branch and stable by 1.0.0. Please save contributions until 0.9.0, at which point the supporting documentation, tests, and code refactoring will be less embarrassing to distribute.

Meanwhile, please be free to utilize the [suggestion box](https://github.com/chrisvogt/php-menu-grab-and-convert/issues/new).

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
require_once realpath(__DIR__.'/src/Mgac.php');

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

$config = new MenuGrabAndConvert\Configuration($target, $options);
$mgac = new MenuGrabAndConvert\Mgac($config);
```
