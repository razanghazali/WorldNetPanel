<h2>{{__('create new day')}}</h2>
<br>
<form class="needs-validation" novalidate>
    <div class="form-row">
        <div class="form-group">
        <select class="form-select" aria-label="Default select example" name="name">
            <option selected>select day </option>
            @foreach($days as $day)

            <option value="{{$day}}">{{$day}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group" hidden="hidden">
            <label for="">user</label>
            <textarea class="form-control" name="user_id">{{Auth::user()->id}}</textarea>
        </div>

        <div class="form-group"  hidden="hidden" >
            <label for="">week_id</label>
            <textarea class="form-control" name="week_id">{{$weeks->id}}</textarea>
        </div>

    </div>

    <button type="submit" class="btn btn-md" style="background-color:#1434A4;color: yellow"> {{trans($button)}}</button>
</form>
<br>

