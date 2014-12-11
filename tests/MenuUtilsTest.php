<?php
use ChrisVogt\MenuGrabAndConvert\MenuUtils;

/**
 * @author CJ Vogt <mail@chrisvogt.me>
 */
class MenuUtilsTest extends PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    function testGetUrl()
    {
        $MenuUtils = new MenuUtils();
        $this->assertContains('http://example.com', $MenuUtils->url);
    }
}