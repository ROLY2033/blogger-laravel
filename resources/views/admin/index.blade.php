@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <p>Welcome to this beautiful admin panel.</p>
    
   <div class="position-absolute w-25  start-50 mt-5    ">

        @isset($lastpost)
        <a  href="{{route('posts.show' , $lastpost)}}"><img class="img-thumbnail rounded-lg position-relative border border-secondary" src="{{ Storage::url($lastpost->image->url)}}" alt="">  </a> 

                <p class=" position-absolute bottom-100 start-0 rounded-fill  w-full  p-2 bg-danger m-0">{{$fecha}} </p>
            
                <p class="position-absolute  top-100 start-50 translate-middle rounded-fill  w-full  p-2 bg-danger m-0  ">{{$lastpost->name}} </p>
        
            </div>
        @endisset
  
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

