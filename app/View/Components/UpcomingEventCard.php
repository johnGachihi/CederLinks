<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class UpcomingEventCard extends Component
{
    // TODO: Once Mission/Event model is ready, pass in an instance of the model instead

    public $title;
    public $image;
    private $date;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $image, Carbon $date)
    {
        $this->title = $title;
        $this->image = $image;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.upcoming-event-card')->with([
            'day' => $this->date->day,
            'month' => $this->date->englishMonth,
            'year' => $this->date->year
        ]);
    }
}
