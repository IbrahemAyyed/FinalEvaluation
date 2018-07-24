<?php 

    namespace Human;

    class Human implements HumanInterface
    {

        private $firstname;
        private $lastname;
        private $gender;
        private $birthdate;
        private $significantOther;
        private $address;
        private $work;

        /**
         * Firstname
         * 
         * Set the firstname
         */
        public function setFirstname(STRING $firstname)
        {
            $this->firstname = $firstname;
            return $this;
        }

        /**
         * Firstname
         * 
         * Get the firstname
         */
        public function getFirstname() : STRING
        {
            return $this->firstname;
        }

        /**
         * Lastname
         * 
         * Set the lastname
         */
        public function setLastname(STRING $lastname)
        {
            $this->lastname = $lastname;
            return $this;
        }

        /**
         * Lastname
         * 
         * Get the lastname
         */
        public function getLastname() : STRING
        {
            return $this->lastname;
        }

        /**
         * Gender
         * 
         * Set the gender
         * 
         * Only be able to have the value 'm', 'f', 'o'
         */
        public function setGender(STRING $gender)
        {
            if(!in_array($gender, ['m', 'f', 'o']))
            {
                throw new \RuntimeException('Gender is not allowed');
            }

            $this->gender = $gender;
            return $this;
        }

        /**
         * Gender
         * 
         * Get the gender
         * 
         * Only be able to have the value 'm', 'f', 'o'
         */
        public function getGender() : STRING
        {
            return $this->gender;
        }

        /**
         * Birthdate
         * 
         * Set the birthdate
         */
        public function setBirthdate(DATE $birthdate)
        {
            $this->birthdate = $birthdate;
            return $this;
        }

        /**
         * Birthdate
         * 
         * Get the birthdate
         */
        public function getBirthdate() : DATE
        {
            return $this->birthdate;
        }

        /**
         * SignificantOther
         * 
         * Set the significantOther
         */
        public function setSignificantOther(STRING $significantOther)
        {
            $this->significantOther = $significantOther;
            return $this;
        }

        /**
         * SignificantOther
         * 
         * Get the significantOther
         */
        public function getSignificantOther() : STRING
        {
            return $this->significantOther;
        }

        /**
         * Address
         * 
         * Set the address
         */
        public function setAddress(STRING $address)
        {
            $this->address = $address;
            return $this;
        }

        /**
         * Address
         * 
         * Get the address
         */
        public function getAddress() : STRING
        {
            return $this->address;
        }

        /**
         * From array
         * 
         * Create a new Human instance from an array of value
         * 
         * @param array $definition The array of value
         * 
         * @return Human
         */
        public static function fromArray(array $definition)
        {
            $human = new Human();
            $human->setFirstname($definition['firstname'] ?? '')
                ->setLastname($definition['lastname'] ?? '')
                ->setGender($definition['gender'] ?? '')
                ->setBirthdate($definition['birthday'] ?? '')
                ->setAddress($definition['address'] ?? '')
                ->setWork($definition['work'] ?? '');
            
            return $human;
        }

    }

?>