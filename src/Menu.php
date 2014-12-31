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
 * Class Menu
 *
 * Tools to fetch and render the menu.
 *
 * @package    MenuGrabAndConvert
 * @author     Chris Vogt <mail@chrisvogt.me>
 * @copyright  (c) 2014 CJ Vogt
 * @license    http://www.opensource.org/licenses/mit-license.php
 */
class Menu
{
    /**
     * Load the configuration to the Menu.
     *
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->initialize($data);
    }

    /**
     * Filter out only the target element.
     *
     * @param \simple_html_dom $dom
     * @param string $selector
     */
    public function filterElement(\simple_html_dom $dom, $selector)
    {
        return ( $dom->find( $selector, 0 ) );
    }
}
