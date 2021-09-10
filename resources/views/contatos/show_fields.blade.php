<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $contatos->nome }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $contatos->email }}</p>
</div>

<!-- Telefone Field -->
<div class="col-sm-12">
    {!! Form::label('telefone', 'Telefone:') !!}
    <p>{{ $contatos->telefone }}</p>
</div>

<!-- Mensagem Field -->
<div class="col-sm-12">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    <p>{{ $contatos->mensagem }}</p>
</div>

<!-- Url Anexo Field -->
<div class="col-sm-12">
    {!! Form::label('url_anexo', 'Url Anexo:') !!}
    <p>{{ $contatos->url_anexo }}</p>
</div>

