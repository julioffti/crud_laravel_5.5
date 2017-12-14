@extends('layouts.layout')

@section('content')
    <h3>Novo cliente</h3>
    <h4>{{$clientType == \App\Client::TYPE_INDIVIDUAL? 'Pessoa Física': 'Pessoa Jurídica'}}</h4>
    <a  class="btn btn-primary" href="{{route('clients.create',['client_type' => \App\Client::TYPE_INDIVIDUAL])}}">Pessoa Física</a>
    <a   class="btn btn-primary" href="{{route('clients.create',['client_type' => \App\Client::TYPE_LEGAL])}}">Pessoa Jurídica</a>
    </br></br>

    <br/>
    <form method="post" action="{{route('clients.store')}}">
        @include('admin.clients.form')
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
@endsection