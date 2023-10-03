@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>

                    @if($user->roles_id == 1)
                        Anda Login Sebagai Admin
                    @elseif($user->roles_id == 2)
                        Anda Login Sebagai Guru
                    @endif

                </div>
            </div>
        </div>
    </div>
@stop
