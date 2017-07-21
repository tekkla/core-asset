<?php
namespace Core\Asset;

use Core\Asset\Javascript\JavascriptHandler;
use Core\Asset\Css\CssHandler;

/**
 * AssetManager.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016-2017
 * @license MIT
 */
class AssetManager
{

    /**
     *
     * @var array
     */
    private $handler = [];

    /**
     * Registers an AssetHandler under a given id
     * 
     * @param string $id
     * @param AssetHandlerInterface $ah
     */
    public function registerAssetHandler(string $id, AssetHandlerInterface $ah)
    {
        $this->handler[$id] = $ah;
    }

    /**
     * Returns reference to a registered asset handler
     *
     * @param string $id
     *            The id of the registered asset manager.
     *
     * @throws AssetManagerException when no manager is regisered under the requested id
     *
     * @return AssetHandlerInterface
     */
    public function &getAssetHandler(string $id)
    {
        if (empty($this->handler[$id])) {
            Throw new AssetManagerException(sprintf('There is no registered "%s" asset handler.', $id));
        }

        return $this->handler[$id];
    }

    /**
     * Creates and returns an asset handler
     *
     * Autoregisters the asset handler in AssetManager by a given $id.
     *
     * @param string $type
     *            Type of asset handler to create. Can be either "js", "css" or "img".
     * @param string $id
     *            The id under which the asset handler will be registered in AssetManager.
     *            Applies only when $autoregister is true.
     * @param bool $autoregister
     *            Flag to autoregister the created asset handler in AssetManager (Default: true)
     *
     * @return AssetHandlerInterface
     * 
     * @todo Remove this from here because it hardcodes realtions to other objects without a chance of adding future asset handler types
     */
    public function createAssetHandler(string $type, string $id, bool $autoregister = true): AssetHandlerInterface
    {
        switch ($type) {
            case AssetHandlerInterface::TYPE_JS:
                $ah = new JavascriptHandler();
                break;
            case AssetHandlerInterface::TYPE_CSS:
                $ah = new CssHandler();
                break;

            // @TODO ImageHandler does not exist!
            case AssetHandlerInterface::TYPE_IMG:
                $ah = new JavascriptHandler();
                break;

            default:
                Throw new AssetManagerException(sprintf('The requested "%s" type is no valid asset handler type. Select from "js", "css" or "img"', $type));
        }

        if ($autoregister == true) {
            $this->registerAssetHandler($id, $ah);
        }

        return $ah;
    }

    /**
     * Processes all registered asset handlers
     */
    public function process()
    {
        foreach ($this->handler as $handler)
        {
            $handler->process();
        }
    }
}
