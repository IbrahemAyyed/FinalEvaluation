<?php

class Hair
{
    private $color;
    
    private $length;
    
    public function getColor()
    {
        return $this->color;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }
    
    public static function createFromArray(array $definition)
    {
        $hair = new Hair();
        $hair->setColor($definition['color'] ?? '');
        $hair->setLength($definition['length'] ?? 0);
        
        return $hair;
    }
}

