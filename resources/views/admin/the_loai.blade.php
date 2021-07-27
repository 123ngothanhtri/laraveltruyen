@extends('admin.layout')

@section('content')
<div class="card">
  <div class="card-header">
    <h3>Thể loại truyện</h3>
  </div>
  <div class="card-body">
    @if (session('msg'))
        <div class="alert alert-success">
          {{session('msg')}}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <button class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#myModal">
        Thêm thể loại 
      </button>
      <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Thêm thể loại</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('the-loai-them') }}" method="post">@csrf
                    <input class="form-control" type="text" placeholder="Tên thể loại" name="input_tentheloai" required autofocus><br/>
                    <input class="btn btn-sm btn-info" type="submit" value="Thêm">
                  </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
    <table class="table table-hover table-sm">
        <tr class="font-weight-bold table-info">
            <td>Mã thể loại</td>
            <td>Tên thể loại</td>
        </tr>
        @foreach ($tl as $x)
            <tr>
                <td>{{ $x->id_theloai }}</td>
                <td>
                    <form action="{{ url('the-loai-sua') }}" method="post" class="form-inline">@csrf
                        <input type="hidden" value="{{ $x->id_theloai }}" name="idtl">
                        <input type="text" value="{{ $x->ten_theloai }}" placeholder="Tên thể loại" name="inp" required class="form-control" ><br/>
                        <input class="btn btn-sm btn-outline-info mx-1" type="submit" value="Lưu lại">
                        <a onclick="return confirm('Xóa thật chứ ?');" href="{{url('the-loai-xoa/'.$x->id_theloai)}}" class="btn btn-sm btn-outline-danger">Xóa</a>
                    </form>
                
                  
                </td>
            </tr>
        @endforeach
    </table>
  </div>
</div>

    
@endsection
