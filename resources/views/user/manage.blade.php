@extends('layouts.app')

@section('title','Manage User')

@section('content')
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Manage User</h5>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-tools">
            <div class="tooltip-demo">
                <a href="{{url('/user/')}}" class="border border-dark rounded bg-dark p-2">
                    <i class="fa fa-"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="ibox-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form role="form" action="{{ !empty($user) ? url('user/update/'.@$user->id) : url('user')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter Name" value="{{old('name', @$user->name)}}" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Enter Email" value="{{old('email', @$user->email)}}" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="Enter password" name="password" class="form-control">
                </div>
                <div>
                    <button class="btn btn-sm btn-primary w-100" type="submit"><strong>Submit</strong></button>
                </div>
            </form>
        </div>
    </div>
@endsection