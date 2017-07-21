<?php
namespace Core\Asset\Css;

use Core\Asset\AbstractAssetHandler;

/**
 * CssHandler.php
 *
 * @author Michael "Tekkla" Zorn <tekkla@tekkla.de>
 * @copyright 2016
 * @license MIT
 */
class CssHandler extends AbstractAssetHandler
{

    /**
     * This is a css handler
     *
     * @var string
     */
    protected $type = self::TYPE_CSS;

    /**
     *
     * @var string
     */
    private $basedir = '';

    /**
     *
     * @var string
     */
    private $baseurl = '';

    /**
     * Sets basedir which gets used on getContent() while analyzing file objects
     *
     * @param string $basedir
     */
    public function setBasedir(string $basedir)
    {
        $this->basedir = $basedir;
    }

    /**
     * Returns set basedir
     *
     * @return string
     */
    public function getBasedir(): string
    {
        return $this->basedir;
    }

    /**
     * Sets baseurl which gets used on getContent() while analyzing file objects
     *
     * @param string $baseurl
     */
    public function setBaseurl(string $baseurl)
    {
        $this->baseurl = $baseurl;
    }

    /**
     * Creates and returns a link css object.
     *
     * @param string $url
     *
     * @return CssObject
     */
    public function &createLink($url)
    {
        $css = new CssObject();

        $css->setType($css::TYPE_FILE);
        $css->setContent($url);

        $this->addObject($css);

        return $css;
    }

    /**
     * Creates and returns an inline css object
     *
     * @param string $styles
     *
     * @return CssObject
     */
    public function &createInline($styles)
    {
        $css = new CssObject();

        $css->setType($css::TYPE_INLINE);
        $css->setContent($styles);

        $this->addObject($css);

        return $css;
    }

    /**
     * Returns
     */
    public function getContent()
    {
        if (empty($this->basedir)) {
            Throw new CssException('No basedir set.');
        }

        if (empty($this->baseurl)) {
            Throw new CssException('No baseurl set.');
        }

        $local_files = [];
        $inline = [];

        /* @var $css CssHandler */
        foreach ($this->objects as $css) {

            switch ($css->getType()) {
                case 'file':

                    $filename = $css->getContent();

                    if (strpos($filename, $this->baseurl) !== false) {
                        $local_files[] = str_replace($this->baseurl, $this->basedir, $filename);
                    }
                    else {
                        $this->files[] = $filename;
                    }

                    break;

                case 'inline':
                    $inline[] = $css->getContent();
                    break;
            }
        }

        $combined = '';

        // Any local files?
        if ($local_files || $inline) {

            if (!empty($local_files)) {
                foreach ($local_files as $css_file) {
                    $combined .= file_get_contents($css_file);
                }
            }

            if (!empty($inline)) {
                $combined .= implode(PHP_EOL, $inline);
            }

            foreach ($this->processors as $processor) {
                $combined = $processor->process($combined);
            }

            return $combined;
        }

        return false;
    }
}
