<html>
<head>
    <title>Cidades</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cidade') }}">Listar cidades</a></li>
        <li><a href="{{ URL::to('cidade/create') }}">Criar cidade</a>
    </ul>
</nav>

<h1>Create a Nerd</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'cidade')) }}

    <div class="form-group">
        {{ Form::label('cidade', 'Cidade') }}
        {{ Form::text('cidade', '') }}
    </div>


{{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

</div>
</body>
</html>