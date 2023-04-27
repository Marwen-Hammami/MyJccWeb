<?php

namespace App\Message;
use App\Entity\Planningfilmsalle;

class PlanningDeletedMessage 
{
    private $planning;

    public function __construct(Planningfilmsalle $planning)
    {
        $this->planning = $planning;
    }

    public function getPlanning(): Planningfilmsalle
    {
        return $this->planning;
    }
}
