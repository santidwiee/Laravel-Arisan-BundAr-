@extends('layouts.arisan_anggota.desain')
@section('title', 'Arisan')

@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                {{--heading title--}}
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-cash icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Daftar <b>Arisan</b>
                        <div class="page-title-subheading">Total Arisan : {{$arisan->count()}}
                        </div>
                    </div>
                </div>  
            </div>
        </div>   
        {{-- Content Arisan--}} 
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4 pull-right">
                        <form action="" method="GET" class="form-inline my-2 my-lg-0">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Nama Arisan" value="">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <form role="form" action="{{route('hapus.paket')}}" method="POST">
                        @csrf
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash"></i> <span>Hapus Arisan</span>
                            </button>
                            <a href="#tambahArisan" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> <span>Tambah Arisan</span>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            @if ($message=Session::get('status'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                        </div>
                    </div> 
                    <div class="card" style="width: 1000px">
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th class="text-center">Nama Arisan</th>
                                <th class="text-center">Kapasitas</th>
                                <th class="text-center">Iuran</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($arisan as $item)
                                    <tr>
                                        <td>
                                            <span class="custom-checkbox">
                                                <input type="checkbox" class="pilih" name="options[]" value="{{$item->id}}">
                                                <label for="checkbox"></label>
                                            </span>
                                        </td>
                                        <td>{{$item->namaArisan}}</td>
                                        <td class="text-center">{{$item->kapasitas}}</td>
                                        <td class="text-center">Rp. {{$item->iuran}}</td>
                                        <td>{{$item->deskripsi}}</td>
                                        <td>
                                            @if ($item->tglAkhir)
                                                <button class="btn btn-sm btn-outline-danger">Selesai</button>
                                            @elseif($item->tglMulai)
                                                <button class="btn btn-sm btn-outline-success">Proses</button>
                                            @else
                                                <button class="btn btn-sm btn-outline-primary">Rencana</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('arisan.edit',$item->id)}}" class="btn btn-success editArisan" id="edot">Edit</a>
                                            <a href="{{route('hapusArisan',$item->id)}}" class="btn btn-warning">Hapus</a>
                                            <a href="{{route('detail',$item->id)}}" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    {{ $arisan->links() }}
                </div>
            </div>
        </div>
    </div>        
</div>

<!-- Tambah Arisan modal -->
<div id="tambahArisan" class="modal fade" style="margin-top:70px">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('arisan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        <b>Tambah Arisan</b>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Arisan</label>
                        <input type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="namaArisan" name="nama" value="{{ old('namaArisan') }}" placeholder="Nama Arisan">
                        @if($errors->has('nama'))
                            <small class="text-danger">{{$errors->first('nama')}}</small>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Kapasitas</label>
                            <input type="text" class="form-control {{$errors->has('kapasitas') ? 'is-invalid' : ''}}" id="kapasitas" name="kapasitas" placeholder="0">
                            @if($errors->has('kapasitas'))
                                <small class="text-danger">{{$errors->first('kapasitas')}}</small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label>Iuran</label>
                            <input type="price" class="form-control {{$errors->has('iuran') ? 'is-invalid' : ''}}" id="iuran" name="iuran" placeholder="cth: 10000">
                            @if($errors->has('iuran'))
                                <small class="text-danger">{{$errors->first('iuran')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Tambah Arisan-->

@endsection

@section('script')
<script>
    $("#selectAll").click(function(){
		if(this.checked){
			$(".pilih").prop("checked",true);
		} else{
			$(".pilih").prop("checked",false);
		} 
	}); 
</script>
@endsection