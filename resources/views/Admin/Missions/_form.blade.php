
<div class="border ">
    <br>
<form class="needs-validation ">
    <div class="form-group" hidden>
        <label for="">{{__('user_id')}}</label>
        <input type="text" class="form-control " name="user_id" value="{{Auth::user()->id}}">
    </div>

    <div class="form-group" hidden>
        <label for="">{{__('day_id')}}</label>
        <input type="text" class="form-control " name="day_id" value="{{old('id',$day->id)}}">
    </div>

    <div class="form-row">
        <div class="col-md-3">
            <label for="">{{__('mission name')}}</label>
            <input type="text" class="form-control " name="name" value="{{old('name',$mission->name)}}">
        </div>
        <div class="col-md-3">
            <label for="tags" class="control-label">{{ __('mission type') }}</label>
            <select id="tags" class="form-control"  >
                @foreach($missions as $mi)
                    <option value="{{$mi}}" >{{$mi}} @if($mi == old('mi', $mi)) @endif
                        @endforeach
                    </option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="">{{__('ReportingTime date')}}</label>
                <input type="datetime-local" id="birthdaytime" class="form-control" name="ReportingTime_date" value="{{old('ReportingTime_date',$mission->ReportingTime_date)}}">
        </div>
        <div class="col-md-3">
        <label for="">{{__('reporting method')}}</label>
            <input class="form-control " name="reporting_method" value="{{old('reporting_method',$mission->reporting_method)}}">
        </div>
        <br>
    </div>
        <div class="form-row">
        <div class="col-md-3">
            <label for="validationTooltip03">{{__('ChekOut time')}}</label>
            <input type="time" id="inputMDEx1" class="form-control" name="checkOut_time" value="{{old('checkOut_time',$mission->checkOut_time)}}">
        </div>
        <div class="col-md-3">
            <label for="validationTooltip04">{{__('chekOut Location')}}</label>
            <input  class="form-control" name="chekOutLocation" value="{{old('chekOutLocation',$mission->chekOutLocation)}}">
        </div>
        <div class="col-md-3">
            <label for="">{{__('checkIn time')}}</label>
            <input type="time" id="datetimepicker1" class="form-control"  name="checkIn_time" value="{{old('checkIn_time',$mission->checkIn_time)}}">
        </div>

        <div class="col-md-3 ">
            <label for="">{{__('finish time')}}</label>
            <input type="time" id="inputMDEx1" class="form-control"  name="finish_time" value="{{old('finish_time',$mission->finish_time)}}">
        </div>
        </div>
        <br>
        <div class="form-row">
        <div class="col-md-3 ">
            <label for="">{{__('secCheckout time')}}</label>
            <input type="time" id="inputMDEx1" class="form-control"  name="secCheckout_time" value="{{old('secCheckout_time',$mission->secCheckout_time)}}">
        </div>

        <div class="col-md-3 ">
            <label for="">{{__('chekOut address')}}</label>
            <input  class="form-control" name="chekOut_address" value="{{old('chekOut_address',$mission->chekOut_address)}}">
        </div>
        <div class="col-md-3 ">
            <label for="mission_status" class="control-label">{{ __('mission status') }}</label>
            <select id="mission_status" class="form-control" >
                @foreach($status as $st)
                    <option value="{{$st}} " >{{$st}} @if($st== old('$st', $st)) @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-3 ">
            <label for="">{{__('cost')}}</label>
            <input  class="form-control" name="cost" value="{{old('cost',$mission->cost)}}">
        </div>

    </div>

<br>        <div class="form-group">
    <button type="submit" class="btn  btn-md " style="background-color:#1434A4;color: yellow"> {{trans($button)}}</button>
    </div>

</form>
    <br>
</div>


