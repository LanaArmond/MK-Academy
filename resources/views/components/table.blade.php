@if ($body != '' )
    <div class="card">
        @if (isset($create) || isset($title))
            <div class="card-header card-outline card-danger">
                <h3 class="float-left m-0 table-title"><strong>{{ $title ?? null }}</strong></h3>
                @if (isset($create))
                    <div class="float-right mr-2">
                        <div class="input-group input-group-sm">
                            <a href="{{ $create }}">
                                <button type="button" class="btn btn-danger button-create">
                                    <b><i class="fas fa-plus-circle"></i> Adicionar</b>
                                </button>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="card-body table-responsive">
            <table  id="example" class="w-100 table table-hover dataTable table-striped">
                <thead class="">
                    <tr>
                        {{ $head ?? null }}
                    </tr>
                </thead>
                <tbody>
                    {{ $body ?? null }}
                </tbody>
            </table>
        </div>
    </div>
@elseif(isset($create))
    <div class="text-center" style="color: #949699">
        <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
        <p class="mb-4 h2">Nenhum item encontrado!</p>
        <a href="{{ $create  }}">
            <button type="button" class="btn btn-dark button-create mb-4">
                <b><i class="fas fa-plus-circle"></i> Adicionar</b>
            </button>
        </a>
    </div>
@elseif(isset($card))
    <div class="text-center pt-4 pb-4" style="color: #949699">
        <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
        <p class="mb-4 h2">
            Nenhum Exercício encontrado! Entre em contato com o {{ $card->personal->name ?? 'Administrador' }}, para que ele possa adicionar exercícios a sua ficha.
        </p>
    </div>
@endif
