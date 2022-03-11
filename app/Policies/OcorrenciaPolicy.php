<?php

namespace App\Policies;

use App\Models\Ocorrencia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OcorrenciaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return mixed
     */
    public function view(User $user, Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->type == 0 or $user->type == 1);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return mixed
     */
    public function update(User $user, Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return mixed
     */
    public function delete(User $user, Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return mixed
     */
    public function restore(User $user, Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return mixed
     */
    public function forceDelete(User $user, Ocorrencia $ocorrencia)
    {
        //
    }
}
