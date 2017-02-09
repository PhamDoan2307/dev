<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller
{
    public function getList()
    {
        $data = Cate::select('id', 'name', 'parent_id')->orderBy('id', 'DESC')->get();
        return view('admin.cate.list', compact('data'));
    }

    public function getAdd()
    {
        $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        return view('admin.cate.add', ['parent' => $parent]);
    }

    public function postAdd(CateRequest $request)
    {
        $cate = new Cate();
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->parent_id = $request->sltParent;
        $cate->keywords = $request->txtKeywords;
        $cate->description = $request->txtDes;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_lv'=>'success','flash_msg' => 'Thêm mới thành công']);
    }
    public function getEdit($id)
    {
        $data=Cate::find($id);
        $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
        return view('admin.cate.edit', ['parent' => $parent,'data'=>$data,'id'=>$id]);
    }

    public function postEdit(Request $request,$id)
    {
        $cate = Cate::find($id);
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->order = $request->txtOrder;
        $cate->parent_id = $request->sltParent;
        $cate->keywords = $request->txtKeywords;
        $cate->description = $request->txtDes;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_lv'=>'success','flash_msg' => 'Sửa thành công']);
    }
    public function getDel($id){
        $parent=Cate::where('parent_id',$id)->count();
        if($parent==0)
        {
            $level='success';
            Cate::find($id)->delete();
            return redirect('admin/cate')->with(['level' =>$level],['flash_msg' => 'Xóa thành công sản phẩm ']);
        }
        else{
            $level='success';
//            echo "<script type='text/javascript'>alert('Bạn không thể xóa thư mục cha này!')</script>";
            return redirect('admin/cate')->with(['level' =>$level],['flash_msg'=>'Thư mục cha không được phép xóa!']);
        }
    }
}
