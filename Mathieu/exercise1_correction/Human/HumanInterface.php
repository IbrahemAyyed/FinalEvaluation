<?php
namespace Human;
interface HumanInterface
{
    Public function getName(): string;
    Public function setName();



    Public function getGender(): string;
    Public function setGender();

    Public function getAge(): int;
    Public function setAge();

    Public function getEye(): ?\Eye;
    Public function setEye();

    Public function getHair(): ?\Hair;
    Public function setHair();

    
}