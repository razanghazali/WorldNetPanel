@extends('layouts.test')


@section('cont')
    <form action="{{ route('weeks.store') }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{csrf_field()}}
        @csrf
        @include('Admin.week._form', [
     'button' => 'Add',
 ])
    </form>
@endsection

@section('title')
    {{(($title))}}
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

        @foreach($weeks as $week)
            @if(Auth::user()->id==$week->user_id)
            <tr>
                <td>{{ $loop->first? 'First' : ($loop->last? 'Last' : $loop->iteration) }}</td>
                <td>{{ $week->name }}</td>
                <td>{{ $week->created_at }}</td>
                <td>{{ $week->finished_at }}</td>
                <td style="color: yellow">
                    <a href="{{ route('days.show',$week->id) }}" class="btn btn-md " style="background-color:#1434A4;color: yellow" >{{__('show')}}</a></td>
                @if(Auth::user()->type=='user')
            <td><form action="{{ route('weeks.destroy', $week->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-md " style="background-color:#1434A4;color: yellow">{{__('delete')}}</button>
                </form></td>
                @endif
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
