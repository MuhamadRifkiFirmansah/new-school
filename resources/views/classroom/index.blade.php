@extends('layouts.app')

@section('title','Data Classroom')

@section('css')
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="ibox ">
    <div class="ibox-title">
        <h5>Data Classroom</h5>
        <div class="ibox-tools">
            <div class="tooltip-demo">
                <a href="{{url('/classroom/create')}}" class="border border-dark rounded bg-dark p-2">
                    <i class="fa fa-plus"></i>
                    Create Classroom
                </a>
            </div>
        </div>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classroom as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="{{ url('classroom/show/'.$item->id) }}"><i class='fa btn btn-info fa-eye'></i></a>
                            <a href="{{ url('classroom/'.$item->id.'/edit') }}"><i class='fa btn btn-warning fa-edit'></i></a>
                            <a href="{{ url('classroom/delete/'.$item->id) }}"><i class='fa fa-trash btn btn-danger'></i></a>
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