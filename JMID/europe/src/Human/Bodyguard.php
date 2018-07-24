<?php

    namespace Human;

    class Bodyguard extends Human 
    {
        private $protecte;

        /**
         * Get the value of protecte
         */ 
        public function getProtecte() : ?Protecte {
            return $this->commissionner;
        }

        /**
         * Set the value of protecte
         *
         * @return  self
         */ 
        public function setProtecte(STRING $protecte)
        {
            $this->protecte = $protecte;

            return $this;
        }
    }

?>