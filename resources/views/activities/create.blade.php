<html>
<head>
  <title>Atividades</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link href="/css/app.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div align="center">
            <h1>Adicionar Atividade</h1>
        </div>
        <?php if(!empty(Session::get('message'))){?>
            <div class="notice notice-info">
              <strong>Aviso!</strong> {{ Session::get('message') }}
            </div>
        <?php }?>
        <?php if(!empty($errors->all())){?>
          <div class="notice notice-danger">
            <strong>Aviso!</strong> {{ Html::ul($errors->all()) }}
          </div>
          <?php }?>

        {{ Form::open(array('url' => 'activities')) }}
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Nome:</label>
             <div class="col-sm-10">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="nome" placeholder="Nome">
             </div>
          </div>
      <br /> &nbsp;
      <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Data de Início:</label>
            <div class="col-sm-4">
                <input type="date" name="date_start" value="{{ old('date_start') }}" class="form-control" id="date_start" placeholder="Data Início">
          </div>
          <label class="control-label col-sm-2" for="pwd">Data de Fim:</label>
          <div class="col-sm-4">
              <input type="date" name="date_end" value="{{ old('date_end') }}" class="form-control" id="date_end" placeholder="Data Fim">
          </div>
      </div>
      <br />&nbsp;
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Descrição:</label>
         <div class="col-sm-10">
            {{ Form::textarea('description', old('description'),['class'=>'form-control']) }}
         </div>
      </div>
      <br />&nbsp;
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Status:</label>
         <div class="col-sm-10">
            {{ Form::select('status_id', $status,old('status_id'),['class'=>'form-control']) }}
         </div>
      </div>
    <br /><br />
    {{ Form::submit('Salvar', array('class' => 'btn btn-success')) }}
    <a class="btn btn-small btn-danger" href="{{ URL::to('activities') }}">Cancelar</a>
{{ Form::close() }}
</div>
