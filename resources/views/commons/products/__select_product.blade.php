<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    <option value="">Please chose product item</option>
    @foreach($productTree as $treeItem)
        <optgroup label="{{$treeItem->name}}">
            @if(isset($treeItem->childs))
                @foreach($treeItem->childs as $product)
                    <option value="{{$product->id}}" @if(isset($defaultValue) && $defaultValue == $product->id) selected @endif>
                        {{$product->name}}
                    </option>
                @endforeach
            @endif
        </optgroup>
    @endforeach
</select>
