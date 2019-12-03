<?php

namespace Pxp\Page\Builder;

/**
 * Class StaticBuilder
 * @package Pxp\Page\Builder
 */
class StaticBuilder extends Builder
{
    private $page;

    /**
     * Creates Page object using parameters supplied
     *
     * @param $parameters
     * @return bool|null
     */
    public function createObject(array $parameters) : ?bool
    {       
        if( !isset($parameters['filename'])){
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
    public function getObject() : ?object
    {       
        return $this->page;       
    }
}