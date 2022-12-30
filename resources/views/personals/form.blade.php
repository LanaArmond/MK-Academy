<form method="POST" action="{{ $url ?? '/' }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-sm-12 col-md-6">
            <label for="name" class="required">Nome: </label>
            <input type="text" name="name" id="name" autofocus="" class="form-control" required="" value="{{ old('name', $personal->name) }}">
        </div>

        <div class="form-group col-sm-12 col-md-6">
            <label for="email" class="required">Email: </label>
            <input type="email" name="email" id="email" class="form-control" required=" " value="{{ old('email', $personal->email) }}">
        </div>

            <div class="form-group col-6">
                <label for="password">Senha: </label>
                <div class="input-group">
                    <div class="input-group-append" id="visible">
                        <span class="input-group-text rounded-left border-right-0" id="span">
                            <i class="fa fa-eye-slash" id="icon"></i>
                        </span>
                    </div>
                    <input autocomplete="new-password" type="password" class="senhaID form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="password">Confirmação da senha: </label>
                <input autocomplete="new-password" type="password" class="senhaID form-control" name="password_confirmation" id="password">
            </div>

            <div class="form-group col-sm-6">
                <label for="picture">Foto de perfil: </label>
                <input type="file" accept="image/*" class="form-control-file" name="picture" id="picture">
            </div>
    </div>
</form>
