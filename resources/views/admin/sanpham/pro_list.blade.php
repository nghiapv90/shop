@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List - Tong san pham : {{count($allsanpham)}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    <h2>{{session('thongbao')}}</h2>
                </div>
            @endif
            @if(session('thongbaoo'))
                <div class="alert alert-success">
                    <h2>{{session('thongbaoo')}}</h2>
                </div>
            @endif
            @if(session('thongbao1'))
                <div class="alert alert-success">
                    <h2>{{session('thongbao1')}}</h2>
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Promotion_price</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sanpham as $sp)
                <tr class="odd gradeX" align="center">
                    <td>{{$sp->id}}</td>
                    <td>{{$sp->name}}</td>
                    <td>{{number_format($sp->unit_price)}} Dong</td>
                    <td>{{number_format($sp->promotion_price)}} Dong</td>
                    <td>{{$sp->nameTypeProducts}}</td>
                    <td>{{$sp->created_at}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoasanpham',$sp->id)}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suasanpham',$sp->id)}}">Edit</a></td>
                </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="row">{{$sanpham->links()}}</div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    @endsection

@section('script')

    {{--<script lang="javascript" type="text/javascript">--}}
{{--//        $(document).ready(function() {--}}
           {{--$('#theloai').change(function () {--}}
               {{--var idtheloai = $(this).val();--}}
               {{--alert(idtheloai)--}}
               {{--$.get("admin/sanpham/"+idtheloai,function (data) {--}}
                    {{--$("#allsanpham").html(data);--}}
               {{--});--}}
           {{--});--}}
{{--//        });--}}
    {{--</script>--}}

@endsection