<?php
use ChrisVogt\MenuGrabAndConvert\ConversionUtils;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * @author CJ Vogt <mail@chrisvogt.me>
 */
class ConversionUtilsTest extends PHPUnit_Framework_TestCase {
 
    public $legacy_list = ;
    
    function testTestMe() {
        $ConversionUtils = new ConversionUtils();
        
        $this->assertEquals(TRUE, $ConversionUtils->testMe());
    }
    
    function testListToBootstrap($ul) {
        
    }
    
}