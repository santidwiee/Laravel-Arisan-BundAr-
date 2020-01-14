@extends('layouts.arisan_anggota.desain')
@section('title', 'Anggota')


@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                {{--heading title--}}
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>
                        Daftar <b>Anggota</b>
                        <div class="page-title-subheading">Total Anggota : {{$anggota->count()}}
                        </div>
                    </div>
                </div>   
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4 pull-right">
                        <form action="" method="GET" class="form-inline my-2 my-lg-0">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Nama Anggota" value="">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <form role="form" action="{{route('hapus.group')}}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash"></i> <span>Hapus Anggota</span>
                        </button>
                        <a href="#tambahAnggota" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> <span>Tambah Anggota</span>
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
                                    <input type="checkbox" id="pilihSemua">
                                    <label for="pilihSemua"></label>
                                </span>
                            </th>
                            <th class="text-center">Nama Anggota</th>
                            <th class="text-center">No.Tlp/Hp</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $identity)
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" class="pilih" name="pilihan[]" value="{{$identity->id}}">
                                            <label for="checkbox"></label>
                                        </span>
                                    </td>
                                    <td class="text-center">{{$identity->namaAnggota}}</td>
                                    <td class="text-center">{{$identity->tlpAnggota}}</td>
                                    <td class="text-center">{{$identity->alamatAnggota}}</td>
                                    <td class="text-center">
                                        <a href="{{route('anggota.edit',$identity->id)}}" class="btn btn-success Editlist">Edit</a>
                                        <a href="{{route('hapus',$identity->id)}}" class="btn btn-warning">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                {{ $anggota->links() }}
            </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambah anggota modal -->
<div id="tambahAnggota" class="modal fade" style="margin-top:70px">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('anggota.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        <b>Tambah Anggota</b>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" class="form-control {{$errors->has('namaAnggota') ? 'is-invalid' : ''}}" id="namaAnggota" name="namaAnggota" value="{{ old('namaAnggota') }}" placeholder="Nama Anggota">
                        @if($errors->has('namaAnggota'))
                            <small class="text-danger">{{$errors->first('namaAnggota')}}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>No.Tlp/Hp</label>
                        <input type="text" class="form-control {{$errors->has('tlpAnggota') ? 'is-invalid' : ''}}" id="tlpAnggota" name="tlpAnggota" placeholder="0xxxxx">
                            @if($errors->has('tlpAnggota'))
                                <small class="text-danger">{{$errors->first('tlpAnggota')}}</small>
                            @endif 
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control {{$errors->has('alamatAnggota') ? 'is-invalid' : ''}}" name="alamatAnggota" id="alamatAnggota" placeholder="Alamat Anggota"></textarea>
                        @if($errors->has('alamatAnggota'))
                        <small class="text-danger">{{$errors->first('alamatAnggota')}}</small>
                    @endif 
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
<!-- End Tambah anggota-->

@endsection


@section('script')
<script>
    $("#pilihSemua").click(function(){
		if(this.checked){
			$(".pilih").prop("checked",true);
		} else{
			$(".pilih").prop("checked",false);
		} 
	}); 
</script>
@endsection