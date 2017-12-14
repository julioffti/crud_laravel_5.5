@extends('layouts.layout')

@section('content')
    <h3>Listagem de pessoas físicas e jurídicas</h3>
    <br/>

    <div class="row">
        <form method="GET" action="{{route('clients.store')}}" class="form">
            <div class="form-group">
                <label for="busca">Buscar clientes</label>
                <input class="form-control" name="busca" id="busca" type="text" placeholder="Digite aqui a sua busca">

                </br>

                <div class="form-group">
                    <input class="btn btn-primary" value="Buscar cliente" type="submit">
                </div>
            </div>
            </br>
        </form>
    </div>



    <a class="btn btn-primary" href="{{route('clients.create')}}">Criar novo</a>
    <br/><br/>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF/CNPJ</th>
            <th>Data Nasc</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->document_number_formatted}}</td>
                <td>{{$client->date_birth_formatted}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->phone}}</td>
                <td>
                @if($client->client_type == 'individual')
                 {{($client->sex == 'm' ? 'Masculino' : 'Feminino')}}
                @endif
                </td>
                <td>
                <ul class="list-inline list-small">
                      <a href="{{route('clients.edit', ['client' => $client->id])}}" class="btn btn-info">Editar</a>

                        <a href="{{route('clients.show', ['client' => $client->id])}}" class="btn btn-info">Ver</a>

                        <a class="btn btn-danger" href="{{ route('clients.destroy',['client' => $client->id]) }}"
                           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-deletar-{{$client->id}}').submit();}">Excluir</a>
                        <form id="form-deletar-{{$client->id}}"style="display: none" action="{{ route('clients.destroy',['client' => $client->id]) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                        </form>

                    </ul>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$clients->links()}}
@endsection