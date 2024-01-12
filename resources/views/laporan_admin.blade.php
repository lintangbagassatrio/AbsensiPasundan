@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Data Absensi Siswa</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">Laporan Absen Siswa</div>
        <div class="card-body">
            <div class="row">
                <div class="w-100 d-flex justify-content-between" style="margin-right: 10px">
                    <a></a>
                    <div class="buttin">
                        <a href="" class="btn btn-info">Import</a>
                        <a href="" class="btn btn-primary">Export</a>
                    </div>
                </div>
            </div>
            <hr>
            <table id="table-data" class="table table-responsive-lg table-stripped">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>N0. INDUK</th>
                        <th>NISN</th>
                        <th>NAMA SISWA</th>
                        <th>NAMA GURU</th>
                        <th>PELAJARAN</th>
                        <th>KETERANGAN</th>
                        <th>WAKTU</th>
                        <th>DI ABSEN</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($laporan as $laporans)
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td class="text-center">{{$laporans->induk}}</td>
                            <td class="text-center">{{$laporans->nisn}}</td>
                            <td>{{$laporans->siswa}}</td>
                            <td>{{$laporans->guru}}</td>
                            <td class="text-center">{{$laporans->pelajaran}}</td>
                            <td class="text-center">{{$laporans->keterangan}}</td>
                            <td class="text-center">{{$laporans->waktu_mulai}} s/d {{$laporans->waktu_selesai}} </td>
                            <td class="text-center">{{$laporans->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
