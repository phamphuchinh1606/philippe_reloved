<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    @foreach($colors as $color)
        <option value="{{$color->id}}" @if(isset($defaultValue) && $defaultValue == $color->id) selected @endif>
            {{$color->name}}
        </option>
    @endforeach
</select>
