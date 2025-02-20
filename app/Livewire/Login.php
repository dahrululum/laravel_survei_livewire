<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
#[\Livewire\Attributes\Layout('components.layouts.guest')]

class Login extends Component
{
    #[\Livewire\Attributes\Rule('required')]
    public string $email = '';
    #[\Livewire\Attributes\Rule('required')]
    public string $password = '';
    

    public function login(){
        // dd('tes login');
        $this->validate();
        if(Auth::attempt(['email'=>$this->email,'password'=>$this->password])){
            return redirect()->route('home');
        }
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],

        ]);

    }
    public function render()
    {
        return view('livewire.login');
    }
}
