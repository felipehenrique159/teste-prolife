<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'placeholder' => 'Digite seu nome']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'placeholder' => 'Digite seu e-mail']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'placeholder' => '(xx)xxxxx-xxxx']) !!}
</div>

<!-- Mensagem Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    {!! Form::textarea('mensagem', null, ['class' => 'form-control', 'placeholder' => 'Digite sua mensagem']) !!}
</div>

<!-- Url Anexo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('url_anexo', 'Url Anexo:') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

