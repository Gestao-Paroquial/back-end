@extends('user.base')

@section('title', 'Create User')

@section('container')	
	{{var_dump($errors->get('email'))}}
	<form method="POST" action="/user/add">
		<input type="hidden" name="_token" value = "{{csrf_token()}}" >
		<input type="text" name = "name" placeholder="Name">
		<input type="text" name = "email" placeholder="email">
		<input type="password" name = "password" placeholder="password">
		<input type="password" name = "password_confirmation" placeholder="reenter password">
		<input type="submit" value = "submit">
	</form>
@endsection