<?php
/**
 * @copyright    2014, CJ Vogt - http://chrisvogt.me
 * @license      https://github.com/chrisvogt/php-menu-grab-and-convert/blob/master/LICENSE
 * @link         https://github.com/chrisvogt/php-menu-grab-and-convert
 */
namespace chrisvogt\MenuGrabAndConvert;

use Sunra\PhpSimple\HtmlDomParser;

/**
 * Class MenuUtils
 * @package    MenuGrabAndConvert
 * @author     CJ Vogt <mail@chrisvogt.me>
 * @see        https://github.com/sunra/php-simple-html-dom-parser
 */
class MenuUtils {

    public $url = null;

    function __construct($url = 'http://example.com') {
        $this->url = $url;
    }

    function test($selector) {
        $nav = $this->_getNav($this->url, $selector);

        // convert to bootstrap
        $bs = $this->_convertToBootstrap($nav);
        return $bs;
    }
    
    /**
     * URL getter
     */
    function getUrl() {
        return $this->url;
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
