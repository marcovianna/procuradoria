<?php

namespace App\Data\Models;

class Processo extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero_judicial',
        'numero_alerj',
        'tribunal_id', //'origem_id',
        'vara', //'origem_complemento',
        'data_distribuicao',
        'acao_id',
        'relator_id',
        'apensos_obs',
        'juiz_id',
        'autor',
        'reu',
        'objeto',
        'merito',
        'liminar',
        'recurso',
        'procurador_id',
        'estagiario_id',
        'assessor_id',
        'tipo_meio_id',
    ];

    public function andamento()
    {
        return  $this->hasMany(Andamento::class);
    }

    public function tribunal()
    {
        return $this->belongsTo(Tribunal::class);
    }

    public function acao()
    {
        return $this->belongsTo(Acao::class);
    }

    public function relator()
    {
        return $this->belongsTo(Juiz::class);
    }

    public function juiz()
    {
        return $this->belongsTo(Juiz::class);
    }

    public function procurador()
    {
        return $this->belongsTo(User::class);
    }

    public function estagiario()
    {
        return $this->belongsTo(User::class);
    }

    public function assessor()
    {
        return $this->belongsTo(User::class);
    }

    public function tipoMeio()
    {
        return $this->belongsTo(Meio::class);
    }
}
