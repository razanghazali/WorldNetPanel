@extends('layouts.test')
if
@section('cont')
<form action="{{ route('days.store') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    {{csrf_field()}}
    @csrf
    @include('Admin.days._form', [
 'button' => 'Add',
])
</form>
@endsection


@section('title')
    {{trans('Days list')}}
@endsection

@section('content')
<br>
    <table class="table">
        <thead>
        <tr>
            <th>$loop</th>
            <th>{{trans('week name') }}</th>
            <th>{{__('created at')}}</th>
        </tr>
        </thead>

        <tbody>
        @if($weeks->day->count() > 0)
            @foreach($weeks->day as $a)
                <tr>
                    <td>{{ $loop->first? 'First' : ($loop->last? 'Last' : $loop->iteration) }}</td>
                    <td> {{$a->name}}</a></td>
                    <td>{{$a->created_at}}</td>

                    <td><a href="{{ route('missions.show',$a->id) }}" class="btn btn-md "style="background-color:#1434A4;color: yellow">{{__('show')}}</a></td>
                    @if(Auth::user()->type=='user')
                    <td><form action="{{ route('days.destroy', $a->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-md "style="background-color:#1434A4;color: yellow">{{__('delete')}}</button>
                        </form></td>
                    @endif
                </tr>
            @endforeach
        @endif
        </tbody>

    </table>

@endsection
