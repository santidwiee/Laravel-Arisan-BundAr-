@extends('layouts.arisan_anggota.desain')
@section('title', 'Arisan')

<?php
    $no=1;  
?>

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        {{-- Content Arisan--}} 
        <div class="row">
            <div class="col-md-12">
                {{-- heading --}}
                <h1 class="page-header">
                    {{ $periode->arisan->namaArisan }} 
                </h1>
                <h3>
                    <div class="pull-right">
                        <a href="{{route('arisan.kocok', $periode->Idarisan)}}" class="btn btn-info">Kocok</a>
                        <a href="{{route('detail',$periode->Idarisan)}}" class="btn btn-sm btn-dark">Kembali ke detail Arisan</a>
                    </div>
                <small>{{$periode->tglPeriode}}</small>
                </h3>
                {{-- end heading --}}
                <br>
                <div class="row">
                    {{-- right table --}}
                    <div class="pull-right col-md-5">
                        <div class="card" style="width:400px">
                            <table class="table table-hover">
                                <tbody>
                                    <tr><td><strong>Pemenang : </strong></td><td>{{$periode->pemenang}}</td></tr>
                                    <tr><td><strong>Jumlah Iuran : </strong></td><td>{{$periode->arisan->anggota()->count() * $periode->arisan->iuran}}</td></tr>
                                    <tr><td><strong>Anggota Sudah Bayar : </strong></td><td>{{$status->where('status', '=', 1)->count()}}</td></tr>
                                    <tr><td><strong>Anggota Belum Bayar : </strong></td><td>{{$periode->arisan->kapasitas - $status->where('status', '=', 1)->count()}}</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- end right table --}}

                    {{-- left table --}}
                    <div class="col-md-7">
                        <div class="card" style="width: 600px">
                            <table class="table table-hover">
                                <thead>
                                    <th class="text-center">No.</th>
                                    <th>Nama Anggota</th>
                                    <th class="text-center">Status</th> 
                                    <th class="text-center">Pilihan Bayar</th>
                                </thead>
                                <tbody>
                                    @foreach ($periode->arisan->anggota as $item)
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td>{{$item->namaAnggota}}</td>
                                            <td class="text-center">
                                                @if ($item->status_bayar($periode->id))
                                                    <button class="btn btn-sm btn-outline-success">Lunas</button>
                                                @else
                                                <button class="btn btn-sm btn-outline-danger">Belum Bayar</button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if(!$item->status_bayar($periode->id))
                                                    <a href="{{route('periode.status.anggota',['id_anggota' => $item->id,'id_periode' =>$periode->id])}}" class="btn btn-sm btn-success">Set Bayar</a>
                                                @else
                                                    
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- end left table --}}
                </div>
            </div>
        </div>
    </div>        
</div>

@endsection