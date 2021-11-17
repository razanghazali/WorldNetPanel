@extends('layouts.admin')


@section('cont')
    <h2> {{__('update  mission')}}</h2>
    <br>
    @if(Auth::user()->type=='user')

        <form action="{{ route('missions.update', $mission->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('admin.Missions.eform', [
                'button' => 'Update'
            ])
        </form>
    @endif
@endsection




