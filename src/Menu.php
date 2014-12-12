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

/*
Class interfaces

$Menu->renderHtml()   - Output the menu's HTML
$Menu->getTitle()  - Output the menu name
$Menu->delete()    - Delete any caches of this menu

$Menu::fetch($location)     - Redownload the menu // @see $Mgac usage examples

/**
 * Class Menu
 *
 * Tools to fetch and render the menu.
 *
 * @package    MenuGrabAndConvert
 * @see        https://github.com/sunra/php-simple-html-dom-parser
 */
class Menu
{

    public $title;
    public $location;
    public $html;
    protected $Parser; // Simple HTML Dom

    function __construct( $title,
                          $location) {
        $this->title        = $title;
        $this->location     => $location;
        $this->html         => $html;
        $this->Parser       => new HtmlDomParser;
    }

    /**
     * magic get method
     *
     * @return mixed
     */
    function __get( $property ) {
        $method = "get{$property}";
        if ( method_exists( $this, $method ) ) {
            return $this->$method();
        }
    }

    /**
     * @return str a title for the menu, used for caching
     */
    function getTitle() {
        return $this->title;
    }

    /**
     * @return str the location (http) of the menu to clone
     */
    function getUrl() {
        return $this->location['url'];
    }

    /**
     * @return str selector for Simple HTML Dom Parser
     */
    function getSelector() {
        return $this->location['element'];
    }

    /**
     * @return obj $Parser object
     */
    function getParser() {
        return $this->Parser;
    }

    /**
     * @return str rendered menu markup
     */
    function getHtml() {
        return $this->html;
    }

    /**
     * alias for getHtml()
     *
     * @return str ..
     * @see $this->getHtml()
     */
    function renderHtml() {
        return $this->getHtml();
    }

}
