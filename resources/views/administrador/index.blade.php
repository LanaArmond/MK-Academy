@extends('adminlte::page')

@section('title', 'Mk Academy')

@section('content_header')
    <h1>Administradores</h1>
@stop

@section('content')

    <div class="py-2 d-flex justify-content-end">
        <a type="button" class="mx-2 btn btn-dark" href="{{ route('admin.create') }}">Adicionar Novo</a>
    </div>

    <div class="row">
        @foreach ($admins as $admin)
            
      
            <div class="col-md-3 mt-2">
                <div class="card card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" style="height: 100px;width:100px" src="" alt="User profile picture">
                        </div>
                        <br>
                        <h3 class="profile-username text-center">{{ $admin->getDecrypted($admin->name)}}</h3>
                        <div class="options text-center d-flex mt-2 justify-content-center">
                            {{-- @can('view', $admin) --}}
                            <a href="{{ route('admin.show', $admin->id) }}" class="btn btn-dark mr-2"><i class="fas fa-eye"></i></a>
                            {{-- @endcan --}}
                            {{-- @can('update', $admin) --}}
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary mr-2"><i class="fas fa-pen"></i></a>
                            {{-- @endcan --}}
                            {{-- @can('delete', $admin) --}}
                                <form class="form-delete" action="{{ route('admin.destroy', $admin->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger "><i class="fas fa-trash "></i></button>
                                </form>
                            {{-- @endcan --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
 
@section('css')
    
@stop

@section('js')
    
@stop