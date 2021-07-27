<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Support\Facades\Storage;
class TruyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $truyen = Truyen::join('theloai', 'truyen.id_theloai', 'theloai.id_theloai')->get();
        return view('admin.truyen',compact('truyen'));
    }

    public function create()
    {
        $tl=TheLoai::all();
        return view('admin.truyen_them',['tl'=>$tl]);
    }

    public function store(Request $r)
    {
        $new =new Truyen;
        $new->ten_truyen = $r->ipt;
        $new->id_theloai = $r->iptl;
        $new->trangthai_truyen = $r->iptt;
        $new->ngaycapnhat_truyen = date('Y-m-d');
        $new->noidung_truyen = $r->editor;
        $new->tacgia_truyen = $r->iptg;
        $new->hinhanh_truyen = $r->file('ipha')->store('hinhanh','public');
        //Storage::disk('public')->putFile('hinhanh', $r->file('input_hinhanh'));

        $new->save();
        return redirect('/truyen')->with('msg','Thêm thành công');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $truyen = Truyen::find($id);
        return view('admin.truyen_sua',compact('truyen'));
    }

    public function update(Request $r)
    {
        $new=Truyen::find($r->ipidt);
        $new->ten_truyen = $r->ipt;
        //$new->id_theloai = $r->iptl;
        $new->trangthai_truyen = $r->iptt;
        $new->ngaycapnhat_truyen = date('Y-m-d');
        $new->noidung_truyen = $r->editor;
        $new->tacgia_truyen = $r->iptg;
        //$new->hinhanh_truyen = $r->file('ipha')->store('hinhanh','public');
        //Storage::disk('public')->putFile('hinhanh', $r->file('input_hinhanh'));

        $new->save();
        return redirect('/truyen')->with('msg','Cập nhật thành công');
    }

    public function destroy($id)
    {
        
        $xoa = Truyen::find($id);
        $xoa->delete();
        Storage::disk('public')->delete($xoa->hinhanh_truyen);

        return back();
    }
}
