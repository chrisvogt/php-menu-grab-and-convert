<?php
/*
 * This file is part of PHP Menu Grab and Convert (Mgac).
 *
 * (c) 2014 CJ Vogt <mail@chrisvogt.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MenuGrabAndConvert;

/**
 * Menu conversion class
 *
 * @package    MenuGrabAndConvert
 * @todo       Make this class less procedural
 * @see        https://github.com/sunra/php-simple-html-dom-parser
 */
class Convert
{

    /**
     * Bootstrap conversion.
     *
     * @param simple_html_dom_node $nav
     * @param string $baseUrl
     */
    function toBootstrap($nav, $baseUrl) {
        $bs = $this->_changeClasses($nav, $baseUrl);

        return $bs;
    }

    /**
     * Menu to Bootstrap procedural function.
     *
     * @todo rewrite in OO paradigm; utilize config selectors
     * @param simple_html_dom_node $element
     * @param string $baseUrl
     */
    protected function _changeClasses($element, $baseUrl) {

        # set bs classes for top level ul
        $element->class = 'nav navbar-nav';

        # set bs class all list items with child menus
        foreach ($element->find("li.menu-item-has-children") as $item) {
            $item->class = 'dropdown';

            # hyperlink adjustments
            $this->_convertHyperlinks($item->firstChild());
        }

        # validate all hyperlink base urls
        foreach ($element->find("a") as $item) {
            $this->_validateHyperlinkBaseUrl($item, $baseUrl);
        }

        # Find all TOP_NAV_ELEMENT->[.menu-item-has-children] [ul] children with class [.sub-menu]
        foreach ($element->find("ul.sub-menu") as $item) {
            $item->class = 'dropdown-menu';
        }

        return $element;
    }

    /**
     * Hyperlink conversion method.
     */
    protected function _convertHyperlinks($a) {
        $a->{'class'} = 'dropdown-toggle';
        $a->{'data-toggle'} = 'dropdown';
        $a->{'role'} = 'button';
        $a->{'aria-expanded'} = 'false';
        $a->innertext .= '<span class="caret"></span>';
    }

    /**
     * Verify the target's base URL is in the hyperlink.
     */
    protected function _validateHyperlinkBaseUrl($item, $baseUrl = null) {
        if (strpos($baseUrl, $item->href) == false) {
            $item->href = "{$baseUrl}{$item->href}";
        }
    }

}
