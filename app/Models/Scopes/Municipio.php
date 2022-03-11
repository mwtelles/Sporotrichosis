<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class Municipio implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return Builder
     */
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->user()->type == 2) {
            return $builder->whereHas('animal', function ($q) {
                return $q->whereHas('responsavel_animal', function ($qu) {
                    return $qu->whereHas('proprietario_e_tutor', function ($que) {
                        return $que->where('proprietario_e_tutor.municipio_id', auth()->user()->municipio->id);
                    })->orWhereHas('ong_e_protetor', function ($que) {
                        return $que->where('ong_e_protetor.municipio_id', auth()->user()->municipio->id);
                    });
                });
            });
        }

    }
}
