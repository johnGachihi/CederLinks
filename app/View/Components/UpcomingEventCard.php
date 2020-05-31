<?php

namespace App\View\Components;

use App\Mission;
use Carbon\Carbon;
use Illuminate\View\Component;

class UpcomingEventCard extends Component
{
    public Mission $mission;

    public function __construct(Mission $mission)
    {
        $this->mission = $mission;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.upcoming-event-card');
    }
}
