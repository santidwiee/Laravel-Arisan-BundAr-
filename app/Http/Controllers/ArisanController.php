<?php

namespace App\Http\Controllers;

use App\Arisan;
use App\Anggota;
use App\ArisanRelasi;
use App\Periode;
use App\StatusBayar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ArisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($cari = $request->pencarian){
            $data = Arisan::where('namaArisan','like','%'.$cari.'%')->paginate(5);
        }
        
        else{
            $data = auth()->user()->arisan()->paginate(5);
        }
     
        return view('arisan.list',['arisan' => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function pesan (){
        return  [
            'nama.required' => 'Wajib diisi dan nama tidak boleh sama',
            'nama.max' => 'Maksimal 20 karakter',

            'kapasitas.required' => 'Wajib diisi',
            'kapasitas.numeric' => 'Format Angka',
            'kapasitas.between' => 'tidak boleh lebih dari 10',
            
            'iuran.required' => 'Wajib diisi',
        ];
    }
    public function store(Request $request)
    {
    
        $valid = Validator::make($request->all(), [
            'nama' => 'required|max:20',
            'kapasitas' => 'required|between:0,10|numeric',
            'iuran' => 'required|numeric',
         ],$this->pesan())->validate();


        $arisan = new Arisan();
        $arisan->namaArisan = $request->nama;
        $arisan->kapasitas = $request->kapasitas;
        $arisan->iuran = $request->iuran;
        $arisan->id_user = auth()->user()->id;
        $arisan->deskripsi = $request->deskripsi;
        $arisan->save();

        return redirect()->route('arisan.index')->with('status', 'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arisan = Arisan::findOrFail($id);
        return view('arisan.edit')->with(compact('arisan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'nama' => 'required|max:20',
            'kapasitas' => 'required|between:0,10|numeric',
            'iuran' => 'required|numeric',
         ],$this->pesan())->validate();

         $arisan = Arisan::findOrFail($id);
         $arisan->namaArisan = $request->nama;
         $arisan->kapasitas = $request->kapasitas;
         $arisan->iuran = $request->iuran;
         $arisan->deskripsi = $request->deskripsi;
         $arisan->save();

        return redirect()->route('arisan.index')->with('status', 'berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arisan = Arisan::findOrFail($id);
        $arisan->delete();

        return redirect()->route('arisan.index')->with('status','data berhasil dihapus');
    }

    public function hapusSemua(Request $request){
        $arisan = $request->input('options');
        Arisan::whereIn('id',$arisan)->delete();

        return redirect()->route('arisan.index')->with('status','beberapa data berhasil dihapus');
    }

    public function detail($id){
        $arisan = Arisan::findOrFail($id);
        $periode = Periode::where('Idarisan', '=', $arisan->id)->get();
        $anggota = Anggota::whereNotIn('id', $arisan->anggota->pluck('pivot.anggota_id'))->get();
        $anggota2 = Anggota::whereIn('id', $arisan->anggota->pluck('pivot.anggota_id'))->get();

        return view('arisan.detail',['arisan' => $arisan, 'anggota' => $anggota ,'anggota2' => $anggota2, 'periode' => $periode ]);
    }

    public function addAnggota(Request $request){
        
        $relasi = ArisanRelasi::create([
            'anggota_id' => $request['anggota'],
            'arisan_id' => $request['id_arisan'],
        ]);

        return redirect()->route('detail',$request['id_arisan']);
    }

    public function removeAnggota(Request $request){
        $anggota2 = ArisanRelasi::where('anggota_id', $request->id_anggota)
        ->where('arisan_id', $request->id_arisan)
        ->first();
        $anggota2->delete();

        return redirect()->back();

    }

    public function setTglMulai(Request $request, $id){

        $valid = Validator::make($request->all(), [
            'tglMulai' => 'required',
        ],
        [
            'tglMulai.required' => 'Tidak Boleh kosong'
        ])->validate();

        $arisan = Arisan::findOrFail($id);
        $arisan->tglMulai = $request->tglMulai;
        $arisan->save();

        return redirect()->route('detail',$arisan['id']);
    }

    public function setTglAkhir(Request $request, $id){
        $valid = Validator::make($request->all(), [
            'tglAkhir' => 'required',
        ],
        [
            'tglAkhir.required' => 'Tidak Boleh Kosong'
        ])->validate();

        $arisan = Arisan::findOrFail($id);
        $arisan->tglAkhir = $request->tglAkhir;
        $arisan->save();

        return redirect()->route('detail',$arisan['id']);
    }


    public function periode(Request $request){

        $valid = Validator::make($request->all(), [
            'tglPeriode' => 'required'
        ],
        [
            'tglPeriode.required' => 'Tidak Boleh kosong'
        ])->validate();

        $periode = Periode::create([
            'Idarisan' => $request['Idarisan'],
            'tglPeriode' => $request['tglPeriode'],
        ]);

        return redirect()->back();
    }

    public function detailTransaksi($id){
        $periode = Periode::findOrFail($id);
        $status = StatusBayar::where('id_periode', '=', $periode->id)->get();

        return view('arisan.transaksi',['periode' => $periode, 'status' => $status]);
    }

    public function statusAnggota(Request $request){

        $bayar = new \App\StatusBayar;
        $bayar->status = 1;
        $bayar->id_anggota= $request->id_anggota;
        $bayar->id_periode= $request->id_periode;
        $bayar->save();

        return redirect()->back();
    }

    public function ubahstatus(Request $request, $id){
        $status = App\StatusBayar::findOrFail($id);
        $bayar->status = 0;
        $bayar->id_anggota= $request->id_anggota;
        $bayar->id_periode= $request->id_periode;
        $bayar->save();
    }

    public function kocokPemenang(Request $request, $id){
        $relasi = Arisan::findOrFail($id);
        $anggota = $relasi->anggota->pluck('id');
        
        $pemenang = \App\Anggota::whereIn('id',$anggota)->inRandomOrder()->first();

        $cek =  $relasi->periode()->where('pemenang',$pemenang->namaAnggota)->first();
        if (!$cek ) {
            $periode = $relasi->periode()->whereNull('pemenang')->first();
            $periode->pemenang = $pemenang->namaAnggota;
            $periode->save();
        }
            return redirect()->back();    
    }
}
