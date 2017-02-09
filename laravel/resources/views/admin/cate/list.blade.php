@extends('admin.master')
@section('title')
    Danh sách
@endsection
@section('action')
    Danh sách
@endsection
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
       {{$stt=1 }}
        @foreach($data as $i)
            <tr class="odd gradeX" align="center">
                <td>{!! $stt++ !!}</td>
                <td>{!! $i['name'] !!}</td>
                <td>@if($i['parent_id']==0)
                        {!! "None" !!}
                        @else
                        <?php $parent=DB::table('cates')->where('id',$i['parent_id'])->first();
                        echo $parent->name ?>
                @endif</td>
                <td>Hiện</td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('admin.cate.getDel',$i['id']) !!}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.cate.getEdit',$i['id']) !!}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection