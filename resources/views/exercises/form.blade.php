<div class="row">
    <div class="form-group col-sm-6 mt-2">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name',$exercise->name) }}">
    </div>


    <div class="form-group col-sm-6 mt-2">
        <label for="seriesNumber" class="required">Número de séries </label>
        <input type="number" name="seriesNumber" id="seriesNumber" class="form-control" required value="{{ old('seriesNumber', $exercise->seriesNumber)}}">
    </div>
    
    <div class="form-group col-sm-6 mt-2">
        <label for="repetitionNumber" class="required">Número de Repetições </label>
        <input type="number" name="repetitionNumber" id="repetitionNumber" class="form-control" required value="{{ old('repetitionNumber', $exercise->repetitionNumber)}}">
    </div>
    
    <div class="form-group col-sm-6 mt-2">
        <label for="tutorialVideo" class="required">Vídeo Tutorial </label>
        <input type="url" name="tutorialVideo" id="tutorialVideo" class="form-control" required value="{{ old('tutorialVideo', $exercise->tutorialVideo)}}">
    </div>
    
    <div class="form-group col-sm-6">
        <label for="equipament_id" class="required">Equipamento</label>
        <select name="equipament_id" id="equipament_id" value="{{old('equipament_id', $exercise->equipament)}}" class="form-control" required>
            <option value="">Selecione Um Equipamento</option>
            @foreach( $equipaments as $equipament)
                <option {{ isset($exercise->equipament) && $equipament->id == $exercise->equipament->id ?? null ? 'selected' : ''}} value="{{ $equipament->id }}">
                    {{ $equipament->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6">
        <label for="description" class="required">Descrição</label>
        <textarea name="description" id="description" cols="20" rows=5" class="form-control" required >{{ old('description', $exercise->description )}}</textarea>
    </div>

</div>
