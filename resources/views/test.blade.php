@extends('layout.app')


@section('content')

<h1>Test page</h1>

@if (count($array))
<ul>
@foreach ($array as $arr)
<li>{{$arr}}</li>

@endforeach
</ul>
@endif
@endsection
@section('footer')

<h3>I am a footer</h3>

@endsection