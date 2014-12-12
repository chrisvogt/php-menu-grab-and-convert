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
 * Request class
 *
 * Fetches a menu as an HtmlDomParser object.
 */
class Request
{

    public $url;

    /**
     * class constructor
     */
    function __construct( $url = 'http://example.com' ) {
        $this->url = $url;
    }

    /**
     * url setter
     * @return string Request url
     */
    function setUrl( $url ) {
        $this->url = $url;
    }

    /**
     * @return object HtmlDomParser object with entire page content
     */
    function fetch() {
        $response = HtmlDomParser::file_get_html( $this->url );

        if ($reponse) {
            return $response;
        } else { return false; }
    }

}
