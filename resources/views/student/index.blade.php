@extends('layouts.app')

@section('title','Data Student')

@section('css')
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif 

    <div class="ibox ">
        <div class="ibox-title">
            <h5>Data Student</h5>
            <div class="ibox-tools">
                <a href="{{url('/student/create')}}" class="border border-dark rounded bg-dark p-2">
                    <i class="fa fa-plus"></i>
                    Create Student
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Classroom</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Parent Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->classroom->name}}</td>
                                <td>{{$item->gender}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->parent_number}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                    <a href="{{ url('student/'.$item->id.'/edit') }}"><i class='fa btn btn-warning fa-edit'></i></a>
                                    <a href="{{ url('student/delete/'.$item->id) }}"><i class='fa fa-trash btn btn-danger'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
@endsection