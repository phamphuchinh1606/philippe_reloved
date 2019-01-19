<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    <option value="">Please chose status item</option>
    @foreach($statuses as $status)
        <option value="{{$status->id}}" @if(isset($defaultValue) && $defaultValue == $status->id) selected @endif>
            {{$status->name}}
        </option>
    @endforeach
</select>
