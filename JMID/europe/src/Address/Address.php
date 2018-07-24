<?php

namespace Address;

class Address {
    private $street;
    private $zipCode;
    private $city;
    private $country;

    /**
     * Get the value of street
     */ 
    public function getStreet() : string {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */ 
    public function setStreet(string $street) {
        $this->street = $street;

        return $this;
    }
    

    /**
     * Get the value of zipCode
     */ 
    public function getZipCode() : string {
        return $this->zip_code;
    }

    /**
     * Set the value of zipCode
     *
     * @return  self
     */ 
    public function setZipCode(string $zip_code) {
        $this->zip_code = $zip_code;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity() : string {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity(string $city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry() : string {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry(string $country) {
        $this->country = $country;

        return $this;
    }
}