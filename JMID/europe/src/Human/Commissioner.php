<?php

namespace Human;

class Commissioner extends Human
{
    private $workAdress;
    private $bodyGuard;
    private $team;

    /**
     * WorkAddress
     * 
     * Get the workAddress
     */
    public function setWorkAddress(ADDRESS $workAdress)
    {
        $this->workAdress = $workAdress;
        return $this;
    }

    /**
     * WorkAddress
     * 
     * Get the getWorkAddress
     */
    public function getWorkAddress()
    {
        return $this->workAddress;
    }

    /**
     * BodyGuard
     * 
     * Get the bodyGuard
     */
    public function setbodyGuard(STRING $bodyGuard)
    {
        $this->bodyGuard = $bodyGuard;
        return $this;
    }

    /**
     * BodyGuard
     * 
     * Get the bodyGuard
     */
    public function getbodyGuard()
    {
        return $this->bodyGuard;
    }

    /**
     * Team
     * 
     * Set the team
     */
    public function setTeam(STRING $team)
    {
        $this->team = $team;
        return $this;
    }

    /**
     * Team
     * 
     * Get the team
     */
    public function getTeam()
    {
        return $this->team;
    }

}

?>