@extends('home.layout')

@section('content')
    <a href="{{ url('/') }} " class="btn" >Trở lại </a>
    <form action="{{ url('tim-kiem-truyen') }}" method="POST" class="form-inline m-2 mt-3">@csrf
        <input class="form-control mr-2 w-50" name="tktk" type="search" placeholder="Tìm kiếm" required>
        <button class="btn btn-outline-success " type="submit">Tìm kiếm</button>
    </form>
    <p>Có {{ count($truyen) }} kết quả tìm kiếm với từ khóa: {{ $tukhoa }}</p>
    <div class="row">
        @foreach ($truyen as $t)
            <div class="col-md-4">
                <div class="card m-2">
                    <div class="card-body">
                        <div style="">
                            <img style="object-fit: contain;width: 100%; height:200px" src="{{ asset('storage/' . $t->hinhanh_truyen) }}" alt="ảnh">
                        </div>
                    </div>
                    <div class="card-footer ">

                        <a href="{{ url('chi-tiet-truyen/' . $t->id_truyen) }}" class="font-weight-bold text-dark">{{ $t->ten_truyen }}</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
