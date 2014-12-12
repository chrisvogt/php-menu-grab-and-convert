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

    /*.--.      .-'.      .--.      .--.      .--.      .--.      .`-.      .--.
    :::::.\::::::::.\::::::::.\::::::::.\::::::::.\::::::::.\::::::::.\::::::::.\
    '      `--'      `.-'      `--'      `--'      `--'      `-.'      `--'     */

    # Check the URL getter method
    function testGetUrl()
    {
        $Menu = new Menu();
#        $this->assertContains($MenuUtils->url, $MenuUtils->getUrl());
    }


}
