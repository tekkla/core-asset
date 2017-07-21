<?php
namespace Core\Asset;

/**
 * AssetObjectInterface.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
interface AssetObjectInterface
{

    /**
     * Sets minify flag
     *
     * @param bool $minify
     */
    public function setMinify(bool $minify);

    /**
     * Returns minify flag
     *
     * @return bool
     */
    public function getMinify(): bool;

    /**
     * Sets objects content
     *
     * @param mixed $content
     */
    public function setContent($content);

    /**
     * Get objects content
     *
     * @return mixed
     */
    public function getContent();

    /**
     * Sets objects type
     *
     * @param string $type
     */
    public function setType(string $type);

    /**
     * Returns objects type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Sets combine flag
     *
     * @param bool $combine
     */
    public function setCombine(bool $combine);

    /**
     * Returns combine flag
     *
     * @return bool
     */
    public function getCombine(): bool;

    /**
     * Sets object id
     *
     * @param string $id
     */
    public function setId(string $id);

    /**
     * Returns object it
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Sets external flag
     *
     * @param bool $external
     */
    public function setExternal(bool $external);

    /**
     * Returns external flag
     *
     * @return bool
     */
    public function getExternal(): bool;
}
