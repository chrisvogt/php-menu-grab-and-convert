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

    function _navGetter($url, $element) {
        echo '<pre> at: ' . __FUNCTION__ . '</pre>';
        $dom = HtmlDomParser::file_get_html( $url );

        var_dump($dom);
    }

    function test() {
        echo '<pre> at: ' . __FUNCTION__ . '</pre>';
        $this->_navGetter('http://example.com', 'p');
    }

}

echo "<br /><pre>after class</pre><hr />";

// To use:
$Menu = new MenuGrabAndConvert();
echo $Menu->test();
