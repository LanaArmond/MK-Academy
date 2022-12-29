<div class="row">
    <div class="form-group col-sm-6 mt-2">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name',$client->name)}}">
    </div>

    <div class="form-group col-sm-6 mt-2">
        <label for="phone" class="required">Celular</label>
        <input type="phone" name="phone" id="phone" class="form-control" required  value="{{ old('phone', $client->phone )}}">
    </div>

    <div class="form-group col-sm-6 mt-2">
        <label for="email" class="required">Email</label>
        <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $client->email)}}">
    </div>

    <div class="form-group col-sm-6 mt-2">
        <label for="birth_date" class="required">Data de Nascimento </label>
        <input type="date" name="birth_date" id="birth_date" class="form-control" required value="{{ old('birth_date', $client->birth_date)}}">
    </div>

    <div class="form-group col-sm-6 mt-2">
        <label for="cpf" class="required">CPF </label>
        <input type="text" name="cpf" id="cpf" class="form-control" required value="{{ old('cpf', $client->cpf)}}">
    </div>

    <div class="form-group col-sm-6 mt-2">
        <label for="registration_date" class="required">Data de Matricula</label>
        <input type="date" name="registration_date" id="registration_date" class="form-control" required value="{{ old('registration_date', $client->registration_date)}}">
    </div>

    @if($create)
        <div class="form-group col-sm-6 mt-2">
            <label for="password">Senha</label> 
            <div class="input-group">
                <div class="input-group-append" id="visible">
                    <span class="input-group-text rounded-left border-right-0" id="span">
                        <i class="fa fa-eye-slash" id="icon"></i>
                    </span> 
                </div>    
                <input autocomplete="new-password" type="password" class="senhaID form-control" name="password" id="password">
            </div>
        </div>
        <div class="form-group col-sm-6 mt-2">
            <label for="password">Confirme sua senha</label>
            <input autocomplete="new-password" type="password" class="senhaID form-control" name="password_confirmation" id="password">
        </div>

        <div class="form-group col-sm-6 mt-2">
            <label for="image" class="required">imagem</label>
            <input type="file" accept="image/*" class="form-control-file" name="image">
        </div>
    @endif


</div>