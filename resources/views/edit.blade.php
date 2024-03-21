@extends('layout.template')
@section('konten')


<form action='{{ url('warna/'.$data->kode_warna)}}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{url('warna')}}" class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <label for="kode_warna" class="col-sm-2 col-form-label">Kode Warna</label>
            <div class="col-sm-10">
                {{$data->kode_warna}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_warna" class="col-sm-2 col-form-label">Nama Warna</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_warna' value="{{$data->nama_warna }}" id="nama_warna">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='deskripsi' value="{{$data->deskripsi }}" id="deskripsi">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nilai_rgb" class="col-sm-2 col-form-label">Nilai RGB</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nilai_rgb' value="{{$data->nilai_rgb }}" id="nilai_rgb">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nilai_hex" class="col-sm-2 col-form-label">Nilai HEX</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nilai_hex' value="{{$data->nilai_hex }}" id="nilai_hex">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nilai_hex" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
@endsection
