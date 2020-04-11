<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StaffCard extends Component
{
    public $image;
    public $name;
    public $occupation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $image, string $name, string $occupation)
    {
        $this->image = $image;
        $this->name = $name;
        $this->occupation = $occupation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.staff-card');
    }
}
