<?php
namespace Core\Asset;

use Core\Asset\Processor\ProcessorInterface;

/**
 * AbstractAssetHandler.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
abstract class AbstractAssetHandler implements AssetHandlerInterface
{

    /**
     * Type of asset handler
     *
     * @var string
     */
    protected $type;

    /**
     * Stack of asset objects
     *
     * @var array
     */
    protected $objects = [];

    /**
     * Stack of processors to run before
     *
     * @var array
     */
    protected $processors = [];

    /**
     *
     * @var AssetFilehandlerInterface
     */
    protected $filehandler;

    /**
     *
     * @var array
     */
    protected $files = [];

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::getType()
     */
    public function getType()
    {
        if (empty($this->type)) {
            Throw new AssetHandlerException('No type set for this AssetHandler.');
        }

        return $this->type;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::setType()
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::createObject()
     */
    public function createObject()
    {
        $class = get_called_class();
        return new $class();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::addObject()
     */
    public function addObject(AssetObjectInterface $aio)
    {
        $this->objects[] = $aio;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::getObjects()
     */
    public function getObjects()
    {
        return $this->objects;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::addProcessor()
     */
    public function addProcessor(ProcessorInterface $processor)
    {
        $this->processors[] = $processor;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::setFileHandler()
     */
    public function setFileHandler(\Core\Asset\AssetFilehandlerInterface $filehandler)
    {
        $this->filehandler = $filehandler;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::process()
     */
    public function process()
    {
        if (!isset($this->filehandler)) {
            Throw new AssetHandlerException('No filemanager set.');
        }

        if ($this->filehandler->checkTTL() == false) {
            $this->filehandler->setContent($this->getContent());
            $this->filehandler->write();
        }
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::getFiles()
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Core\Asset\AssetHandlerInterface::getContent()
     */
    abstract public function getContent();
}
