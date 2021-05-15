@extends('layout.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 {!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\PostsController@store']) !!}
  {{Carbon\Carbon::now()}}
     <div class="form-group">

       {!! Form::label('title', 'Title:') !!}
       {!! Form::text('title', null , ['placeholder'=>'Enter title']) !!}
       {!! Form::label('body', 'Body:') !!}
       {!! Form::textarea('body', null , ['placeholder'=>'Enter Body']) !!}
       {!! Form::label('author', 'Author:') !!}
       {!! Form::text('author', null , ['placeholder'=>'Enter Author']) !!}
        {!! Form::submit('Submit') !!}
    <div>

{!! Form::close() !!}


@endsection
@section('footer')

<h3>I am a footer</h3>

@endsection
