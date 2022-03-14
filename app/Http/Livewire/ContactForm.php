<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
  public $name, $email, $phone, $message, $successMessage;

  protected $rules = [
    'name' => 'required',
    'email' => 'required|email',
    'phone' => 'required|min:9|max:11',
    'message' => 'required|min:6',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function submitForm()
  {
    $attributes = $this->validate();

    Contact::create($attributes);
    $this->successMessage = "We received your message successfully and will get back to you shortly!";
    $this->resetForm();
  }

  private function resetForm()
  {
    $this->name = '';
    $this->email = '';
    $this->phone = '';
    $this->message = '';
  }

  public function render()
  {
    return view('livewire.contact-form');
  }
}
