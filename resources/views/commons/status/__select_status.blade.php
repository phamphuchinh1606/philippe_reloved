<select class="form-control" name="{{$selectName}}" @if(isset($required) && $required) required @endif>
    @foreach($statuses as $status)
        <option value="{{$status->id}}" @if(isset($defaultValue) && $defaultValue == $status->id) selected @endif>
            {{$status->name}}
        </option>
    @endforeach
</select>
