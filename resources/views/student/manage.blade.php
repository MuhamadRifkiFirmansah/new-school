@extends('layouts.app')

@section('title','Manage Student')

@section('css')
<link href="{{asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="ibox ">
    <div class="ibox-title">
        <h5>Manage Student</h5>
        <div class="ibox-tools">
        </div>
    </div>
    <div class="ibox-tools">
        <div class="tooltip-demo">
            <a href="{{url('/student/')}}" class="border border-dark rounded bg-dark p-2">
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
        <form role="form" action="{{ !empty($student) ? route('student.update', ['student'=>$student->id]) : url('student')}}" method="POST">
            @csrf
            @if(!empty($student))
                @method('PATCH')
            @endif
            <div class="form-group">
                <label>Student Name</label>
                <input type="text" placeholder="Input Student Name" value="{{old('name', @$student->name)}}" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Classroom</label>
                <select name="classroom" class="select2_demo_1 form-control">
                    <option value="">Select Classroom</option> <!-- Menambahkan satu opsi kosong -->
                    @foreach ($classroom as $item)
                        <option {{old('classroom',@$student->id_classroom == $item->id ? 'selected' : '')}} value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="select2_demo_2 form-control">
                    <option value="">Select Gender</option> <!-- Menambahkan satu opsi kosong -->
                    <option value="Male" {{old('name',@$student->gender == 'Male' ? 'selected' : '')}}>Male</option>
                    <option value="Female" {{old('name',@$student->gender == 'Female' ? 'selected' : '')}}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Parent Number</label>
                <input type="text" placeholder="Input Parent Number" value="{{old('parent_number', @$student->parent_number)}}" name="parent_number" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="Input Email" value="{{old('email', @$student->email)}}" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="select2_demo_2 form-control">
                    <option value="">Pilih Status</option> <!-- Menambahkan satu opsi kosong -->
                    <option value="Active" {{old('status',@$student->status == 'Active' ? 'selected' : '')}}>Active</option>
                    <option value="Inactive" {{old('status',@$student->status == 'Inactive' ? 'selected' : '')}}>Inactive</option>
                </select>
            </div>
            <div>
                <button class="btn btn-sm btn-primary w-100" type="submit"><strong>Submit</strong></button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<!-- Select2 -->
<script src="{{asset('js/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $(".select2_demo_2").select2();
    $(".select2_demo_1").select2();
</script>
@endsection