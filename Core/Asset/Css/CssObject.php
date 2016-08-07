<?php
namespace Core\Asset\Css;

use Core\Asset\AbstractAssetObject;

/**
 * CssObject.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
class CssObject extends AbstractAssetObject implements CssObjectInterface
{

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::setType()
     *
     */
    public function setType(string $type)
    {
        $types = [
            self::TYPE_FILE,
            self::TYPE_INLINE
        ];

        if (!in_array($type, $types)) {
            Throw new CssException('Css type must be "inline" or "file".');
        }

        $this->type = $type;
    }
}
