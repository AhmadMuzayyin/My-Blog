@extends('template.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card my-4">
                    <div class="card-header">
                        <div class="col-md-4">
                            {{-- <button type="button" class="btn btn-primary TambahUser">Tambah Data</button> --}}
                            <h1>Data Member</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="MyTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($user) --}}
                                    <?php $no = 1; ?>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success EditUser" id="Edit"
                                                    data-id="{{ $data->id }}">
                                                    Edit
                                                </button>
                                                <button type="submit" class="btn btn-sm btn-danger DeleteUser" id="Hapus"
                                                    data-id="{{ $data->id }}">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data-->
    <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <form>
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <div class="invalid-feedback errorNama">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            <div class="invalid-feedback errorAlamat">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data-->
    <div class="modal fade" id="EditData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <form>
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <input type="hidden" class="form-control IDUSER" id="IDUSER" name="IDUSER">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <div class="invalid-feedback errorName">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address">
                            <div class="invalid-feedback erroAddress">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-save">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delte Data-->
    <div class="modal fade" id="DeleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <form>
                        {{ csrf_field() }}
                        <h3 class="text-danger">Yakin untuk menghapus data ini?</h3>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="IDUSERDELETE" name="IDUSERDELETE">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-delete">Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('JS')
    <script>
        $(document).ready(function() {
            $('#MyTable').DataTable();
        });
        $(document).ready(function() {
            $('.TambahUser').on('click', function() {
                $('#TambahData').modal('show');
            });
        });
        $(document).ready(function() {

            $(".btn-submit").click(function(e) {

                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var nama = $("input[name='nama']").val();
                var alamat = $("input[name='alamat']").val();

                $.ajax({
                    url: "{{ route('tambah.data') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        nama: nama,
                        alamat: alamat
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: data.success,
                                icon: 'success',
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.reload(true);
                            }, 3000);
                        } else {
                            // printErrorMsg(data.error);
                            if (nama.length == "") {
                                $('#nama').addClass('is-invalid');
                                $('.errorNama').html(data.error);
                            } else if (alamat.length == "") {
                                $('#nama').removeClass('is-invalid');
                                $('#nama').addClass('is-valid');

                                $('#alamat').addClass('is-invalid');
                                $('.errorAlamat').html(data.error);
                            }

                        }
                    }
                });

            });
        });

        // For Edit Data
        $(document).on('click', '.EditUser', function() {
            let getId = $(this).data('id');
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            // console.log(getId)
            let id = $('#IDUSER').val(getId);
            $('#name').val(data[1]);
            $('#address').val(data[2]);

            $('#EditData').modal('show');
        });

        $(document).ready(function() {

            $(".btn-save").click(function(e) {

                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var id = $("#IDUSER").val();
                var nama = $("input[name='name']").val();
                var alamat = $("input[name='address']").val();
                // let data = new FormData(this);
                // let id = $('#Edit').data('id');
                console.log(id);

                $.ajax({
                    url: "{{ url('editUser') }}/" + id,
                    type: 'POST',
                    data: {
                        _token: _token,
                        id: id,
                        nama: nama,
                        alamat: alamat
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: data.success,
                                icon: 'success',
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            setTimeout(() => {
                                window.location.reload(true);
                            }, 3000);
                        } else {
                            // printErrorMsg(data.error);
                            if (nama.length == "") {
                                $('#name').addClass('is-invalid');
                                $('.errorName').html(data.error);
                            } else if (alamat.length == "") {
                                $('#name').removeClass('is-invalid');
                                $('#name').addClass('is-valid');

                                $('#address').addClass('is-invalid');
                                $('.errorAddress').html(data.error);
                            }

                        }
                    }
                });

            });
        });

        // For Delete Data
        $(document).on('click', '.DeleteUser', function() {

            let getId = $(this).data('id')
            // console.log(getId)
            let id = $('#IDUSERDELETE').val(getId)

            $('#DeleteData').modal('show');
        });
        $(document).ready(function() {

            $(".btn-delete").click(function(e) {

                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var id = $("input[name='IDUSERDELETE']").val();
                // let data = new FormData(this);
                // let id = $('#Edit').data('id');
                // console.log(id)

                $.ajax({
                    url: "{{ url('deleteUser') }}/" + id,
                    type: 'POST',
                    data: {
                        _token: _token,
                        id: id
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: data.success,
                                icon: 'success',
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            setTimeout(function() {
                                window.location.reload(true);
                            }, 1000);
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });

            });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
@endpush
