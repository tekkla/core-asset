<?php
namespace Core\Asset;

use Core\Asset\Processor\ProcessorInterface;

/**
 * AssetHandlerInterface.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
interface AssetHandlerInterface
{

    const TYPE_JS = 'js';

    const TYPE_CSS = 'css';

    const TYPE_IMG = 'img';

    /**
     * Defines type of asset handler
     *
     * @param string $type
     *            Type of asset handler. Can be 'js', 'css' or 'img'.
     */
    public function setType($type);

    /**
     * Returns type of asset handler
     *
     * @return string
     */
    public function getType();

    /**
     * Creates and returns an object implementing an AssetObjectInterface
     *
     * @return AssetObjectInterface
     */
    public function createObject();

    /**
     * Adds object to the asset handler object stack
     *
     * @param AssetObjectInterface $aio
     */
    public function addObject(AssetObjectInterface $aio);

    /**
     * Returns all asset objects stored in asset handler
     *
     * @return array
     */
    public function getObjects();

    /**
     * Add a processor to the handler
     *
     * @param ProcessorInterface $processor
     */
    public function addProcessor(ProcessorInterface $processor);

    /**
     *
     * @param AssetFileHandlerInterface $filehandler
     */
    public function setFileHandler(AssetFileHandlerInterface $filehandler);

    /**
     * Processes all asset objects and returns the sresult;
     *
     * @return string
     */
    public function getContent();

    /**
     * Processes all objects and creates the final asset file
     */
    public function process();

    /**
     * Returns an array of external files that won't get processed by the AssetHandler
     *
     * @return array
     */
    public function getFiles(): array;
}
