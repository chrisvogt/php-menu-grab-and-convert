PHP Menu Grab and Convert
=========================

[![Build Status](https://travis-ci.org/chrisvogt/php-menu-grab-and-convert.svg)](https://travis-ci.org/chrisvogt/php-menu-grab-and-convert)
[![GitHub release](http://img.shields.io/github/release/chrisvogt/php-menu-grab-and-convert.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert/releases)
[![Code Climate](http://img.shields.io/codeclimate/coverage/github/triAGENS/ashikawa-core.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert)
[![License: MIT](http://img.shields.io/badge/license-MIT-70a1fb.svg?style=flat)](https://github.com/chrisvogt/php-menu-grab-and-convert/blob/master/LICENSE)
[![Twitter: @c1v0](http://img.shields.io/badge/contact-%40c1v0-70a1fb.svg?style=flat)](https://twitter.com/c1v0)

The utility of this class is to

* grab a navigation menu from an external Wordpress site
* _(OPT)_ cache to avert potential request throttling
* _(OPT)_ convert the navigation menu from Wordpress's default menu style to Twitter Bootstrap
* output the navigation menu

Uses [sunra/php-simple-html-dom-parser/](https://github.com/sunra/php-simple-html-dom-parser), an adaptation of the [PHP Simple HTML DOM Parser](http://simplehtmldom.sourceforge.net/).

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

Todo
----

- [x] get page html

#### Convert nav menu from Wordpress theme to Twitter Bootstrap

- [x] find [ul]TOP_NAV_ELEMENT (eg ".top-nav")
  - [x] append classes [.nav, .navbar-nav]
- [x] * find all [ul]TOP_NAV_ELEMENT children [li] with class [.menu-item-has-children]
  - [x] append class [.dropdown]
- [x] find all [ul] children with class [.sub-menu]
  - [x] append class [.dropdown-menu]
- [x] add Bootstrap attributes to dropdown hyperlinks
- [x] verify base url exists in all hyperlink links

#### Caching

- [ ] if timestamp is older than x=2 hours, fetch new menu

#### Roadmap
- [ ] documentation rough draft
- [ ] controls for menu selectors and replacement classes
- [ ] example github-hosted site
