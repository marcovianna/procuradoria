<?php

namespace App\Data\Models;

class TipoAndamento extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tipos_andamentos';

    protected $fillable = [
        'nome',
    ];
}
