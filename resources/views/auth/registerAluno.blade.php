<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="POST" action="/registro/aluno" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nome:')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('E-mail:')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="cpf" :value="__('Cpf:')" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required autofocus />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="number" :value="__('Telefone:')" />
                <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autofocus />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="registration_date" :value="__('Data de Nascimento:')" />
                <x-text-input id="registration_date" class="block mt-1 w-full" type="date" name="registration_date" :value="old('registration_date')" required autofocus />
                <x-input-error :messages="$errors->get('registration_date')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="birth_date" :value="__('Data de Matrícula:')" />
                <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required autofocus />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>

<br>
            <div class="form-group col-sm-6">
                <label for="picture">Imagem </label>
                <input type="file" accept="image/*" class="form-control-file" id="picture" name="picture">
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha:')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmação de senha:')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Já tem cadastro?') }}
                </a>
                <button type="submit" class="btn btn-success float-right">Cadastrar</button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
