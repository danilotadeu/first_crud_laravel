<html>
<head>
	<title>Atividades</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link href="css/app.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div align="center">
			<h1>Lista de Atividades</h1>
		</div>
		{{ Form::open(array('url' => 'activities','method' => 'GET')) }}
			<div class="row">
				<div class="pull-left col-md-4">
					{{ Form::select('status_id', $status,null,['placeholder' => 'Todos','class'=>'form-control']) }}
				</div>
				<div class="pull-left col-md-4">
					{{ Form::select('situation', [1=>'Ativo',0=>'Inativo'],null,['placeholder' => 'Todos','class'=>'form-control']) }}
				</div>
				<div class="pull-left col-md-2">
					{{ Form::submit('Buscar', array('class' => 'btn btn-default')) }}
				</div>
			</div>
		{{ Form::close() }}
		<?php if(!empty(Session::get('message'))){?>
			<div class="notice notice-info">
				<strong>Aviso!</strong> {{ Session::get('message') }}
			</div>
		<?php }?>

		<table class="table">
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Data de Ínicio</th>
				<th>Data de Fim</th>
				<th>Status</th>
				<th>Situação</th>
				<th>Ações</th>
			</tr>
			@foreach ($activities as $act)
			<tr class="<?php echo $act->status->status == 'Concluído'?'success':'' ?>">
				<td>{{ $act->name}}</td>
				<td>{{ $act->description}}</td>
				<td>{{ date('d/m/Y', strtotime($act->date_start))}}</td>
				<td>{{ date('d/m/Y', strtotime($act->date_end))}}</td>
				<td>{{ $act->status->status}}</td>
				<td>{{ $act->active==1?'Ativo':'Inativo'}}</td>
				<td>
					<?php if($act->status->status != 'Concluído'){?>
					<a class="btn btn-small btn-info" href="{{ URL::to('activities/edit/' . $act->id) }}">Editar Atividade</a>
					<?php }?>
				</td>
			</tr>
			@endforeach
		</table>
		<div class="pull-right">
			<a class="btn btn-small btn-success" href="{{ URL::to('activities/create') }}">Adicionar Atividade</a>
		</div>
	</div>
