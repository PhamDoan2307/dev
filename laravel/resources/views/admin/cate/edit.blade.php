@extends('admin.master')
@section('title')
    Sửa
@endsection
@section('content')

    <div class="col-lg-7" style="padding-bottom:120px">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.cate.postEdit',$data->id)}}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="sltParent">
                    <option value="0">Please Choose Category</option>
                    <?php cate_parent($parent,0,"--",$data->parent_id) ?>

                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="txtCateName" value="{!! old('txtCateName',isset($data) ? $data->name : null) !!}" placeholder="Please Enter Category Name"/>
            </div>
            <div class="form-group">
                <label>Category Order</label>
                <input class="form-control" name="txtOrder" value="{!! $data->order !!}"  placeholder="Please Enter Category Order"/>
            </div>
            <div class="form-group">
                <label>Category Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords"/>
            </div>
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" name="txtDes" rows="3"></textarea>
            </div>
            {{--<div class="form-group">--}}
            {{--<label>Category Status</label>--}}
            {{--<label class="radio-inline">--}}
            {{--<input name="rdoStatus" value="1" checked="" type="radio">Visible--}}
            {{--</label>--}}
            {{--<label class="radio-inline">--}}
            {{--<input name="rdoStatus" value="2" type="radio">Invisible--}}
            {{--</label>--}}
            {{--</div>--}}
            <button type="submit" class="btn btn-default">Category Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
    </div>
@endsection