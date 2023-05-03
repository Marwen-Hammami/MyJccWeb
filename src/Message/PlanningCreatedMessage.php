<?php

namespace App\Message;

use App\Entity\Planningfilmsalle;

class PlanningCreatedMessage 
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
