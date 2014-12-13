<?php
/*
 * This file is part of PHP Menu Grab and Convert (Mgac).
 *
 * (c) 2014 CJ Vogt <mail@chrisvogt.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MenuGrabAndConvert;

require_once __DIR__ . '/../src/Configuration.php';

/**
 * Menu conversion tests
 *
 * @author CJ Vogt <mail@chrisvogt.me>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{

    function _printActual($act) {
        fwrite(STDERR, print_r($act, TRUE));
    }

    /**
     * @expectedException           InvalidArgumentException
     * @expectedExceptionMessage    Cannot initialize Mgac without a target URL.
     */
    function testNoTargetUrlSetFailsValidation() {
        $options = array(
            'element' => 'octocat'
        );
        $configuration = new Configuration($options);
        $this->assertFalse($configuration->validate());
    }

    /**
     * @expectedException           InvalidArgumentException
     * @expectedExceptionMessage    Cannot initialize Mgac without a target element.
     */
    function testNoTargetElementSetFailsValidation() {
        $options = array(
            'url' => 'http://example.com'
        );
        $configuration = new Configuration($options);
        $this->assertFalse($configuration->validate());
    }

    # initialize()
    function testEachOptionInitializedProperly() {
        //
    }

    function testNumOptionsInMatchOptionsOut() {
        //
    }

}
