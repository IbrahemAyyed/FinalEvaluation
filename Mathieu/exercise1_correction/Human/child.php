<?php
namespace Human;

class child extends Human implements HumanInterface
{
    private $brain;
    public function getBrain()
    {
        return $this->$brain;
    }
    public function setBrain()
    {
        return $this->$brain;
    }
    public static function fromArray(array $definition)
    {
        $human = new Human();
        $child = new child;
        $child->setAge((int)$definition['age'] ?? '')
            ->setGender($definition['gender'] ?? '')
            ->setName($definition['name'] ?? '')
            ->setEye(Eye::fromArray($definition['eye'] ?? []))
            ->setHair(Hair::fromArray($definition['hair'] ?? []));
        
        return $child;
    }
}

