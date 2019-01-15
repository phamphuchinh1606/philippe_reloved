<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    @foreach($products as $product)
        <option value="{{$product->id}}" @if(isset($defaultValue) && $defaultValue == $product->id) selected @endif>
            {{$product->name}}
        </option>
    @endforeach
</select>
