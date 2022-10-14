@extends('dashboard.layout')
@section('content')
<div>
    <h1>Crear Post</h1>
   @include('dashboard.fragment._errors-form')

    <form action="{{route('post.store')}}" method="post">
       @include('dashboard/post/_form')
    </form>
</div> 
@endsection