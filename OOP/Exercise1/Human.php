<?php
require_once __DIR__.'/Eye.php';
require_once __DIR__.'/Hair.php';

class Human
{
    private $name;
    
    private $age;
    
    private $gender;
    
    private $eye;
    
    private $hair;
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setGender($gender)
    {
        if (!in_array($gender, ['male', 'female', 'other'])) {
            throw new RuntimeException('Gender not allowed');
        }
        $this->gender = $gender;
    }

    public function setEye(Eye $eye)
    {
        $this->eye = $eye;
    }
    
    public function setHair(Hair $hair)
    {
        $this->hair = $hair;
    }
    
    public static function createFromArray(array $definition)
    {
        $human = new Human();
        $human->setName($definition['name'] ?? '');
        $human->setAge($definition['age'] ?? 0);
        
        try {
            $human->setGender($definition['gender'] ?? 'other');
        } catch (RuntimeException $exception) {
            throw new LogicException('Human generation error', 500, $exception);
        }
        
        $human->setEye(Eye::createFromArray($definition['eye'] ?? []));
        $human->setHair(Hair::createFromArray($definition['hair'] ?? []));
        
        return $human;
    }
}

