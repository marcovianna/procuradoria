<?php

namespace App\Data\Repositories;

use App\Data\Models\Andamento;

class Andamentos
{
    public function createFromRequest($request)
    {
        Andamento::create($request->all());

        $request->session()->flash('status', 'Dado salvo com sucesso!');
    }
}
