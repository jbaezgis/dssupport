<?php

namespace App\Http\Livewire;

use App\Mail\ContactFormMailable;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\FuncCall;
use WireUi\Traits\Actions;

class ContactForm extends Component
{
    use Actions;

    public $fullname;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'fullname' => 'required',
        'email' => 'required|email',
        'phone' => 'required|min:10',
        'message' => 'required|min:12'
    ]; 

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $contact = $this->validate();
        Mail::to('jbaezgis@gmail.com')->send(new ContactFormMailable($contact));

        $this->dialog()->show([
            'title'       => __('Thanks') . ' ' . $this->fullname,
            'description' => __('We will contact you as soon as possible'),
            'icon'        => 'success'
        ]);

        $this->resetForm();
    }
    
    public function resetForm()
    {
        $this->fullname = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';

    }
}
