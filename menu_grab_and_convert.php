<?php

// Include Simple HTML Dom Parser
use Sunra\PhpSimple\HtmlDomParser;
require 'vendor/autoload.php';

/**
 * @author CJ Vogt <mail@chrisvogt.me>
 * @uses sunra/php-simple-html-dom-parser
 * @see http://simplehtmldom.sourceforge.net/manual.htm
 * @see https://github.com/sunra/php-simple-html-dom-parser
 */
class MenuGrabAndConvert {

    public $url = 'http://example.com';

    function __construct($url) {
        $this->url = $url;
    }

    function test($selector) {
        $nav = $this->_getNav($this->url, $selector);

        // convert to bootstrap
        $bs = $this->_convertToBootstrap($nav);
        return $bs;
    }

    function _getNav($url, $element) {
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

            # hyperlink adjustments
            $this->_convertHyperlinks($item->firstChild());
        }

        # validate all hyperlink base urls
        foreach ($element->find("a") as $item) {
            $this->_validateHyperlinkBaseUrl($item);
        }

        # Find all TOP_NAV_ELEMENT->[.menu-item-has-children] [ul] children with class [.sub-menu]
        foreach ($element->find("ul.sub-menu") as $item) {
            $item->class = 'dropdown-menu';
        }

        return $element;
    }

    function _convertHyperlinks($a) {
        $a->{'class'} = 'dropdown-toggle';
        $a->{'data-toggle'} = 'dropdown';
        $a->{'role'} = 'button';
        $a->{'aria-expanded'} = 'false';
        $a->innertext .= '<span class="caret"></span>';
    }

    function _validateHyperlinkBaseUrl($item) {
        if (strpos($this->url, $item->href) == false) {
            $item->href = "{$this->url}{$item->href}";
        }
    }

}

// To use:
// $Menu = new MenuGrabAndConvert('http://example.com');
// echo $Menu->test('ul[id=topnav]');
