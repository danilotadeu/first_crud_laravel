<h1>Lista de Cidades</h1>
{{ Session::get('message') }}
<br />
<a class="btn btn-small btn-info" href="{{ URL::to('cidade/create') }}">Adicionar</a>
<table class="table">
  @foreach ($cidades as $cidade)
  <tr>
    <td>{{$cidade->id}}</td>
    <td>{{ $cidade->cidade}}</td>
    <td>
        <a class="btn btn-small btn-info" href="{{ URL::to('cidade/edit/' . $cidade->id) }}">Editar Cidade</a>
        {{ Form::open(array('url' => 'cidade/' . $cidade->id, 'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Deletar', array('class' => 'btn btn-small btn-danger')) }}
        {{ Form::close() }}


    </td>
  </tr>
  @endforeach

</table>