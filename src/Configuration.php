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

/**
 * Mgac configuration class.
 *
 * Loads via the inherited Menu class methods.
 *
 * @package     MenuGrabAndConvert
 */
class Configuration extends Menu
{
    public $targetUrl;
    public $targetElement;
    public $validateBaseUrl;
    public $convertToBootstrap;
    public $selectors;

    /**
     * Load the given data array into options.
     *
     * @param array $target
     * @param mixed $data option data
     */
    public function __construct($target, $data = array())
    {
        $data['target'] = $target;
        parent::__construct($data);
    }

    /**
     * Validate the configuration is complete.
     */
    public function validate()
    {
        if (!$this->targetUrl) {
            throw new \InvalidArgumentException('Cannot initialize Mgac without a target URL.');
        }
        if (!$this->targetElement) {
            throw new \InvalidArgumentException('Cannot initialize Mgac without a target element.');
        }
    }

    /**
     * Initialize the configuration
     */
    protected function initialize($options)
    {
        if ( isset($options['target']['url']) ) {
            $this->targetUrl = $options['target']['url'];
        }
        if ( isset($options['target']['element']) ) {
            $this->targetElement = $options['target']['element'];
        }
        if ( isset($options['validateBaseUrl']) ) {
            $this->validateBaseUrl = $options['validateBaseUrl'];
        }
        if ( isset($options['convertToBootstrap']) ) {
            $this->convertToBootstrap = $options['convertToBootstrap'];
        }
        if ( isset($options['selectors']) ) {
            $this->selectors = $options['selectors'];
        }
    }
}
