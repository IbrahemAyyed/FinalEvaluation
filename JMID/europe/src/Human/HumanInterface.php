<?php 

    namespace Human;

    interface HumanInterface
    {

        /**
         * Firstname
         * 
         * Set the firstname
         */
        public function setFirstname(STRING $firstname);

        /**
         * Firstname
         * 
         * Get the firstname
         */
        public function getFirstname() : STRING;

        /**
         * Lastname
         * 
         * Set the lastname
         */
        public function setLastname(STRING $lastname);

        /**
         * Lastname
         * 
         * Get the lastname
         */
        public function getLastname() : STRING;

        /**
         * Gender
         * 
         * Set the gender
         * 
         * Only be able to have the value 'm', 'f', 'o'
         */
        public function setGender(STRING $gender);

        /**
         * Gender
         * 
         * Get the gender
         * 
         * Only be able to have the value 'm', 'f', 'o'
         */
        public function getGender() : STRING;

        /**
         * Birthdate
         * 
         * Set the birthdate
         */
        public function setBirthdate(DATE $birthdate);

        /**
         * Birthdate
         * 
         * Get the birthdate
         */
        public function getBirthdate() : DATE;

        /**
         * SignificantOther
         * 
         * Set the significantOther
         */
        public function setSignificantOther(STRING $significantOther);

        /**
         * SignificantOther
         * 
         * Get the significantOther
         */
        public function getSignificantOther() : STRING;

        /**
         * Address
         * 
         * Set the address
         */
        public function setAddress(STRING $address);

        /**
         * Address
         * 
         * Get the address
         */
        public function getAddress() : STRING;

    }

?>