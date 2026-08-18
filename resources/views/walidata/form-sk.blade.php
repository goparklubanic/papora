@extends('layouts.wd-app');
@section('content')
    {{-- Kegiatan Finder --}}
    <section class="bg-white rounded-3 p-3 mb-2" id="paramfinder">
        <h4>Tentukan Nama Kegiatan</h4>
        <input type="text" class="form-control border border-1 border-secondary" id="paramaksi" placeholder="Tulis beberapa kalimat awal indikator, lalu tekan enter">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>ID Kegiatan</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody id="aksidata" class="fsz-6"></tbody>
        </table>
    </section>

@endsection

@section('scriptes')
    <script>
        $(function(){
            fetch(apiurl + "/desc/list-kegiatan")
            .then(response=>response.json())
            .then(data=>{
                $("#aksidata").empty();
                data.forEach((aksi,idx)=>{
                    $("#aksidata").append(`
                    <tr>
                        <td><span class='master_id text-primary'>${aksi.master_id}</span></td>
                        <td>${aksi.deskripsi_1}</td>
                    </tr>
                    `);
                })
            });
        })
    </script>
@endsection