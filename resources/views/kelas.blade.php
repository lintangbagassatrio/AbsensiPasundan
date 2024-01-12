@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Data Kelas</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Pengelolaan Kelas')}}</div>
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">
                <i class="fa fa-plus">   Tambah Data</i>
            </button>
            <hr>
            <table id="table-data" class="table table-responsive-lg table-stripped">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($kelas as $kelass)
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td>{{$kelass->nama}}</td>
                            <td>{{$kelass->jurusan}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="btn-edit-kelas" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editKelasModal" data-id="{{ $kelass->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteConfirmation('{{$kelass->id}}' , '{{$kelass->nama}}' )">
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
                <h5 class= "modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route ('kelas.submit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nama">Nama Kelas</label>
                            <input type="text"class="form-control" name="nama" id="nama" required/>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <option selected >Pilih</option>
                                @foreach ($namaJurusan as $nama)
                                    <option value="{{$nama->nama}}" >{{$nama->nama}}</option>
                                @endforeach
                            </select>
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
<div class="modal fade" id="editKelasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route ('kelas.ubah')}}" enctype="multipart/form-data">
                    @csrf
                    @method ('PATCH')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nama">Nama Kelas</label>
                            <input type="text"class="form-control" name="nama" id="edit-nama" required/>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="edit-jurusan">
                                <option selected >Pilih</option>
                                @foreach ($namaJurusan as $nama)
                                    <option value="{{$nama->nama}}" >{{$nama->nama}}</option>
                                @endforeach
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
            $(document).on('click','#btn-edit-kelas', function(){

                let id = $(this).data('id');

                $('#image-area').empty();

                $.ajax({
                    type: "get",
                    url: "{{url('/admin/ajaxadmin/dataKelas')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                        $('#edit-id').val(res.id);
                        $('#edit-nama').val(res.nama);
                        $('#edit-jurusan').val(res.jurusan);
                    },
                });
            });
        });

        function deleteConfirmation(id,name) {
            swal.fire({
                title: "Hapus?",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data kelas dengan nama  " +name+"?!",
                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!",
                cancelButtonText: "Tidak, batalkan!",

            }).then (function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "kelas/delete/" + id,
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