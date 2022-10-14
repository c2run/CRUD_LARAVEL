@extends('dashboard.layout')
@section('content')
<div>
    <h1>Actualizar Post {{$post->title}}</h1>
   @include('dashboard.fragment._errors-form')

    <form action="{{route('post.update',$post->id)}}" method="post">
        @method("PUT")
        @include('dashboard/post/_form')
    </form>
</div> 
@endsection