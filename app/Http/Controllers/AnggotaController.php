<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    protected function pesan (){
        return  [
            'namaAnggota.required' => 'Wajib diisi dan nama tidak boleh sama',
            'namaAnggota.max' => 'Maksimal 20 karakter',

            'tlpAnggota.required' => 'Wajib diisi',
            'tlpAnggota.numeric' => 'Format Angka',
            
            'alamatAnggota.required' => 'Wajib diisi',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($cariAnggota = $request->cari){
            $data = Anggota::where('namaAnggota','like','%'.$cariAnggota.'%')->paginate(5);
        }
        
        else{
            $data = auth()->user()->anggota()->paginate(5);
        }
     
        return view('anggota.list',['anggota' => $data ]);
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
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'namaAnggota' => 'required|max:20',
            'tlpAnggota' => 'required|numeric',
            'alamatAnggota' => 'required',
         ],$this->pesan())->validate();


        $anggota = new Anggota();
        $anggota->user_id = auth()->user()->id;
        $anggota->namaAnggota = $request->namaAnggota;
        $anggota->tlpAnggota = $request->tlpAnggota;
        $anggota->alamatAnggota = $request->alamatAnggota;
        $anggota->save();

        return redirect()->route('anggota.index')->with('status', 'berhasil disimpan');;
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
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', ['anggota' => $anggota]);
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
            'namaAnggota' => 'required|max:20',
            'tlpAnggota' => 'required|numeric',
            'alamatAnggota' => 'required',
         ],$this->pesan())->validate();

        $anggota = Anggota::findOrFail($id);
        $anggota->namaAnggota = $request->namaAnggota;
        $anggota->tlpAnggota = $request->tlpAnggota;
        $anggota->alamatAnggota = $request->alamatAnggota;
        $anggota->save();

       return redirect()->route('anggota.index')->with('status', 'berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('status','data berhasil dihapus');
    }

    public function hapusGroup(Request $request){
        $anggota = $request->input('pilihan');
        Anggota::whereIn('id',$anggota)->delete();

        return redirect()->route('anggota.index')->with('status','beberapa data berhasil dihapus');
    }
}
