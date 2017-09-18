@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                    <div class="alert alert-success">
                        <h2>{{session('thongbao')}}</h2>
                    </div>
                @endif
            @if(session('thongbao1'))
                <div class="alert alert-success">
                    <h2>{{session('thongbao1')}}</h2>
                </div>
            @endif
            @if(session('thongbao2'))
                <div class="alert alert-success">
                    <h2>{{session('thongbao2')}}</h2>
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($loai as $l)
                <tr class="odd gradeX" align="center">

                    <td>{{$l->id}}</td>
                    <td>{{$l->name}}</td>
                    <td>{{$l->description}}</td>
                    {{--<td>Hiện</td>--}}
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoatheloai',$l->id)}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suatheloai',$l->id)}}">Edit</a></td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    @endsection