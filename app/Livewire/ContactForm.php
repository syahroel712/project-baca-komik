<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;
    public $success = false;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'message' => 'required|string|min:10',
    ];

    public function submit()
    {
        $this->validate();

        // Dummy: kita cuma set success flag
        $this->success = true;

        // Reset form
        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
