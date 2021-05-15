@extends('layout.app')

@section('content')
    <h1>{{$post->title}}</h1>
<a href="{{route('posts.edit',$post->id)}}"> Edit Page</a>
@endsection
