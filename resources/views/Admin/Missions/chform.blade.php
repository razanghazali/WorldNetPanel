<div class="form-group">
    <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checked" value="checked" @if(old('checked',)) checked @endif>

        </div>
</div>
<div class="form-group" hidden>
    <label for="">{{__('mission_id')}}</label>
    <input type="text" class="form-control " name="mission_id" value="{{old('id',$a->id)}}">
</div>
