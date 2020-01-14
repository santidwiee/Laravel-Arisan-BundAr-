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
                                <h4>Ubah Arisan</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('anggota.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Arisan</label>
                                        <input type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="editArisan" name="nama"  value="{{ $arisan->namaArisan }}">
                                        @if($errors->has('nama'))
                                            <small class="text-danger">{{$errors->first('nama')}}</small>
                                        @endif
                                    </div>
            
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Kapasitas</label>
                                            <input type="text" class="form-control {{$errors->has('kapasitas') ? 'is-invalid' : ''}}" id="editkapasitas" name="kapasitas" value="{{ $arisan->kapasitas }}">
                                            @if($errors->has('kapasitas'))
                                                <small class="text-danger">{{$errors->first('kapasitas')}}</small>
                                            @endif
                                        </div>
                
                                        <div class="col-md-6">
                                            <label>Iuran</label>
                                            <input type="price" class="form-control {{$errors->has('iuran') ? 'is-invalid' : ''}}" id="editiuran" name="iuran" value="{{ $arisan->iuran }}">
                                            @if($errors->has('iuran'))
                                                <small class="text-danger">{{$errors->first('iuran')}}</small>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="editdeskripsi">{{ $arisan->deskripsi }}</textarea>
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