@extends('layouts.app')
@section('content')
    <div class="row">
    <div class="col col-title">
        <h2>Update Deskripsi</h2>
        <p class='fw-bold'>{{ $master_id }}</p>
    </div>
</div>
    {{-- alert placeholder triggered by javascript --}}
    <div id="alert-phd" class="alert alert-success alert-dismissible fade d-none" role="alert">
        <p id="alert-message"></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <form action="#" method="post" id="form-desc">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label for="master_id">Master ID</label>
                    <input type="text" name="master_id" id="master_id" class="form-control" value="{{ $master_id }}" readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="deskripsi_1">Deskripsi 1 (Sasaran)</label>
                    <textarea name="deskripsi_1" id="deskripsi_1" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="deskripsi_1">Deskripsi 2 (Nama)</label>
                    <textarea name="deskripsi_2" id="deskripsi_2" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
@endsection

@section('scriptes')
    <script>
        $(function () {
        fetch(apiurl + "/get/description/{{ $master_id }}")
            .then((response) => response.json())
            .then((data) => {
                // console.log(data);
                $("#deskripsi_1").val(data.deskripsi_1);
                $("#deskripsi_2").val(data.deskripsi_2);
            });
        });
    </script>
    <script src="{{ asset('js/updater.js') }}"></script>
@endsection