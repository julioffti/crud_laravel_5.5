@extends('layouts.layout')

@section('content')
    <h3>Ver cliente</h3>
    <a class="btn btn-primary" href="{{ route('clients.edit',['client' => $client->id]) }}">Editar</a>
    <a class="btn btn-danger" href="{{ route('clients.destroy',['client' => $client->id]) }}"
       onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete-{{$client->id}}').submit();}">Excluir</a>
    <form id="form-delete-{{$client->id}}"style="display: none" action="{{ route('clients.destroy',['client' => $client->id]) }}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>
    <br/><br/>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$client->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$client->name}}</td>
        </tr>
        <tr>
            <th scope="row">Documento</th>
            <td>{{$client->document_number_formatted}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{$client->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{$client->phone}}</td>
        </tr>
        <tr>
            @if($client->client_type == 'individual')
            <th scope="row">Estado Civil</th>
            <td>
                @switch($client->marital_status)
                    @case(1)
                    Solteiro
                    @break

                    @case(2)
                    Casado
                    @break

                    @case(3)
                    Divorciado
                    @break

                    @case(4)
                    Viúvo
                    @break
                @endswitch
            </td>
            @endif
        </tr>
        <tr>
            @if($client->client_type == 'individual')
            <th scope="row">Data Nasc.</th>
            <td>{{$client->date_birth_formatted}}</td>
            @endif
        </tr>
        <tr>
            @if($client->client_type == 'individual')
                <th scope="row">Sexo</th>
                <td>{{($client->sex == 'm' ? 'Masculino' : 'Feminino')}}</td>
            @endif
        </tr>
        <tr>
            @if($client->client_type == 'individual')
            <th scope="row">Def. Física</th>
            <td>
                @switch($client->deficiency)
                    @case(1)
                    Visual
                    @break
                    @case(2)
                    Auditiva
                    @break
                    @case(3)
                    Mental
                    @break
                    @case(4)
                    Motora
                    @break
                    @case(5)
                    Múltipla
                    @break
                    @default
                    Não possui
                    @break
                @endswitch
            </td>
            @endif
        </tr>
        <tr>
            <th scope="row">Inadimplente</th>
            <td>{{$client->defaulter?'Sim': 'Não'}}</td>
        </tr>
        </tbody>
    </table>
    </tbody>
    </table>
@endsection