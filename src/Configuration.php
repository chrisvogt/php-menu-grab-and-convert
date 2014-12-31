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

    public $_targetUrl;
    public $_targetElement;
    public $_validateBaseUrl;
    public $_convertToBootstrap;
    public $_selectors;

    /**
     * Load the given data array into options.
     *
     * @param array $target
     * @param array|stdClass $data option data
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
        if (!$this->_targetUrl) {
            throw new \InvalidArgumentException('Cannot initialize Mgac without a target URL.');
            return false;
        }
        if (!$this->_targetElement) {
            throw new \InvalidArgumentException('Cannot initialize Mgac without a target element.');
            return false;
        }
    }

    /**
     * Initialize the configuration
     */
    protected function initialize($options)
    {
        if ( isset($options['target']['url']) ) {
            $this->_targetUrl = $options['target']['url'];
        }
        if ( isset($options['target']['element']) ) {
            $this->_targetElement = $options['target']['element'];
        }
        if ( isset($options['validateBaseUrl']) ) {
            $this->_validateBaseUrl = $options['validateBaseUrl'];
        }
        if ( isset($options['convertToBootstrap']) ) {
            $this->_convertToBootstrap = $options['convertToBootstrap'];
        }
        if ( isset($options['selectors']) ) {
            $this->_selectors = $options['selectors'];
        }
    }

}
