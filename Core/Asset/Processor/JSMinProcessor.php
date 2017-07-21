<?php
namespace Core\Asset\Processor;

/**
 * JSMinProcessor.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016-2017
 * @license MIT
 */
class JSMinProcessor implements ProcessorInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \Core\Asset\Processor\ProcessorInterface::process()
     */
    public function process($content)
    {
        return \JSMin::minify($content);
    }
}
