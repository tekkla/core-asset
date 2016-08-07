<?php
namespace Core\Asset;

/**
 * AbstractAssetObject.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
abstract class AbstractAssetObject implements AssetObjectInterface
{

    /**
     *
     * @var string
     */
    protected $content;

    /**
     *
     * @var boolean
     */
    protected $combine = true;

    /**
     *
     * @var boolean
     */
    protected $minify = true;

    /**
     *
     * @var string
     */
    protected $id = '';

    /**
     *
     * @var bool
     */
    protected $external = false;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::getMinify()
     *
     */
    public function getMinify(): bool
    {
        return $this->minify;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::setContent()
     *
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::setCombine()
     *
     */
    public function setCombine(bool $combine)
    {
        $this->combine = $combine;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::getType()
     *
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::getContent()
     *
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::getCombine()
     *
     */
    public function getCombine(): bool
    {
        return $this->combine;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::setId()
     *
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::getId()
     *
     */
    public function getId(): string
    {
        return $this->id ?? '';
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::setMinify()
     *
     */
    public function setMinify(bool $minify)
    {
        $this->minify = $minify;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Core\Asset\AssetObjectInterface::setType()
     *
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetObjectInterface::getExternal()
     */
    public function getExternal(): bool
    {
        return $this->external;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetObjectInterface::setExternal($external)
     */
    public function setExternal(bool $external)
    {
        $this->external = $external;
    }
}
