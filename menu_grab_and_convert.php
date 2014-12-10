<?php

// Include Simple HTML Dom Parser
use Sunra\PhpSimple\HtmlDomParser;
require 'vendor/autoload.php';

// ------------------------------------------ CUT ME

echo "<pre>before class</pre><br />";

/**
 * @author CJ Vogt <mail@chrisvogt.me>
 * @uses sunra/php-simple-html-dom-parser
 * @see http://simplehtmldom.sourceforge.net/manual.htm
 * @see https://github.com/sunra/php-simple-html-dom-parser
 */
class MenuGrabAndConvert {

    function buildNav($url, $element) {
        $res = $this->_getElement($url, $element);
        $clean = $this->_cleanElement($res);
        return $clean;
    }

// ------------------------------------------ CUT ME

    function test() {
        echo '<pre> at: ' . __FUNCTION__ . '</pre>';
        $nav = $this->_getNav('http://sandbox-php.dev/demo/', 'ul[id=topnav]');

        // convert to bootstrap
        $bs = $this->_convertToBootstrap($nav);
        return $bs;
    }

    function _getNav($url, $element) {
        echo '<pre> at: ' . __FUNCTION__ . '</pre>';
        $dom = HtmlDomParser::file_get_html( $url );
        $nav = $dom->find($element, 0);

        return $nav;
    }

    function _convertToBootstrap($element) {

        # set bs classes for menu unordered list
        $element->class = 'nav navbar-nav';

        # set bs class all list items with child menus
        foreach ($element->find("li.menu-item-has-children") as $item) {
            $item->class = 'dropdown';
        }

        # Find all TOP_NAV_ELEMENT->[.menu-item-has-children] [ul] children with class [.sub-menu]
        foreach ($element->find("ul.sub-menu") as $item) {
            $item->class = 'dropdown-menu';
        }

        return $element;
    }

}

echo "<br /><pre>after class</pre><hr />";

// To use:
$Menu = new MenuGrabAndConvert();
echo $Menu->test();
