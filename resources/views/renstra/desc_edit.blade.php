@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <form action="#" method="post">
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
    
@endsection