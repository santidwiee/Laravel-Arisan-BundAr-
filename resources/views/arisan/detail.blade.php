@extends('layouts.arisan_anggota.desain')
@section('title', 'Arisan')

<?php
    $no=1;  
?>
<?php
    $jmlperiod=1;  
?>

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        {{-- Content Arisan--}} 
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    <div class="pull-right">
                        <a href="{{route('arisan.index')}}" class="btn btn-sm btn-dark">Kembali ke list arisan</a>
                    </div>
                    {{ $arisan->namaArisan }} 
                </h1>
                <br>
                <div class="row">
                    <div class="pull-right col-md-5">
                        <div class="card" style="width: 400px">
    
                        <table class="table table-hover">
                            <tbody>
                                <tr><td><strong>Nama Arisan : </strong></td><td>{{$arisan->namaArisan}}</td></tr>
                                <tr><td><strong>Kapasitas : </strong></td><td>{{$arisan->kapasitas}}</td></tr>
                                <tr><td><strong>Jumlah Anggota : </strong></td><td>{{$anggota2->count()}}</td></tr>
                                <tr><td><strong>Iuran : </strong></td><td>Rp. {{$arisan->iuran}}</td></tr>
                                <tr>
                                    <td><strong>Status : </strong></td>
                                    <td>
                                        @if ($arisan->tglAkhir)
                                            <button class="btn btn-sm btn-outline-danger">Selesai</button>
                                        @elseif($arisan->tglMulai)
                                            <button class="btn btn-sm btn-outline-success">Proses</button>
                                        @else
                                            <button class="btn btn-sm btn-outline-primary">Rencana</button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="col-md-7">
                        <div class="tabbable" style="width:600px" id="tabsGroup">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab1" data-toggle="tab">Detail Arisan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab2" data-toggle="tab">Anggota Arisan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab3" data-toggle="tab">Transaksi Arisan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tab4" data-toggle="tab">Histori</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="card" style="width: 600px">
                                        <table class="table table-hover">
                                            <thead>
                                                <th class="text-center">Jumlah Anggota</th>
                                                <th class="text-center">Jumlah Uang Arisan</th>
                                                <th class="text-center">Tanggal Mulai</th>
                                                <th class="text-center">Tanggal Selesai</th>
                                                <th class="text-center">Status</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$anggota2->count()}}</td>
                                                    <td class="text-center"><h5>Rp. {{$arisan->iuran * $anggota2->count()}}</h5></td>
                                                    <td class="text-center">{{$arisan->tglMulai}}</td>
                                                    <td class="text-center">{{$arisan->tglAkhir}}</td>
                                                    <td>
                                                        @if ($arisan->tglAkhir)
                                                            <button class="btn btn-sm btn-outline-danger">Selesai</button>
                                                        @elseif($arisan->tglMulai)
                                                            <button class="btn btn-sm btn-outline-success">Proses</button>
                                                        @else
                                                            <button class="btn btn-sm btn-outline-primary">Rencana</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    @if ($arisan->tglAkhir)
                                                            
                                    @elseif($arisan->tglMulai)
                                        <form action="{{route('setTglAkhir', $arisan->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group col-md-6">
                                                <input type="date" name="tglAkhir" class="form-control {{$errors->has('tglAkhir') ? 'is-invalid' : ''}}" value="">
                                                <span>
                                                    <button type="submit" name="setTglAkhir" id="setTglAkhir" class="btn btn-primary">Set Tanggal Akhir</button>
                                                </span>
                                            </div>
                                            @if($errors->has('tglAkhir'))
                                                <small class="text-danger">{{$errors->first('tglAkhir')}}</small>
                                            @endif
                                        </form>
                                    @else
                                        <form action="{{route('setTglMulai', $arisan->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group col-md-6">
                                                <input type="date" name="tglMulai" class="form-control {{$errors->has('tglMulai') ? 'is-invalid' : ''}}" value="">
                                                <span>
                                                    <button type="submit" name="setTglMulai" id="setTglMulai" class="btn btn-primary">Set Tanggal Mulai</button>
                                                </span>
                                            </div>
                                            @if($errors->has('tglMulai'))
                                            <small class="text-danger">{{$errors->first('tglMulai')}}</small>
                                        @endif
                                        </form>
                                    @endif
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="card" style="width: 600px">
                                        <table class="table table-hover">
                                            <thead>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Nama Anggota</th>
                                                <th class="text-center">Pilihan</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($anggota2 as $item)
                                                    <tr>
                                                        <td class="text-center"><?php echo $no++; ?></td>
                                                        <td class="text-center">{{$item->namaAnggota}}</td>
                                                        <td class="text-center">
                                                            <a href="{{route('removeAnggota', ['id_anggota' => $item->id,'id_arisan' => $arisan->id])}}" class="btn btn-sm btn-outline-danger">Keluarkan</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-6">
                                        @if($arisan->kapasitas != $anggota2->count())
                                            <form action="{{route('addAnggota')}}" method="POST">
                                                @csrf
                                                <select id="anggota" class="form-control" name="anggota" required>
                                                    <option selected>Daftar Anggota</option>
                                                    @foreach($anggota as $item)
                                                        <option value="{{($item->id)}}">{{($item->namaAnggota)}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" value="{{$arisan->id}}" name="id_arisan">
                                                <span>
                                                    <button type="submit" name="tambah_anggota" id="tambah_anggota" class="btn btn-primary">Tambahkan</button>
                                                </span>
                                            </form>
                                        @else
                                            <h5>Kapasitas Penuh</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <div class="card" style="width: 600px">
                                        <table class="table table-hover">
                                            <thead>
                                                <th style="width : 100px">Periode</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Pilihan</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($periode as $item)
                                                    <tr>
                                                        <td>Periode <?php echo $jmlperiod++; ?></td>
                                                        <td class="text-center">{{$item->tglPeriode}}</td>
                                                        <td class="text-center">
                                                            <a href="{{route('detail.transaksi', $item->id)}}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    @if($anggota2->count() != $periode->count())
                                    <div class="form-group col-md-6">
                                        <form action="{{route('setperiode')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group col-md-12">
                                                <input type="date" name="tglPeriode" class="form-control {{$errors->has('tglPeriode') ? 'is-invalid' : ''}}" value="">
                                                <input type="text" name="Idarisan" hidden class="form-control" value="{{$arisan->id}}">
                                                <span>
                                                    <button type="submit" name="setTglPeriode" id="setTglPeriode" class="btn btn-primary">Set</button>
                                                </span>
                                            </div>
                                            @if($errors->has('tglPeriode'))
                                                <small class="text-danger">{{$errors->first('tglPeriode')}}</small>
                                            @endif
                                        </form>
                                    </div>
                                    @else
    
                                    @endif
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <div class="card" style="width: 600px">
                                        <table class="table table-hover">
                                            <thead>
                                                <th>Pemenang</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Jumlah</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($periode as $item)
                                                    <tr>
                                                        <td>{{$item->pemenang}}</td>
                                                        <td class="text-center">{{$item->tglPeriode}}</td>
                                                        <td class="text-center">{{$anggota2->count() * $arisan->iuran}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>        
</div>

@endsection