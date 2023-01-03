<div class="col-md-10 offset-md-1 col-12">
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title title-form">{{ $title ?? null }} </h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="form-adicionar" action="{{ $url ?? '/' }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ $form ?? null }}
            </form>
        </div>
        <div class="card-footer">
            @if($button ?? true)
                <button type="submit" form="form-adicionar" class="btn btn-success float-right">{{$button_name ?? 'Cadastrar'}}</button>
            @endif

            {{ $footer ?? null}}
        </div>
    </div>
</div>
