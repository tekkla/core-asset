<?php
namespace Core\Asset;

/**
 * AssetFileHandlerInterface.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016-2017
 * @license MIT
 */
interface AssetFileHandlerInterface
{

    /**
     * Sets the filename
     *
     * @param string $filename
     */
    public function setFilename(string $filename);

    /**
     * Sets TTL in seconds
     *
     * @param int $ttl
     */
    public function setTTL(int $ttl);

    /**
     *
     * @param string $content
     */
    public function setContent(string $content);

    /**
     * Writes the content to the set filename
     */
    public function write();

    /**
     * Check if the file has still TTL
     *
     * @return bool
     */
    public function checkTTL(): bool;
}
