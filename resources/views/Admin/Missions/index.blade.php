@extends('layouts.admin')


<br>
@section('title')
    <br>
    {{__('Missions List')}}
@endsection

@section('content')


    <br>

    <table class="table">
        <thead>
        <tr>
            <th>$loop</th>
            <th>{{trans('mission name') }}</th>
            <th>{{__('username')}} </th>
            <th>{{__('mission date')}}</th>
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
        @foreach($missions as $a)
                <tr>
              <td>{{ $loop->first? 'First' : ($loop->last? 'Last' : $loop->iteration) }}</td>
                <td>{{ $a->name }}</td>
                <td>{{$a->user->name}}</td>
                  <td>{{$a->day->created_at}}</td>
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
                </tr>

        @endforeach
        </tbody>
    </table>


@endsection

