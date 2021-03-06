@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning">
        {{ session()->get('warning') }}
    </div>
@endif

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th>Nome</th>
    </tr>
    </thead>

    @forelse ($tribunais as $tribunal)
        <tr>
            <td><a href="{{ action('Tribunais@detail', 'id=').$tribunal['id']}}">Detalhe Processo</a></td>
            <td>{{ is_null($tribunal->nome) ? : $tribunal->nome }}</td>
        </tr>
    @empty
        <p>Nenhum tribunal encontrado</p>
    @endforelse
</table>
