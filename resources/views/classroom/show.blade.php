@extends('layouts.app')

@section('title','Data Classroom')

@section('css')
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

@endsection

@section('content')
<div class="ibox ">
    <div class="ibox-title">
        <h5>Data Classroom {{$classroom->name}}</h5>
        <div class="ibox-tools">
        </div>
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
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Parent Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classroom->student as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->parent_number}}</td>
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
                ]

            });

        });

    </script>
@endsection