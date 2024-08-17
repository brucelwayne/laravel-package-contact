<?php

namespace Brucelwayne\Contact\Components;

use Illuminate\View\Component;

class ContactForm extends Component
{
    public $title;
    public $type;
    public $token;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $type
     * @param string $token
     * @return void
     */
    public function __construct($title, $type, $token)
    {
        $this->title = $title;
        $this->type = $type;
        $this->token = $token;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-form');
    }
}