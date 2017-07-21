<?php
namespace Core\Asset;

/**
 * AbstractAssetFileHandler.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
abstract class AbstractAssetFileHandler implements AssetFileHandlerInterface
{

    /**
     *
     * @var string
     */
    protected $content;

    /**
     *
     * @var int
     */
    protected $ttl = 0;

    /**
     *
     * @var string
     */
    protected $filename;

    /**
     *
     * {@inheritdoc}
     * @see \Core\Asset\AssetFileHandlerInterface::setContent()
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Core\Asset\AssetFileHandlerInterface::setTTL()
     */
    public function setTTL(int $ttl)
    {
        $this->ttl = $ttl;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Core\Asset\AssetFileHandlerInterface::setFilename()
     */
    public function setFilename(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Core\Asset\AssetFileHandlerInterface::checkTTL()
     */
    public function checkTTL(): bool
    {
        if (! file_exists($this->filename) || filemtime($this->filename) + $this->ttl < time()) {
            return false;
        }
        
        return true;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Core\Asset\AssetFileHandlerInterface::write()
     */
    public function write()
    {
        file_put_contents($this->filename, $this->content);
    }
}

