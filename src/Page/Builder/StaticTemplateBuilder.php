<?php

namespace Pxp\Page\Builder;

/**
 * Class StaticTemplateBuilder
 * @package Pxp\Page\Builder
 */
class StaticTemplateBuilder extends Builder
{
    private $page;

    /**
     * Creates Page object using supplied parameters
     *
     * @param $parameters
     * @return bool|null
     */
    public function createObject(array $parameters): ?bool
    {
        if (!isset($parameters['filename'])) {
            return false;
        }

        // only allow files inside template directory to be loaded
        if (!isTemplateFile($parameters['filename'], $parameters['template_dir'])) {
            return false;
        }

        $this->page = new Pxp\Page\Page($parameters['filename']);

        return true;
    }

    /**
     * Returns Page object
     *
     * @return object|null
     */
    public function getObject(): ?object
    {
        return $this->page;
    }

    /**
     * Checks if file is a template file
     *
     * @param string $path
     * @param string $template_dir
     * @return bool
     */
    public function isTemplateFile(string $path = NULL, string $template_dir = NULL): bool
    {

        $directory = dirname($path);
        $directory = realpath($directory);
        $folder = substr($path, strlen($directory));
        $folder = preg_replace('/[^a-z0-9\.\-_]/i', '', $folder);

        if ((!$directory) || (!$folder) || ($folder === '.')) {
            return FALSE;
        }

        $path = $directory . DIRECTORY_SEPARATOR . $folder;
        if (strcasecmp($path, $template_dir) > 0) {
            return TRUE;
        }

        return FALSE;
    }
}