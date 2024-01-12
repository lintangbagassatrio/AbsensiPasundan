@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Data Penjadwalan</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Pengelolaan Penjadwalan')}}</div>
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">
                <i class="fa fa-plus">   Buat Jadwal</i>
            </button>
            <hr>
            <table id="table-data" class="table table-responsive-lg table-stripped">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>KELAS</th>
                        <th>GURU</th>
                        <th>PELAJARAN</th>
                        <th>JURUSAN</th>
                        <th>HARI</th>
                        <th>MULAI</th>
                        <th>SELESAI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($penjadwalan as $penjadwalans)
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td class="text-center">{{$penjadwalans->kelas}}</td>
                            <td>{{$penjadwalans->guru}}</td>
                            <td>{{$penjadwalans->pelajaran}}</td>
                            <td>{{$penjadwalans->jurusan}}</td>
                            <td class="text-center">{{$penjadwalans->hari}}</td>
                            <td class="text-center">{{$penjadwalans->waktu_mulai}}</td>
                            <td class="text-center">{{$penjadwalans->waktu_selesai}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="btn-edit-penjadwalan" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editPenjadwalanModal" data-id="{{ $penjadwalans->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteConfirmation('{{$penjadwalans->id}}' , '{{$penjadwalans->pelajaran}}' )">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h5 class= "modal-title" id="exampleModalLabel">Tambah Data Penjadwalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route ('penjadwalan.submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" class="form-control" id="kelas">
                                <option selected >Pilih</option>
                                <option value="X TKJ 1" >X TKJ 1</option>
                                <option value="X TKJ 2" >X TKJ 2</option>
                                <option value="IX TKJ 1" >IX TKJ 1</option>
                                <option value="X RPL 1" >X RPL 1</option>
                                <option value="IX RPL 1" >IX RPL 1</option>
                                <option value="IX RPL 1" >IX RPL 1</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="guru">Guru</label>
                            <select name="guru" class="form-control" id="guru">
                                <option selected >Pilih</option>
                                @foreach ($namaGuru as $nama)
                                    <option value="{{$nama}}" >{{$nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pelajaran">Pelajaran</label>
                            <select name="pelajaran" class="form-control" id="pelajaran">
                                <option selected >Pilih</option>
                                <option value="Matematika" >Matematika</option>
                                <option value="Bahasa Indonesia" >Bahasa Indonesia</option>
                                <option value="Informatika" >Informatika</option>
                                <option value="Teknik Mesin" >Teknik Mesin</option>
                                <option value="Bahasa Inggris" >Bahasa Inggris</option>
                                <option value="Sejarah" >Sejarah</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <option selected >Pilih</option>
                                <option value="Teknologi Komputer dan Jaringan" >Teknologi Komputer dan Jaringan</option>
                                <option value="Rekayasa Perangkat Lunak" >Rekayasa Perangkat Lunak</option>
                                <option value="Otomotif" >Otomotif</option>
                                <option value="Kehutanan" >Kehutanan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="hari">Hari</label>
                            <select name="hari" class="form-control" id="hari">
                                <option selected >Pilih</option>
                                <option value="Senin" >Senin</option>
                                <option value="Selasa" >Selasa</option>
                                <option value="Rabu" >Rabu</option>
                                <option value="Kamis" >Kamis</option>
                                <option value="Jumat" >Jumat</option>
                                <option value="Sabtu" >Sabtu</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="time"class="form-control" name="waktu_mulai" id="waktu_mulai" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="time"class="form-control" name="waktu_selesai" id="waktu_selesai" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Edit --}}
<div class="modal fade" id="editPenjadwalanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Penjadwalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route ('penjadwalan.ubah')}}" enctype="multipart/form-data">
                    @csrf
                    @method ('PATCH')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" class="form-control" id="edit-kelas">
                                <option selected >Pilih</option>
                                <option value="X TKJ 1" >X TKJ 1</option>
                                <option value="X TKJ 2" >X TKJ 2</option>
                                <option value="IX TKJ 1" >IX TKJ 1</option>
                                <option value="X RPL 1" >X RPL 1</option>
                                <option value="IX RPL 1" >IX RPL 1</option>
                                <option value="IX RPL 1" >IX RPL 1</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="guru">Guru</label>
                            <select name="guru" class="form-control" id="edit-guru">
                                <option selected >Pilih</option>
                                @foreach ($namaGuru as $nama)
                                    <option value="{{$nama}}" >{{$nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pelajaran">Pelajaran</label>
                            <select name="pelajaran" class="form-control" id="edit-pelajaran">
                                <option selected >Pilih</option>
                                <option value="Matematika" >Matematika</option>
                                <option value="Bahasa Indonesia" >Bahasa Indonesia</option>
                                <option value="Informatika" >Informatika</option>
                                <option value="Teknik Mesin" >Teknik Mesin</option>
                                <option value="Bahasa Inggris" >Bahasa Inggris</option>
                                <option value="Sejarah" >Sejarah</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="edit-jurusan">
                                <option selected >Pilih</option>
                                <option value="Teknologi Komputer dan Jaringan" >Teknologi Komputer dan Jaringan</option>
                                <option value="Rekayasa Perangkat Lunak" >Rekayasa Perangkat Lunak</option>
                                <option value="Otomotif" >Otomotif</option>
                                <option value="Kehutanan" >Kehutanan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="hari">Hari</label>
                            <select name="hari" class="form-control" id="edit-hari">
                                <option selected >Pilih</option>
                                <option value="Senin" >Senin</option>
                                <option value="Selasa" >Selasa</option>
                                <option value="Rabu" >Rabu</option>
                                <option value="Kamis" >Kamis</option>
                                <option value="Jumat" >Jumat</option>
                                <option value="Sabtu" >Sabtu</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="time"class="form-control" name="waktu_mulai" id="edit-waktu_mulai" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="time"class="form-control" name="waktu_selesai" id="edit-waktu_selesai" required/>
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
            $(document).on('click','#btn-edit-penjadwalan', function(){

                let id = $(this).data('id');

                $('#image-area').empty();

                $.ajax({
                    type: "get",
                    url: "{{url('/admin/ajaxadmin/dataPenjadwalan')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                        $('#edit-id').val(res.id);
                        $('#edit-kelas').val(res.kelas);
                        $('#edit-pelajaran').val(res.pelajaran);
                        $('#edit-guru').val(res.guru);
                        $('#edit-jurusan').val(res.jurusan);
                        $('#edit-hari').val(res.hari);
                        $('#edit-waktu_mulai').val(res.waktu_mulai);
                        $('#edit-waktu_selesai').val(res.waktu_selesai);
                    },
                });
            });
        });

        function deleteConfirmation(id,pelajaran) {
            swal.fire({
                title: "Hapus?",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data penjadwalan  " +pelajaran+"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!",
                cancelButtonText: "Tidak, batalkan!",

            }).then (function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "penjadwalan/delete/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Done!", results.message, "success");
                                setTimeout(function(){
                                    location.reload();
                                },1000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
        }
    </script>
@stop