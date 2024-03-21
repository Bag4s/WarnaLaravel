<?php

namespace App\Http\Controllers;
use App\Models\warna;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class warnaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 6;
        if(strlen($katakunci)){
            $data = warna::where('kode_warna','like',"%$katakunci%")
                ->orWhere('nama_warna','like',"%$katakunci%")
                ->orWhere('nilai_rgb','like',"%$katakunci")
                ->orWhere('nilai_hex','like',"%$katakunci")
                ->paginate($jumlahbaris);
        }else{
            $data = warna::orderBy('kode_warna','desc')->paginate($jumlahbaris);
        }
        return view('index')->with('data', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FacadesSession::flash('kode_warna',$request->kode_warna);
        FacadesSession::flash('nama_warna',$request->nama_warna);
        FacadesSession::flash('deskripsi',$request->deskripsi);
        FacadesSession::flash('nilai_rgb',$request->nilai_rgb);
        FacadesSession::flash('nilai_hex',$request->nilai_hex);

        $request->validate([
            'kode_warna'=>'required|numeric|unique:warnas,kode_warna',
            'nama_warna'=>'required',
            'deskripsi'=>'required',
            'nilai_rgb'=>'required',
            'nilai_hex'=>'required',
        ],[
            'kode_warna.required'=>'Nim wajib di isi',
            'kode_warna.numeric'=>'Nim wajib dalam angka',
            'kode_warna.unique'=>'Nim yang di isi sudah ada',
            'nama_warna.required'=>'Nama warna wajib di isi',
            'deskripsi.required'=>'Deskripsi wajib di isi',
            'nilai_rgb.required'=>'Nilai RGB wajib di isi',
            'nilai_hex.required'=>'Nilai HEX wajib di isi',
        ]);
        $data = [
            'kode_warna'=> $request-> kode_warna,
            'nama_warna'=> $request-> nama_warna,
            'deskripsi'=> $request-> deskripsi,
            'nilai_rgb'=> $request-> nilai_rgb,
            'nilai_hex'=> $request-> nilai_hex,
        ];
        warna::create($data);
        return redirect()->to('warna')->with('success','Berhasil Menambhakan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = warna::where('kode_warna', $id)->first();
        return view('edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'nama_warna'=>'required',
            'deskripsi'=>'required',
            'nilai_rgb'=>'required',
            'nilai_hex'=>'required',
        ],[
            
            'nama_warna.required'=>'Nama warna wajib di isi',
            'deskripsi.required'=>'Deskripsi wajib di isi',
            'nilai_rgb.required'=>'Nilai RGB wajib di isi',
            'nilai_hex.required'=>'Nilai HEX wajib di isi',
        ]);
        $data = [
            
            'nama_warna'=> $request-> nama_warna,
            'deskripsi'=> $request-> deskripsi,
            'nilai_rgb'=> $request-> nilai_rgb,
            'nilai_hex'=> $request-> nilai_hex,
        ];
        warna::where('kode_warna', $id)->update($data);
        return redirect()->to('warna')->with('success','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        warna::where('kode_warna', $id)->delete();
        return redirect()->to('warna')->with('success','Berhasil Melakukan Delete Data');
    }
}