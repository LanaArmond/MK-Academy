<div class="row">
    <div class="form-group col-sm-6 mt-2">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name',$equipament->name) }}">
    </div>

    <div class="form-group col-sm-6 mt-2">
        <label for="number" class="required">Número</label>
        <input type="number" name="number" id="number" class="form-control" required value="{{ old('number', $equipament->number)}}">
    </div>

    <div class="form-group col-sm-6 mt-2">
        <label for="image" class="required">imagem</label>
        @if(!$create)
            <img src="{{ asset('storage/' . $equipament->image) }}" alt="Imagem do equipamento" class="img-thumbnail">
        @endif
        <input type="file" accept="image/*" class="form-control-file" name="image">
    </div>

</div>