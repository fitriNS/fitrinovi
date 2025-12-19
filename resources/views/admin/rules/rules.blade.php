@extends('admin.admin_main')
@section('title', 'Rules')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <div class="container text-center mt-lg-5 p-lg-5">
        <div class="row">
            <div class="col-lg-8 justify-content-center mx-auto">

                @if (session()->has('pesan'))
                    {!! session('pesan') !!}
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger mt-3 p-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mt-2 pt-3 d-flex ms-auto">
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#storeModal">
                        <i class="bi bi-plus-circle-fill"> Tambah Rules</i>
                    </button>
                </div>

                <table id="tabel-rules" class="table table-bordered table-hover my-2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Depresi</th>
                            <th scope="col">Min</th>
                            <th scope="col">Max</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rules as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->kode_depresi }}</td>
                                <td>{{ $item->min }}</td>
                                <td>{{ $item->max }}</td>
                                <td>
                                    <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#editModal"
                                        onclick="editRule('{{ $item->id }}', '{{ $item->kode_depresi }}', '{{ $item->min }}', '{{ $item->max }}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('rules.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('Hapus data ini?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal Tambah Rule -->
                <div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="storeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('rules.store') }}" method="POST" class="modal-content">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Rules</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="kode_depresi" placeholder="Kode Depresi"
                                        required>
                                    <label>Kode Depresi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="min" placeholder="Min" required>
                                    <label>Min</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="max" placeholder="Max" required>
                                    <label>Max</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit Rule -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" class="modal-content" id="editForm">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Rules</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="kode_depresi" id="edit_kode" required>
                                    <label>Kode Depresi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="min" id="edit_min" required>
                                    <label>Min</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="max" id="edit_max" required>
                                    <label>Max</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    function editRule(id, kode, min, max) {
                        document.getElementById('edit_kode').value = kode;
                        document.getElementById('edit_min').value = min;
                        document.getElementById('edit_max').value = max;
                        document.getElementById('editForm').action = `/admin/rules/${id}`;
                    }
                </script>

            </div>
        </div>
    </div>
@endsection