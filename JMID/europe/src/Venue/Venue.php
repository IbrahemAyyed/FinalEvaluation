<?php

    namespace Venue;

    class Venue
    {

        private $date;
        private $address;

        /**
         * Date
         * 
         * Get the date
         */
        public function setDate(DATE $date)
        {
            $this->date = $date;
            return $this;
        }

        /**
         * Date
         * 
         * Get the date
         */
        public function getDate()
        {
            return $this->date;
        }

        /**
         * Address
         * 
         * Get the address
         */
        public function setAddress(ADDRESS $address)
        {
            $this->address = $address;
            return $this;
        }

        /**
         * Address
         * 
         * Get the address
         */
        public function getAddress()
        {
            return $this->address;
        }

    }

?>
