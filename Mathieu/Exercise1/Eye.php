<?php

class Eye
{
    private $color;
    
    private $quality;
    
    public function getColor()
    {
        return $this->color;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
    }
    
    public static function createFromArray(array $definition)
    {
        $eye = new Eye();
        $eye->setColor($definition['color'] ?? '');
        $eye->setQuality($definition['quality'] ?? '');
        
        return $eye;
    }
}

