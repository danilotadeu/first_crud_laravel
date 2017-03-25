<html>
<head>
    <title>Cidades</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('cidade') }}">Listar Cidades</a></li>
        <li><a href="{{ URL::to('cidade/create') }}">Adicionar Cidade</a>
    </ul>
</nav>

<h1>Editar {{ $cidade->cidade }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($cidade, array('route' => array('cidade.update', $cidade->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('cidade', 'Cidade') }}
        {{ Form::text('cidade', null, array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>