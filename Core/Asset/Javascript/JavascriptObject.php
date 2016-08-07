<?php
namespace Core\Asset\Javascript;

use Core\Asset\AbstractAssetObject;

/**
 * JavascriptObject.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
class JavascriptObject extends AbstractAssetObject implements JavascriptObjectInterface
{

    /**
     * Header (false) or scripts (true) below body? This is the target for.
     *
     * @var bool
     */
    private $defer = false;


    public function setType(string $type)
    {
        $types = [
            self::TYPE_FILE,
            self::TYPE_SCRIPT,
            self::TYPE_READY,
            self::TYPE_BLOCK,
            self::TYPE_VAR
        ];

        if (!in_array($type, $types)) {
            Throw new JavascriptException('Javascript targets have to be "file", "script", "block", "var" or "ready"');
        }

        $this->type = $type;
    }
    /**
     * {@inheritDoc}
     * @see \Core\Asset\Javascript\JavascriptObjectInterface::getDefer()
     */
    public function getDefer(): bool
    {
        return $this->defer;
    }

    /**
     * {@inheritDoc}
     * @see \Core\Asset\Javascript\JavascriptObjectInterface::setDefer($defer)
     */
    public function setDefer(bool $defer)
    {
        $this->defer = $defer;
    }
}
