
<h2>{{__('create new week')}}</h2>
<br>
<form class="needs-validation" novalidate>
    <div class="form-row" >
        <div class="col-md-4 mb-3">
            <label for="validationCustom01">{{__('week name')}}</label>
            <input type="text"  aria-describedby="inputGroup-sizing-sm"  name="name"  value="{{$wek->name}}" >
        </div>

        <div class="form-group" hidden="hidden">
            <label for="">user</label>
            <textarea class="form-control" name="user_id">{{Auth::user()->id}}</textarea>
        </div>

        <div class="col-md-4 mb-3">
            <label for="start">{{__('start date')}}</label>
            <input type="date" id="start" name="created_at"
    min="2021-01-01" max="2050-12-31"  value="{{$wek->created_at}}">
        </div>
        <div class="col-md-4 mb-3">
            <label for="start">{{__('end date')}}</label>
            <input type="date" id="start" name="finished_at"

                   min="2021-01-01" max="2050-12-31" value="{{$wek->finished_at}}">
        </div>
        <button type="submit" class="btn  " style="background-color:#1434A4;color: yellow" > {{trans($button)}}</button>

    </div>
</form>
<br>
