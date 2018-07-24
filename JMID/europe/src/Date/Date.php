<?php
    namespace Date;

    class Date{

        public $day;
        public $month;
        public $year;

        /**
         * Get the value of day
         */ 
        public function getDay() : int 
        {
                return $this->day;
        }

        /**
         * Set the value of day
         *
         * @return  self
         */ 
        public function setDay(int $day)
        {
                $this->day = $day;

                return $this;
        }

        /**
         * Get the value of month
         */ 
        public function getMonth() : int
        {
                return $this->month;
        }

        /**
         * Set the value of month
         *
         * @return  self
         */ 
        public function setMonth(int $month)
        {
                $this->month = $month;

                return $this;
        }

        /**
         * Get the value of year
         */ 
        public function getYear() : int
        {
                return $this->year;
        }

        /**
         * Set the value of year
         *
         * @return  self
         */ 
        public function setYear(int $year)
        {
                $this->year = $year;

                return $this;
        }
    }
?>