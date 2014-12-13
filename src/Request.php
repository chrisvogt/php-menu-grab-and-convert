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

use Sunra\PhpSimple\HtmlDomParser;

/**
 * Menu Grab and Convert request class.
 *
 * @package     MenuGrabAndConvert
 */
class Request
{

    protected $configuration = null;

    /**
     * Load the configuration.
     *
     * @param MenuGrabAndConvert\Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Make the request.
     *
     * @uses Sunra\PhpSimple\HtmlDomParser
     * @return HtmlDomParser dom object (opt) filtered to element
     */
    function make() {
        $response = HtmlDomParser::file_get_html($this->configuration->_targetUrl);

        if ($response) {
            return $response;
        } else { return false; }
    }

}
