@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Absensi</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header font-weight-bold">{{__('Jadwal Absensi')}}</div>
        <div class="card-body">
            <table class="table table-sm table-borderless ">
                <tr>
                    <td>Kelas</td>
                    <td class="text-left font-weight-bold">{{$penjadwalan->kelas}}</td>
                    <td>Jurusan</td>
                    <td class="text-left font-weight-bold">{{$penjadwalan->jurusan}}</td>
                </tr>
                <tr>
                    <td>Pelajaran</td>
                    <td class="text-left font-weight-bold">{{$penjadwalan->pelajaran}}</td>
                    <td>Hari</td>
                    <td class="text-left font-weight-bold">{{$penjadwalan->hari}}</td>
                </tr>
                <tr>
                    <td>Guru</td>
                    <td class="text-left font-weight-bold">{{$penjadwalan->guru}}</td>
                    <td>Waktu</td>
                    <td class="text-left font-weight-bold">{{$penjadwalan->waktu_mulai}} s/d {{$penjadwalan->waktu_selesai}}</td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="card-header font-weight-bold">{{__('Absensi')}}</div>
        <div class="card-body">
            <form method="post" action="{{ route ('absensi.submit')}}" enctype="multipart/form-data">
                @csrf
                <table id="table-data" class="table table-responsive-lg table-stripped">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>INDUK</th>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; $no1=0; $no2=0; $no3=0; $no4=0; $no5=0; $no6=0; $no7=0; $no8=0; $no9=0; @endphp
                        @foreach($item as $items)
                            <tr>
                                <td class="text-center col-md-1">{{$no++}}</td>
                                <td class="text-center col-md-2">
                                    <input type="text" class="form-control text-center" name="input[{{$no1++}}][induk]" value="{{$items->induk}}" style="border: none; outline: none;"/>
                                </td>
                                <td class="text-center col-md-2">
                                    <input type="text"class="form-control text-center" name="input[{{$no2++}}][nisn]" value="{{$items->nisn}}" style="border: none; outline: none;"/>
                                </td>
                                <td class="text-center col-md-6">
                                    <input type="text"class="form-control" name="input[{{$no3++}}][name]" value="{{$items->name}}" style="border: none; outline: none;"/>
                                </td>
                                <td class="text-center col-md-3">
                                    <select id="keterangan" class="form-control w-100" name="input[{{$no4++}}][keterangan]" required>
                                        <option selected >Pilih</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Ijin">Ijin</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Alpa">Alpa</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="pelajaran" value="{{$penjadwalan->pelajaran}}"/>
                    <input type="hidden" name="kelas" value="{{$penjadwalan->kelas}}"/>
                    <input type="hidden" name="waktu_mulai" value="{{$penjadwalan->waktu_mulai}}"/>
                    <input type="hidden" name="waktu_selesai" value="{{$penjadwalan->waktu_selesai}}"/>
                    <input type="hidden" name="guru" value="{{$penjadwalan->guru}}"/>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@stop