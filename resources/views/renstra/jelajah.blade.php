@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <h1>Jelajah Renstra</h1>
    </div>
</div>
{{-- TUJUAN --}}
<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto">
        <div class="fw-bold my-0 table-title">TUJUAN</div>
        <table class="table table-sm table-renstra">
            {{-- <thead>
                <tr>
                    <th>Sasaran Tujuan</th>
                    <th>Uraian Tujuan</th>
                    <th>Kontrol</th>
                </tr>
            </thead> --}}
            <tbody id="tujuans"></tbody>
        </table>
    </div>
</div>
{{-- SASARAN --}}
<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto">
        <div class="fw-bold my-0 table-title">SASARAN</div>
        <table class="table table-sm table-renstra">
            {{-- <thead>
                <tr>
                    <th>Sasaran Strategis</th>
                </tr>
            </thead> --}}
            <tbody id="sasarans"></tbody>
        </table>
    </div>
</div>
{{-- PROGRAM --}}
<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto">
        <div class="fw-bold my-0 table-title">PROGRAM</div>
        <table class="table table-sm table-renstra">
            {{-- <thead>
                <tr>
                    <th>Sasaran Program</th>
                    <th>Uraian Program</th>
                    <th>Kontrol</th>
                </tr>
            </thead> --}}
            <tbody id="programs"></tbody>
        </table>
    </div>
</div>
{{-- KEGIATAN --}}
<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto">
        <div class="fw-bold my-0 table-title">KEGIATAN</div>
        <table class="table table-sm table-renstra">
            {{-- <thead>
                <tr>
                    <th>Sasaran Kegiatan</th>
                    <th>Uraian Kegiatan</th>
                    <th>Kontrol</th>
                </tr>
            </thead> --}}
            <tbody id="kegiatans"></tbody>
        </table>
    </div>
</div>
{{-- SUB KEGIATAN --}}
<div class="row">
    <div class="col-md-12 col-xl-10 mx-auto">
        <div class="fw-bold my-0 table-title">SUB KEGIATAN</div>
        <table class="table table-sm table-renstra">
            {{-- <thead>
                <tr>
                    <th>Sasaran Sub Kegiatan</th>
                    <th>Uraian Sub Kegiatan</th>
                </tr>
            </thead> --}}
            <tbody id="subkegiatans"></tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-2 mx-auto">
        <button class="btn btn-dark" id="detil">Detil Informasi</button>
    </div>
</div>
@endsection
@section('scriptes')
<script>
    $(function(){
        console.log(apiurl);
        fetch(apiurl + '/desc/getTujuan')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(tj=>{
                $("#tujuans").append(`
                    <tr>
                        <td>
                            <section class="row">
                                <div class="col-sm-2 fw-bold desc-sasaran">SASARAN</div>
                                <div class="col-sm-10 desc-nama">${tj.deskripsi_1}</div>
                            </section>
                            <section class="row">
                                <div class="col-sm-2 fw-bold desc-sasaran">NAMA</div>
                                <div class="col-sm-10 desc-nama">${tj.deskripsi_2}</div>
                            </section>
                        </td>
                        <td width="150px" class="align-middle">
                            <button class="btn btn-sm btn-dark" data-id="${tj.master_id}">Sasaran</button>
                        </td>
                    </tr>
                `);
            })
        });
    })
</script>
<script src="{{ asset('js/ccd_desc.js') }}"></script>
@endsection