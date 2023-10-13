@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Data Siswa</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Pengelolaan Siswa')}}</div>
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">
                <i class="fa fa-plus">   Tambah Data</i>
            </button>
            <hr>
            <table id="table-data" class="table table-responsive-lg table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>N0. INDUK</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($siswa as $siswas)
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td>{{$siswas->induk}}</td>
                            <td>{{$siswas->nisn}}</td>
                            <td>{{$siswas->name}}</td>
                            <td>{{$siswas->kelas}}</td>
                            <td>{{$siswas->jurusan}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="btn-edit-siswa" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editSiswaModal" data-id="{{ $siswas->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteConfirmation('{{$siswas->id}}' , '{{$siswas->name}}' )">
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
                <h5 class= "modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route ('siswa.submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nama">Nama Siswa</label>
                            <input type="text"class="form-control" name="name" id="nama" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="induk">Nomor Induk</label>
                            <input type="text"class="form-control" name="induk" id="induk" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nisn">NISN</label>
                            <input type="text"class="form-control" name="nisn" id="nisn" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lahir">Tanggal Lahir</label>
                            <input type="date"class="form-control" name="lahir" id="lahir" required/>
                        </div>
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <option selected >Pilih</option>
                                <option value="Teknologi Komputer dan Jaringan" >Teknologi Komputer dan Jaringan</option>
                                <option value="Rekayasa Perangkat Lunak" >Rekayasa Perangkat Lunak</option>
                                <option value="Otomotif" >Otomotif</option>
                                <option value="Kehutanan" >Kehutanan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text"class="form-control" name="alamat" id="alamat" required/>
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
<div class="modal fade" id="editSiswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route ('siswa.ubah')}}" enctype="multipart/form-data">
                    @csrf
                    @method ('PATCH')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nama">Nama Siswa</label>
                            <input type="text"class="form-control" name="name" id="edit-nama" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="induk">Nomor Induk</label>
                            <input type="text"class="form-control" name="induk" id="edit-induk" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nisn">NISN</label>
                            <input type="text"class="form-control" name="nisn" id="edit-nisn" required/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lahir">Tanggal Lahir</label>
                            <input type="date"class="form-control" name="lahir" id="edit-lahir" required/>
                        </div>
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="edit-jurusan">
                                <option selected >Pilih</option>
                                <option value="Teknologi Komputer dan Jaringan" >Teknologi Komputer dan Jaringan</option>
                                <option value="Rekayasa Perangkat Lunak" >Rekayasa Perangkat Lunak</option>
                                <option value="Otomotif" >Otomotif</option>
                                <option value="Kehutanan" >Kehutanan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text"class="form-control" name="alamat" id="edit-alamat" required/>
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
            $(document).on('click','#btn-edit-siswa', function(){

                let id = $(this).data('id');

                $('#image-area').empty();

                $.ajax({
                    type: "get",
                    url: "{{url('/admin/ajaxadmin/dataSiswa')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                        $('#edit-id').val(res.id);
                        $('#edit-nama').val(res.name);
                        $('#edit-lahir').val(res.lahir);
                        $('#edit-induk').val(res.induk);
                        $('#edit-nisn').val(res.nisn);
                        $('#edit-kelas').val(res.kelas);
                        $('#edit-jurusan').val(res.jurusan);
                        $('#edit-alamat').val(res.alamat);
                    },
                });
            });
        });

        function deleteConfirmation(id,name) {
            swal.fire({
                title: "Hapus?",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data siswa dengan nama  " +name+"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!",
                cancelButtonText: "Tidak, batalkan!",

            }).then (function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "siswa/delete/" + id,
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