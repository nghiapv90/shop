@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>{{$loai->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <h3>{{$err}}<br></h3>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('suatheloai',$loai->id)}}" method="POST">
                    {{csrf_field()}}
                    {{--@foreach($loai as $l)--}}
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" value="{{$loai->name}}" />
                    </div>



                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="{{$loai->description}}" ></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    {{--@endforeach--}}
                    </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    @endsection