<?php

    namespace Commission;

    class Commission implements WorkInterface 
    {

        private $employees;
        private $president;
        private $commissionners;
        private $vicePresidents;

        /**
         * Get the value of employees
         */ 
        public function getEmployees() : array
        {
            return $this->employees;
        }

        /**
         * Set the value of employees
         *
         * @return  self
         */ 
        public function setEmployees(array $employees)
        {
            $this->employees = $employees;

            return $this;
        }

        /**
         * Get the value of president
         */ 
        public function getPresident() : President // because the getter returns the type President.(wich was defined as a class)
        {
            return $this->president;
        }

        /**
         * Set the value of president
         *
         * @return  self
         */ 
        public function setPresident(President $president)
        {
            $this->president = $president;

            return $this;
        }

        /**
         * Get the value of commissionners
         */ 
        public function getCommissionners() : array
        {
            return $this->commissionners;
        }

        /**
         * Set the value of commissionners
         *
         * @return  self
         */ 
        public function setCommissionners(array $commissionners)
        {
            $this->commissionners = $commissionners;

            return $this;
        }

        /**
         * Get the value of vicePresident
         */ 
        public function getVicePresidents() : array
        {
            return $this->vicePresidents;
        }

        /**
         * Set the value of vicePresident
         *
         * @return  self
         */ 
        public function setVicePresidents(array $vicePresidents)
        {
            $this->vicePresidents = $vicePresidents;

            return $this;
        }

        public function pay() : float {
            return $this->pay;
        }

    }  

?>