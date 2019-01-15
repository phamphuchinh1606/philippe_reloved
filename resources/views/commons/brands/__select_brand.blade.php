<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    @foreach($brands as $brand)
        <option value="{{$brand->id}}" @if(isset($defaultValue) && $defaultValue == $brand->id) selected @endif>
            {{$brand->name}}
        </option>
    @endforeach
</select>
