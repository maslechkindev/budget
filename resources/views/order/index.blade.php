@extends('welcome')

@section('content')
    @foreach($periods['month'] as $period)
        <h1>{{$period}}</p>
    @endforeach
@stop