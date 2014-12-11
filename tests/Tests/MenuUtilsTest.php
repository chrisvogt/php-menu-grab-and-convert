<?php
namespace Tests;

use PHPUnit_Framework_TestCase;
use chrisvogt\MenuGrabAndConvert;

/**
 * @author CJ Vogt <mail@chrisvogt.me>
 */
class MenuUtilsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    function testUrl()
    {
        $MenuUtils = new MenuUtils();
        assertContains('http://example.com', $MenuUtils->url);
    }
}