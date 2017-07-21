<?php
namespace Core\Asset\Css;

use Core\Asset\AssetObjectInterface;

/**
 * CssObjectInterface.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
interface CssObjectInterface extends AssetObjectInterface
{

    /**
     * Css type 'file'
     *
     * @var string
     */
    const TYPE_FILE = 'file';

    /**
     * Css type 'inline'
     *
     * @var string
     */
    const TYPE_INLINE = 'inline';
}

