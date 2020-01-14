@extends('layouts.arisan_anggota.desain')
@section('title', 'Anggota')


@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        {{-- Content Arisan--}} 
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card" style="max-width: 100%; padding: 28px; position: ">
                            <div class="card-header">
                                <h4>Ubah Anggota</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('anggota.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input type="text" class="form-control {{$errors->has('namaAnggota') ? 'is-invalid' : ''}}" id="namaAnggota" name="namaAnggota" value="{{ $anggota ->namaAnggota }}">
                                            @if($errors->has('namaAnggota'))
                                                <small class="text-danger">{{$errors->first('namaAnggota')}}</small>
                                            @endif
                                        </div>
                    
                                        <div class="form-group">
                                            <label>No.Tlp/Hp</label>
                                            <input type="text" class="form-control {{$errors->has('tlpAnggota') ? 'is-invalid' : ''}}" id="tlpAnggota" name="tlpAnggota" value="{{ $anggota ->tlpAnggota }}">
                                            @if($errors->has('tlpAnggota'))
                                                <small class="text-danger">{{$errors->first('tlpAnggota')}}</small>
                                            @endif 
                                        </div>
                    
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control {{$errors->has('alamatAnggota') ? 'is-invalid' : ''}}" name="alamatAnggota" id="alamatAnggota">{{ $anggota ->alamatAnggota }}</textarea>
                                            @if($errors->has('alamatAnggota'))
                                                <small class="text-danger">{{$errors->first('alamatAnggota')}}</small>
                                            @endif 
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary">
                                                Ubah
                                            </button>
                                        </div>
                                </form>     
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>
@endsection