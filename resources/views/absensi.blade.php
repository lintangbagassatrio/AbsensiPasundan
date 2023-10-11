@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Data Absensi</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header font-weight-bold">{{__('Hari Senin')}}</div>
        <div class="card-body">
            <div class="row">
                @foreach ($item as $senin)
                    @if ($senin->hari == 'Senin')
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-sm table-borderless ">
                                        <tr>
                                            <td>Kelas</td>
                                            <td class="text-right font-weight-bold">{{$senin->kelas}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td class="text-right font-weight-bold">{{$senin->pelajaran}}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td class="text-right font-weight-bold">{{$senin->waktu_mulai}} s/d {{$senin->waktu_selesai}}</td>
                                        </tr>
                                    </table>
                                    <a href="/guru/absensi/absen/{{$senin->id}}" class="btn btn-sm btn-primary w-100 mt-1">Mulai Absensi</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-header font-weight-bold">{{__('Hari Selasa')}}</div>
        <div class="card-body">
            <div class="row">
                @foreach ($item as $selasa)
                    @if ($selasa->hari == 'Selasa')
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-sm table-borderless ">
                                        <tr>
                                            <td>Kelas</td>
                                            <td class="text-right font-weight-bold">{{$selasa->kelas}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td class="text-right font-weight-bold">{{$selasa->pelajaran}}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td class="text-right font-weight-bold">{{$selasa->waktu_mulai}} s/d {{$selasa->waktu_selesai}}</td>
                                        </tr>
                                    </table>
                                    <a href="/guru/absensi/absen/{{$selasa->id}}" class="btn btn-sm btn-primary w-100 mt-1">Mulai Absensi</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-header font-weight-bold">{{__('Hari Rabu')}}</div>
        <div class="card-body">
            <div class="row">
                @foreach ($item as $rabu)
                    @if ($rabu->hari == 'Rabu')
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-sm table-borderless ">
                                        <tr>
                                            <td>Kelas</td>
                                            <td class="text-right font-weight-bold">{{$rabu->kelas}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td class="text-right font-weight-bold">{{$rabu->pelajaran}}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td class="text-right font-weight-bold">{{$rabu->waktu_mulai}} s/d {{$rabu->waktu_selesai}}</td>
                                        </tr>
                                    </table>
                                    <a href="/guru/absensi/absen/{{$rabu->id}}" class="btn btn-sm btn-primary w-100 mt-1">Mulai Absensi</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-header font-weight-bold">{{__('Hari Kamis')}}</div>
        <div class="card-body">
            <div class="row">
                @foreach ($item as $kamis)
                    @if ($kamis->hari == 'Kamis')
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-sm table-borderless ">
                                        <tr>
                                            <td>Kelas</td>
                                            <td class="text-right font-weight-bold">{{$kamis->kelas}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td class="text-right font-weight-bold">{{$kamis->pelajaran}}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td class="text-right font-weight-bold">{{$kamis->waktu_mulai}} s/d {{$kamis->waktu_selesai}}</td>
                                        </tr>
                                    </table>
                                    <a href="/guru/absensi/absen/{{$kamis->id}}" class="btn btn-sm btn-primary w-100 mt-1">Mulai Absensi</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-header font-weight-bold">{{__('Hari Jumat')}}</div>
        <div class="card-body">
            <div class="row">
                @foreach ($item as $jumat)
                    @if ($jumat->hari == 'Jumat')
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-sm table-borderless ">
                                        <tr>
                                            <td>Kelas</td>
                                            <td class="text-right font-weight-bold">{{$jumat->kelas}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td class="text-right font-weight-bold">{{$jumat->pelajaran}}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td class="text-right font-weight-bold">{{$jumat->waktu_mulai}} s/d {{$jumat->waktu_selesai}}</td>
                                        </tr>
                                    </table>
                                    <a href="/guru/absensi/absen/{{$jumat->id}}" class="btn btn-sm btn-primary w-100 mt-1">Mulai Absensi</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-header font-weight-bold">{{__('Hari Sabtu')}}</div>
        <div class="card-body">
            <div class="row">
                @foreach ($item as $sabtu)
                    @if ($sabtu->hari == 'Sabtu')
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-sm table-borderless ">
                                        <tr>
                                            <td>Kelas</td>
                                            <td class="text-right font-weight-bold">{{$sabtu->kelas}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td class="text-right font-weight-bold">{{$sabtu->pelajaran}}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td class="text-right font-weight-bold">{{$sabtu->waktu_mulai}} s/d {{$sabtu->waktu_selesai}}</td>
                                        </tr>
                                    </table>
                                    <a href="/guru/absensi/absen/{{$sabtu->id}}" class="btn btn-sm btn-primary w-100 mt-1">Mulai Absensi</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop