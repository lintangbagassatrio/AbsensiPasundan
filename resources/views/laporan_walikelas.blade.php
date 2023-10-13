@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Data Absensi Siswa</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">Laporan Absen Siswa   <span class="font-weight-bold">{{$user->wali_kelas}}</span></div>
        <div class="card-body">
            <div class="row">
                <div class="w-100 d-flex justify-content-between" style="margin-right: 10px">
                    <a></a>
                    <a href="" class="btn btn-success">Export</a>
                </div>
            </div>
            <hr>
            <table id="table-data" class="table table-responsive-lg table-bordered">
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
                        <th>AKSI</th>
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
                            <td class="text-center">
                                <button type="button" id="btn-edit-laporan" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editLaporanModal" data-id="{{ $laporans->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="editLaporanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route ('laporan.guru.ubah')}}" enctype="multipart/form-data">
                    @csrf
                    @method ('PATCH')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nama">Nama Siswa</label>
                            <input type="text"class="form-control" name="name" id="edit-nama" readonly />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="keterangan">Keterangan</label>
                            <select class="form-control w-100" name="keterangan" id="edit-keterangan" required>
                                <option selected >Pilih</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Ijin">Ijin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Alpa">Alpa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="edit-id"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop


@section('js')
    <script>
        $(function(){
            $(document).on('click','#btn-edit-laporan', function(){

                let id = $(this).data('id');

                $('#image-area').empty();

                $.ajax({
                    type: "get",
                    url: "{{url('/guru/ajaxadmin/dataLaporan')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                        $('#edit-id').val(res.id);
                        $('#edit-keterangan').val(res.keterangan);
                        $('#edit-nama').val(res.siswa);

                    },
                });
            });
        });
    </script>
@stop