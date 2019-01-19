<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    <option value="">Please chose product item</option>
    @foreach($products as $product)
        @if($product->level == 0)
            <option value="{{$product->id}}" @if(isset($defaultValue) && $defaultValue == $product->id) selected @endif>
                {{$product->name}}
            </option>
        @endif
    @endforeach
</select>
