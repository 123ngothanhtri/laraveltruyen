<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Truyen;
class TheLoaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tl=TheLoai::orderBy('id_theloai', 'desc')->get();
        return view('admin.the_loai',['tl'=>$tl]);
    }
    
    function store(Request $r){
        $them = new TheLoai;
        $them->ten_theloai = $r->input_tentheloai;
        $them->save();
        return back();
    }
    function update(Request $r){
        $sua = TheLoai::all()->where('id_theloai',$r->idtl)->first();
        //return $sua;
        $sua->ten_theloai = $r->inp;
        $sua->save();
        return back()->with('msg','Cập nhật thành công');
    }
    function destroy($id){

        $tt=Truyen::all()->where('id_theloai',$id);
        if(count($tt)==0){
            TheLoai::destroy($id);
            return back();
        }
        else{
            return back()->with('msg','Còn truyện thuộc loại này nên không xóa được');
        }
    }
}
