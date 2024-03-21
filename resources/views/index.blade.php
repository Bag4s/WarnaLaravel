@extends('layout.template')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <!-- FORM PENCARIAN -->
            <div class="pb-3">
              <form class="d-flex" action="{{url('warna')}}" method="get">
                  <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                  <button class="btn btn-secondary" type="submit">Cari</button>
              </form>
            </div>
            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
              <a href='{{url('warna/create')}}' class="btn btn-primary">+ Tambah Data</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col">NO</th>
                        <th class="col">Kode Warna</th>
                        <th class="col">Nama Warna</th>
                        <th class="col">Deskripsi</th>
                        <th class="col">Nilai RGB</th>
                        <th class="col">Nilai HEX</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data->firstitem()?>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$item->kode_warna}}</td>
                        <td>{{$item->nama_warna}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td>{{$item->nilai_rgb}}</td>
                        <td>{{$item->nilai_hex}}</td>
                        <td>
                            <a href='{{url('warna/'.$item->kode_warna.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{url('warna/'.$item->kode_warna)}}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{$data->withQueryString()->links()}}
      </div>
        @endsection
          <!-- AKHIR DATA -->