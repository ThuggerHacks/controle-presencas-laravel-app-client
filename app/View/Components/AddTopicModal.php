<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddTopicModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $cadeira;

    public function __construct($cadeira)
    {
        $this->cadeira = $cadeira;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-topic-modal');
    }
}
