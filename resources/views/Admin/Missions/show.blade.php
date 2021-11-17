@extends('layouts.admin')
<br> <br>
@section('cont')
    <br><br>

    <h2> {{__('create new mission')}}</h2>
    <form action="{{ route('missions.store') }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{csrf_field()}}
        @csrf
        @include('Admin.Missions._form', [
     'button' => 'Add',
    ])
    </form>
@endsection
@section('title')
 {{__('Missions List')}}
@endsection

@section('content')
<br>
    <table class="table">
        <thead>
    <tr>
        <th>$loop</th>
        <th>{{trans('mission name') }}</th>
        <th>{{__('mission type')}} </th>
        <th>{{__('ReportingTime date')}}</th>
        <th>{{__('reporting method')}}</th>
        <th>{{__('checkOut time')}}}</th>
        <th>{{__('chekOut Location')}}</th>
        <th>{{__('checkIn time')}}</th>
        <th>{{__('finish time')}}</th>
        <th>{{__('secCheckout time')}}</th>
        <th>{{__('chekOut address')}}</th>
        <th>{{__('mission status')}}</th>
        <th>{{__('cost')}}</th>
    </tr>
    </thead>
        <tbody>

    @foreach($day->missions as $a)
        @if(Auth::user()->id==$a->user_id || Auth::user()->type=='admin' )
        <tr>
            <td>{{ $loop->first? 'First' : ($loop->last? 'Last' : $loop->iteration) }}</td>
            <td>{{ $a->name }}</td>
            <td>{{ $a->mission_type }}</td>
            <td>{{ $a->ReportingTime_date }}</td>
            <td>{{ $a->reporting_method }}</td>
            <td>{{$a->checkOut_time}}</td>
            <td>{{$a->chekOutLocation}}</td>
            <td>{{$a->checkIn_time}}</td>
            <td>{{$a->finish_time}}</td>
            <td>{{$a->secCheckout_time}}</td>
            <td>{{$a->chekOut_address}}</td>
            <td>{{$a->status}}</td>
            <td>{{$a->cost}}
            @if(Auth::user()->type=='user')
            <td><a href="{{ route('missions.edit', $a->id) }}" class="btn btn-sm btn-dark">Edit</a></td>
            @endif
            @if(Auth::user()->type=='admin')
                <form action="{{ route('checked.store') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{csrf_field()}}
                    @csrf
                  <td>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="checked" value="checked"  >
                          </div>
                      </div>
                      <div class="form-group" hidden>
                          <label for="">{{__('mission_id')}}</label>
                          <input type="text" class="form-control " name="mission_id" value="{{old('id',$a->id)}}">
                      </div>
                  </td>
                </form>
            @endif
        </tr>
        @endif
    @endforeach


</tbody>
</table>


@endsection
