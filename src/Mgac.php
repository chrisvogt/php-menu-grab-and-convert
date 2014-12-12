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

use ChrisVogt\MenuGrabAndConvert\Convert;
use ChrisVogt\MenuGrabAndConvert\Request;
use Sunra\PhpSimple\HtmlDomParser;

/*
Menu Grab and Convert usage examples.

Render a menu

    $target = array(
        'url'       => 'http://example.com',
        'element'   => 'h1' // @see Simple HTML Dom Parser Manual,'How to find
                            // HTML elements?'
    );

    $options = array(           // defaults...
        'baseUrl'               => $target['url'], // validate in href
        'convertToBootstrap'    => true, // @todo convert to mapping matrix
        'cacheTime'             => '4h',
        'cachePath'             => 'tmp/',
        'cacheExtension'        => '.cache'
    );

    // insantiate the class
    $Mgac = new Mgac();

    // render a menu's HTML with or without changes
    $Mgac->renderMenu( (array) $target, (array) $options );
*/

/**
 * Mgac
 *
 * Controller class for Menu Grab and Convert
 *
 * @package    MenuGrabAndConvert
 * @link       https://github.com/chrisvogt/php-menu-grab-and-convert
 * @see        https://github.com/sunra/php-simple-html-dom-parser
 * @author     CJ Vogt <mail@chrisvogt.me>
 */
class Mgac
{

    /**
     * @param array $target
     * @param array $options
     * @return object|string
     */
    function build( $target = null, $options = null) {
        $Request = new Request();

        // @todo if $target['url'] is not null, use it
        // @todo if $options is null, use defaults

        $dom = $Request->fetch();

        // filter out everything except the target
        $this->filterElement( $dom, $target['selector'] );

        // convert to bootstrap
        if ($convert != false) {
            $Convert::toBootstrap( $dom );
        }

        return $dom;
    }

    /**
     * Scrape element off an html page
     *
     * @param object HTMLDomParser
     * @param string $selector
     * @return object HTMLDomParser
     */
    function filterElement($dom, $selector = null) {
        $element = $dom->find( $selector, 0 );
        return $element;
    }

}
