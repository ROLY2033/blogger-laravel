@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary bt-sm float-right"  href="{{ route('admin.posts.create') }}">crear post</a>
    <h1>Lista de Post</h1>

@stop

@section('content')
     @livewire('admin.posts-index');
@stop


