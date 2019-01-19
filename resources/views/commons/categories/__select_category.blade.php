<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    <option value="">Please chose category item</option>
    @foreach($categories as $category)
        <option value="{{$category->id}}" @if(isset($defaultValue) && $defaultValue == $category->id) selected @endif>
            {{$category->name}}
        </option>
    @endforeach
</select>
