<?php

namespace App\Data\Repositories;

use App\Data\Models\Processo;
use Illuminate\Http\Request;

class Processos
{
    public function createFromRequest(Request $request)
    {
        return Processo::create($request->all());
    }
}
