<div class="table-responsive">
    <table class="table" id="contatos-table">
        <thead>
            <tr>
                <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Mensagem</th>
        <th>Url Anexo</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contatos as $contatos)
            <tr>
                <td>{{ $contatos->nome }}</td>
            <td>{{ $contatos->email }}</td>
            <td>{{ $contatos->telefone }}</td>
            <td>{{ $contatos->mensagem }}</td>
            <td>{{ $contatos->url_anexo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contatos.destroy', $contatos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contatos.show', [$contatos->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contatos.edit', [$contatos->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza sobre essa ação?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
