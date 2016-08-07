<?php
namespace Core\Asset\Javascript;

use Core\Asset\AssetObjectInterface;

/**
 * JavascriptObjectInterface.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
interface JavascriptObjectInterface extends AssetObjectInterface
{

    /**
     * Javascript type 'file'
     *
     * @var string
     */
    const TYPE_FILE = 'file';

    /**
     * Javascript type 'script'
     *
     * @var string
     */
    const TYPE_SCRIPT = 'script';

    /**
     * Javascript type 'block'
     *
     * @var string
     */
    const TYPE_BLOCK = 'block';

    /**
     * Javascript type 'ready'
     *
     * @var string
     */
    const TYPE_READY = 'ready';

    /**
     * Javascript type 'var'
     *
     * @var string
     */
    const TYPE_VAR = 'var';

    /**
     * Sets the objects defer state.
     *
     * @param bool $defer
     */
    public function setDefer(bool $defer);

    /**
     * Returns the objects defer state
     *
     * @return bool
     */
    public function getDefer(): bool;
}

