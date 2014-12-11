<?php
/**
 * @copyright    2014, CJ Vogt - http://chrisvogt.me
 * @license      https://github.com/chrisvogt/php-menu-grab-and-convert/blob/master/LICENSE
 * @link         https://github.com/chrisvogt/php-menu-grab-and-convert
 */
namespace ChrisVogt\MenuGrabAndConvert;

use Sunra\PhpSimple\HtmlDomParser;

/**
 * Class MenuUtils
 * @package    MenuGrabAndConvert
 * @see        https://github.com/sunra/php-simple-html-dom-parser
 */
class MenuUtils {

    /**
     * @var
     */
    public $url = null;

    /**
     * @param string $url
     */
    function __construct($url = 'http://example.com') {
        $this->url = (string) $url;
    }
    
    /**
     * URL to make the call with
     *
     * URL getter
     * @return string
     */
    function getUrl() {
        return $this->url;
    }
    
    /**
     * Get html from URL
     * 
     * using Simple HTML Dom Parser
     * @return object HTMLDomParser
     */
    function getHtml() {
        $response = (object) HtmlDomParser::file_get_html( $this->url );
        return $response;
    }

    /**
     * Scrape element off an html page
     *
     * @param object HTMLDomParser
     * @param string $selector
     * @return object HTMLDomParser
     */
    function filterElement($dom, $selector = null) {
        $element = (object) $dom->find( $selector, 0 );
        return $element;
    }
    
    
    /**
     * @param string $selector
     * @return object|string
     */
    function test($selector, $convert = false) {
        $nav = $this->_getNav($this->url, $selector);

        // convert to bootstrap
        if ($convert != false) { 
            $bs = $this->_convertToBootstrap($nav);
            return $bs;
        }
        
        return $nav;
    }

}
