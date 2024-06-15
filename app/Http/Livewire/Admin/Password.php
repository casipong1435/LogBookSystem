<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;


class Password extends Component
{

    public $password;
    public $confirm_password;


    public function render()
    {
        return view('livewire.admin.password');
    }

    public function changePassword(){
        $this->validate([
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'

        ]);

        try{
            
        } catch(\Exception $e){

        }
    }
}
