<?php
/**
 * PHP Menu Grab and Convert (Mgac).
 *
 * @link https://github.com/chrisvogt/php-menu-grab-and-convert
 */

/*
 * PHP Menu Grab and Convert
 *
 * Copyright (c) 2014 CJ Vogt <mail@chrisvogt.me>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace MenuGrabAndConvert;

/**
 * Mgac
 *
 * Controller class for Menu Grab and Convert
 *
 * @package     MenuGrabAndConvert
 * @author      CJ Vogt <mail@chrisvogt.me>
 */
class Mgac
{

    public $configuration = null;
    protected $menu       = null;
    protected $request    = null;

    /**
     * Load configuration and make the request.
     *
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $configuration->validate();
        $this->configuration = $configuration;
        $this->request       = new Request($configuration);
    }

    /**
     * Build the menu
     *
     * @param array $target
     */
    function render() {
        $dom = $this->request->make();

        if ($dom != false) {
            $element = $this->configuration->filterElement($dom, $this->configuration->_targetElement);

            if (isset($this->configuration->_convertToBootstrap)) {
                $convert = new Convert();
                $element = $convert->toBootstrap($element, $this->configuration->_targetUrl);
            }

            return $element;
        } else {
            return 'Unable to retrieve the target page.';
        }

    }

}