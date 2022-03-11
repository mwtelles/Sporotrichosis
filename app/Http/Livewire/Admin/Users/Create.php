<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Estado;
use App\Models\Municipio;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public User $user;
    public $saved;
    public $password;
    public $estados = [];
    public $estado;
    public $municipios=[];
    public $municipio;

    public $rules = [
        'user.email' => 'required|email',
        'user.name' => 'required|string',
        'user.type' => 'required|integer',
        'user.crmv' => 'string',
        'password' => 'required|string',
        'municipio' => 'required',

    ];

    public function updatedEstado($value){
        $this->municipios = Estado::find($value)->municipios;
        $this->municipio = $this->municipios[0];
    }


    public function mount($user)
    {
        $this->user = $user;
        $this->estados = Estado::all();
    }

    public function render()
    {
        if(empty($this->municipios)){
            $this->municipios = $this->estados[0]->municipios;
        }
        return view('livewire.admin.users.create');
    }

    public function save(){

        $this->validate();

        if($this->user->type == 0){
            $this->validate([
                'user.crmv' => 'required|string'
            ]);
        }

        $this->user->municipio_id = $this->municipio;


        $this->user->password = Hash::make($this->password);

        $this->user->save();

        $this->saved = 'Usuário cadastrado com sucesso';
    }
}
