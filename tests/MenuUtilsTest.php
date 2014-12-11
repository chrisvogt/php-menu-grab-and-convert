<?php
use ChrisVogt\MenuGrabAndConvert\MenuUtils;

/**
 * @author CJ Vogt <mail@chrisvogt.me>
 */
class MenuUtilsTest extends PHPUnit_Framework_TestCase {

    /**
     * Print results with test
     *
     * E.g. use with `phpunit --debug`
     *      to print to the command line
     */
    function _printActual($act) {
        fwrite(STDERR, print_r('ACTUAL: ' . $act, TRUE));
    }
    
    # Check the URL property exists
    function testMenuUtilsHasUrl()
    {
        $MenuUtils = new MenuUtils();
        
        $this->assertNotNull($MenuUtils->url);
        $this->assertContains('http://example.com', $MenuUtils->url);
    }

    # Check the URL getter method
    function testGetUrl()
    {
        $MenuUtils = new MenuUtils();
        
        $this->assertContains($MenuUtils->url, $MenuUtils->getUrl());
    }    
    
    # Verify the correct content is being grabbed
    function testGetHtml()
    {
        $MenuUtils = new MenuUtils();
        
        $this->assertNotNull($MenuUtils->getHtml());
    }
    
    function testScrapeElement()
    {
        $MenuUtils = new MenuUtils();
        $select = 'h1';
        $dom = $MenuUtils->getHtml();
        $result = $MenuUtils->filterElement($dom, $select);
        
        $this->assertNotNull($result);
        $this->assertEquals('<h1>Example Domain</h1>', $result);
    }
    
}