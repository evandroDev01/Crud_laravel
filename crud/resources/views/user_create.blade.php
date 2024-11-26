@extends('master')

@section('content')

<h2>Create</h2>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<form action="{{route('users.store')}}" method='post'>
    @csrf
    <input type="text" name = "name" placeholder = "Preechar Com Seu Nome ">
    <input type="text" name = "email" placeholder = "Preechar Com Seu E-mail ">
    <input type="text" name = "password" placeholder = "Preechar Com Sua Senha ">
    <button type="submit">Save</button>
</form>


@endsection
