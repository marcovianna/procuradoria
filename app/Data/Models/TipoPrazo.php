<?php

namespace App\Data\Models;

class TipoPrazo extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tipos_prazos';

    protected $fillable = [
        'nome',
    ];
}
