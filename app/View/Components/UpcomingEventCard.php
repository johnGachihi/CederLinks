<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class UpcomingEventCard extends Component
{
    // TODO: Once Mission/Event model is ready, pass in an instance of the model instead

    public ?string $title;
    public ?string $image;
    public ?string $descriptionPreview;
    public ?Carbon $date;

    public function __construct(?string $title,
                                ?string $image,
                                ?string $descriptionPreview,
                                $date)
    {
        $this->title = $title;
        $this->image = $image;
        $this->descriptionPreview = $descriptionPreview;
        $this->date = $date;
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
