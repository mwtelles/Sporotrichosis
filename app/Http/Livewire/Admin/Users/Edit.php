<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Estado;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{

    public User $user;
    public $saved;
    public $password;
    public $estados = [];
    public $estado;
    public $municipios = [];
    public $municipio;

    public $rules = [
        'user.email' => 'required|email',
        'user.name' => 'required|string',
        'user.status' => 'integer',
        'user.crmv' => 'string',
        'user.type' => 'required|integer'
    ];

    public function mount($user)
    {
        $this->user = $user;
        $this->estados = Estado::all();
        $this->estado = $user->municipio->estado->id;
        $this->municipios = $user->municipio->estado->municipios;
        $this->municipio = $this->user->municipio->id;
    }

    public function render()
    {
        return view('livewire.admin.users.edit');
    }

    public function updatedEstado($value){
        $this->municipios = Estado::find($value)->municipios;
        $this->municipio = $this->municipios[0]->id;
    }

    public function save(){
        if($this->password != null){
            $this->user->password = Hash::make($this->password);
        }

        $this->user->municipio_id = $this->municipio;

        $this->user->save();

        $this->saved = 'Usuário modificado com sucesso';


    }

    public function block(){
        $this->user->status = 0;

        $this->user->save();

        $this->saved = 'Usuário desativado com sucesso';
    }

    public function unblock(){
        $this->user->status = 1;

        $this->user->save();

        $this->saved = 'Usuário ativado com sucesso';

    }
}
