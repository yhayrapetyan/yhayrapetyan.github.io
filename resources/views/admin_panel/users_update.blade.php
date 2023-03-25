@extends('admin_panel/users_create')

@section('action')
    {{route("admin.users.update",$user['id'])}}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('name', $user['name'])
@section('value', $user['name'])
@section('username', $user['username'])
@section('role', $user['role'])
@section('email', $user['email'])


@section('submit_name', 'Change')
@section('Password', '')
@section('excludePassword', '')

