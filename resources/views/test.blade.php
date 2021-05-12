@extends('layout.app')


@section('content')

<h1>Test page</h1>

@if ($posts)
<ul>
@foreach ($posts as $post)
<li>{{$post}}</li>

@endforeach
</ul>
@endif
@endsection
@section('footer')

<h3>I am a footer</h3>

@endsection
