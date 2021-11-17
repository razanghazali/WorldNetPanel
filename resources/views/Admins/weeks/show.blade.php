@extends('layouts.test')



@section('title')
   week list
@endsection

@section('content')


    <table class="table">
        <thead>
        <tr>
            <th>$loop</th>

            <th>{{trans('week name') }}</th>
            <th>{{__('start date')}}</th>
            <th>{{__('end date')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->weeks as $a)
                <tr>
                    <td>{{ $loop->first? 'First' : ($loop->last? 'Last' : $loop->iteration) }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->created_at }}</td>
                    <td>{{ $a->finished_at }}</td>
                    <td><a href="{{ route('days.show',$a->id) }}" class="btn btn-md" style="background-color:#00008B;color: yellow">{{__('show')}}</a></td>

                </tr>

        @endforeach
        </tbody>
    </table>
@endsection

