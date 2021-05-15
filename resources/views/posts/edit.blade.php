@extends('layout.app')

@section('content')
<h3>Edit</h3>
{!! Form::model($post, ['method'=> 'PATCH','action'=>['App\Http\Controllers\PostsController@update',$post->id]]) !!}



    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null) !!}
    {!! Form::label('body', 'Body') !!}
    {!! Form::text('body', null) !!}


    {!! Form::submit('Edit Post') !!}

{!! Form::close() !!}
<h3>Delete</h3>
{!! Form::open(['method'=> 'DELETE','action'=> ['App\Http\Controllers\PostsController@destroy',$post->id]]) !!}

       {!! Form::submit('Delete Post') !!}

    {!! Form::close() !!}


@endsection
@section('footer')

<h3>I am a footer</h3>

@endsection
