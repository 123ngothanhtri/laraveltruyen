@extends('admin.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Cập nhật truyện</h4>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            <form action="{{ url('truyen-them') }}" method="post" enctype="multipart/form-data" class="form-group">@csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="hidden" name="ipidt" value="{{ $truyen->id_truyen }}">

                        <label>Tên truyện</label>
                        <input class="form-control" type="text" value="{{ $truyen->ten_truyen }}" name="ipt" required>

                        {{-- Thể loại
                <select class="form-control" name="iptl">
                    @foreach ($tl as $i)
                        <option value="{{ $i->id_theloai }}">{{ $i->ten_theloai }}</option>
                    @endforeach
                </select> --}}
                        <label>Tác giả </label>
                        <input class="form-control" type="text" value="{{ $truyen->tacgia_truyen }}" name="iptg" required>

                        <label>Trạng thái</label>
                        <select class="form-control" name="iptt">
                            <option value="Đang kích hoạt">Đang kích hoạt</option>
                            <option value="Chưa kích hoạt">Chưa kích hoạt</option>
                        </select>
                        
                        {{-- Hình ảnh
                <div>
                    <input type="file" name="ipha" id="upload" onchange="preview_image(event)" required accept="image/*" class="form-control">
                    <img id="output_image" class="w-25" />
                </div> --}}
                    </div>
                    <div class="col-md">
                        <label>Nội dung </label>
                        <textarea name="editor" id="editor" rows="30" cols="80">{{ $truyen->noidung_truyen }}</textarea>

                        <input class="btn btn-info mt-2" type="submit" value="Thêm">
                    </div>

                </div>



            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type='text/javascript'>
        CKEDITOR.replace('editor');

        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
