@extends('layouts.app')

@section('title','Manage Classroom')

@section('css')
@endsection

@section('content')
    <div class="ibox ">
        <div class="ibox-title">
            <h5>
                Manage Classroom
            </h5>
        </div>
        <div class="ibox-tools">
            <div class="tooltip-demo">
                <a href="{{url('/classroom/')}}" class="border border-dark rounded bg-dark p-2">
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
            <form role="form" action="{{ !empty($classroom) ? route('classroom.update', ['classroom' => $classroom->id]) : url('classroom')}}" method="POST">
                @csrf
                @if(!empty($classroom))
                    @method('PATCH')
                @endif
                
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter Name" value="{{old('name', @$classroom->name)}}" name="name" class="form-control">
                </div>
                <div>
                    <button class="btn btn-sm btn-primary w-100" type="submit"><strong>Submit</strong></button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection