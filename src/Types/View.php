<?php
namespace Frolki1_Dev\Types;

class View extends AbstractBuilder
{
    public $type = 'view';

    /**
     * @inheritdoc
     */
    public function setLocation(string $location)
    {
        return $this;
    }
}