<?php
use ChrisVogt\MenuGrabAndConvert\ConversionUtils;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * @author CJ Vogt <mail@chrisvogt.me>
 */
class ConversionUtilsTest extends PHPUnit_Framework_TestCase {
 
    public $legacy_list = '<ul id="topnav"><li>Dogs</li><li class="menu-item-has-children">Cats<ul class="sub-menu"><li><a href="#">Snowshoe</a></li><li><a href="#">Ocicat</a></li></ul></li></ul>';
    
    function testTestMe() {
        $ConversionUtils = new ConversionUtils();
        
        $this->assertEquals(TRUE, $ConversionUtils->testMe());
    }
    
    function testConvertMenuToBootstrap() {
        
    }
    
}