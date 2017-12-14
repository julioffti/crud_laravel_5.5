
@extends('layouts.layout')

@section('content')
    <h3>Editar cliente</h3>
    @include('form.form_errors')
    <br/><br/>
    <form method="post" action="{{route('clients.update', ['client' => $client->id])}}">
        {{method_field('PUT')}}
        @include('admin.clients.form')
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

@endsection