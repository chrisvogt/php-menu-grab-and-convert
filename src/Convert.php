<?php
/**
 * PHP Menu Grab and Convert (Mgac).
 *
 * @link https://github.com/chrisvogt/php-menu-grab-and-convert
 */

/*
 * PHP Menu Grab and Convert
 *
 * Copyright (c) 2014 CJ Vogt <mail@chrisvogt.me>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace ChrisVogt\MenuGrabAndConvert;

use Sunra\PhpSimple\HtmlDomParser;

/**
 * Menu conversion class
 *
 * @package    MenuGrabAndConvert
 * @uses       ChrisVogt\MenuUtils
 * @see        https://github.com/sunra/php-simple-html-dom-parser
 */
class Convert extends Menu {

    function testMe() {
        return true;
    }

    function setTopLevelNavClass((string) $class = null) {
        $class = (string) 'nav navbar-nav';
    }

    function toBootstrap($element) {

        # set bs classes for menu unordered list
        $element->class = (string) 'nav navbar-nav';

        # set bs class all list items with child menus
        foreach ($element->find("li.menu-item-has-children") as $item) {
            $item->class = (string) 'dropdown';

            # hyperlink adjustments
            $this->_convertHyperlinks($item->firstChild());
        }

        # validate all hyperlink base urls
        foreach ($element->find("a") as $item) {
            $this->_validateHyperlinkBaseUrl($item);
        }

        # Find all TOP_NAV_ELEMENT->[.menu-item-has-children] [ul] children with class [.sub-menu]
        foreach ($element->find("ul.sub-menu") as $item) {
            $item->class = (string) 'dropdown-menu';
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
