{{csrf_field()}}
<input type="hidden" name="client_type" value="{{$clientType}}">

@component('form.form_group', ['field' => 'name'])
<div class="form-group">
    <label for="name">Nome</label>
    <input class="form-control" id="name" name="name" value="{{old('name', $client->name)}}">
</div>
@endcomponent

@component('form.form_group', ['field' => 'phone'])
<div class="form-group">
    <label for="phone">Telefone</label>
    <input class="form-control" id="phone" name="phone" value="{{old('phone', $client->phone)}}" >
</div>
@endcomponent

@component('form.form_group', ['field' => 'email'])
<div class="form-group">
    <label for="email">E-mail</label>
    <input class="form-control" id="email" name="email" value="{{old('email', $client->email)}}">
</div>
@endcomponent


@if($clientType == \App\Client::TYPE_INDIVIDUAL)
    @component('form.form_group', ['field' => 'document_number'])
    <div class="form-group">
        <label for="document_number">CPF</label>
        <input class="form-control" id="document_number" name="document_number" value="{{old('document_number',$client->document_number)}}">
    </div>
    @endcomponent

    @component('form.form_group', ['field' => 'date_birth'])
    <div class="form-group">
        <label for="date_birth">Data Nasc</label>
        <input class="form-control" id="date_birth" name="date_birth" type="date"
               value="{{old('date_birth',$client->date_birth)}}">
    </div>
    @endcomponent

    <label>Sexo</label>
    @php
        $sex = $client->sex;
    @endphp

    @component('form.form_group', ['field' => 'sex'])
    <div class="radio">
        <label>
            <input type="radio" name="sex" value="m" {{old('sex',$sex) == 'm'?'checked="checked"': ''}}> Masculino
        </label>
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="sex" value="f" {{old('sex',$sex) == 'f'?'checked="checked"': ''}}> Feminino
        </label>
    </div>
    @endcomponent

    @component('form.form_group', ['field' =>'marital_status'])
    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
        @php
            $maritalStatus = $client->marital_status;
        @endphp
        <select class="form-control" name="marital_status" id="marital_status" value="{{$maritalStatus}}">
            <option value="">Selecione o estado civil</option>
            <option value="1" {{old('marital_status',$maritalStatus) == 1 ?'selected="selected"': ''}}>Solteiro</option>
            <option value="2" {{old('marital_status',$maritalStatus) == 2 ?'selected="selected"': ''}}>Casado</option>
            <option value="3" {{old('marital_status',$maritalStatus) == 3 ?'selected="selected"': ''}}>Divorciado</option>
            <option value="4" {{old('marital_status',$maritalStatus) == 3 ?'selected="selected"': ''}}>Viúvo</option>
        </select>
    </div>
    @endcomponent

    @component('form.form_group', ['field' => 'deficiency'])
    <div class="form-group">
        <label for="deficiency">Deficiência</label>
        <select class="form-control" name="deficiency" id="deficiency">
            <option value="0" {{old('deficiency', $client->deficiency) == 0 ?'selected="selected"': ''}}>Não possui</option>
            <option value="1" {{old('deficiency', $client->deficiency) == 1 ?'selected="selected"': ''}}>Visual</option>
            <option value="2" {{old('deficiency', $client->deficiency) == 2 ?'selected="selected"': ''}}>Auditiva</option>
            <option value="3" {{old('deficiency', $client->deficiency) == 3 ?'selected="selected"': ''}}>Mental</option>
            <option value="4" {{old('deficiency', $client->deficiency) == 4 ?'selected="selected"': ''}}>Motora</option>
            <option value="5" {{old('deficiency', $client->deficiency) == 5 ?'selected="selected"': ''}}>Múltipla</option>
        </select>
    </div>
    @endcomponent
@else

    @component('form.form_group', ['field' => 'document_number'])
    <div class="form-group">
        <label for="document_number">CNPJ</label>
        <input class="form-control" id="document_number" name="document_number" value="{{old('document_number',$client->document_number)}}">
    </div>
    @endcomponent

    @component('form.form_group', ['field' => 'company_name'])
    <div class="form-group">
        <label for="company_name">Nome Fantasia</label>
        <input class="form-control" id="company_name" name="company_name" value="{{old('company_name', $client->company_name)}}">
    </div>
    @endcomponent
@endif
<div class="checkbox">
    <label>
        <input id="defaulter" name="defaulter" type="checkbox"> Inadimplente ?
    </label>
</div>