@extends('master')

@section('content')

<a href="{{route('users.create')}}">Create</a>

<hr>

<h2>Usuarios</h2>

<ul>
    @foreach($users as $user)
        <li>{{$user->name}} | <a href="{{route('users.edit',['user' => $user->id])}}">Edit</a> | <a href="">Delete</a> | <a href="{{route('users.show',['user' => $user->id])}}">Show</a> </li>
    @endforeach
</ul>

@endsection