<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Truyen;
class HomeController extends Controller
{
    
    public function trangchu()
    {
        $truyen=Truyen::orderBy('id_truyen', 'desc')->get();
        $theloai=TheLoai::all();
        return view('home.trang_chu',compact('truyen','theloai'));
    }
    public function chitiettruyen($id)
    {
        $truyen=Truyen::find($id);
        $truyen->luotxem_truyen+=1;
        $truyen->save();
        return view('home.chi_tiet_truyen',compact('truyen'));
    }
    function timkiemtruyen(Request $r){
        $tukhoa=$r->tktk;
        //$lt=LoaiBaiViet::all();
        $truyen=Truyen::join('theloai', 'truyen.id_theloai', 'theloai.id_theloai')
                    ->where('ten_truyen','like',"%$tukhoa%")
                    ->get();//->stake(30)->paginate(5);
        return view('home.tim_kiem_truyen',compact('truyen','tukhoa'));
    }
    public function loc($id_theloai)
    {
        $truyen=Truyen::where('id_theloai',$id_theloai)->get();
       $xn=$id_theloai;
        $theloai=TheLoai::all();
        return view('home.trang_chu',compact('truyen','theloai','xn'));
    }
    
}
