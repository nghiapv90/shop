@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
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
                <form action="{{route('themsanpham')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label style="font-size: 30px">Chon the loai category</label>
                        <select class="form-control" name="theloai" style="background: springgreen">
                            @foreach($loai as $l)
                            <option value="{{$l->id}}" style="font-size: 30px">{{$l->name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description" placeholder="Please Enter Description" /></textarea>
                    </div>
                    <div class="form-group">
                        <label>Unit_price</label>
                        <input class="form-control"  name="unit_price">
                    </div>
                    <div class="form-group">
                        <label>Promotion_price</label>
                        <input class="form-control"  name="promotion_price">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <label>Dinh dang</label>
                        <label class="radio-inline">
                            <input name="unit" value="hộp" checked="" type="radio">Hộp
                        </label>
                        <label class="radio-inline">
                            <input name="unit" value="cái" type="radio">Cái
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Hang moi hay cu</label>
                        <label class="radio-inline">
                            <input name="new" value="1" checked="" type="radio">New
                        </label>
                        <label class="radio-inline">
                            <input name="new" value="0" type="radio">Old
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection