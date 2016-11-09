@extends('welcome')

@section('content')
    @foreach($data as $post)
        <h1>{{$post->title}}</h1>
        <p>{!! $post->title !!}</p>
        <p>{!! $post->content !!}</p>
    @endforeach
@stop