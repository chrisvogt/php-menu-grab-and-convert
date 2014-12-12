<?php
use Sunra\PhpSimple\HtmlDomParser;

/**
 * Http request tests
 *
 * @author CJ Vogt <mail@chrisvogt.me>
 */
class RequestTest extends PHPUnit_Framework_TestCase
{

    function _printActual($act) {
        fwrite(STDERR, print_r('ACTUAL: ' . $act, TRUE));
    }

    /*.--.      .-'.      .--.      .--.      .--.      .--.      .`-.      .--.
    :::::.\::::::::.\::::::::.\::::::::.\::::::::.\::::::::.\::::::::.\::::::::.\
    '      `--'      `.-'      `--'      `--'      `--'      `-.'      `--'     */

    function testSetUrl() {
        $testUrl = 'http://wikipedia.com';

        $Request = new Request();
        $Request->setUrl( $testUrl );

        $this->assertEquals( $testUrl, $Request->url );
    }

    function testFetch() {
        $Request = new Request();

        $this->assertNotNull( $Request->fetch() );
        $this->_printActual( $Request->fetch() );
    }

}
