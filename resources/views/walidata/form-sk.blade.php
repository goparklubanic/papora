@extends('layouts.wd-app');
@section('content')
    {{-- Kegiatan Finder --}}
    <section class="bg-white rounded-3 p-3 mb-2" id="paramfinder">
        <h5>Tentukan Nama Kegiatan</h5>
        <input type="text" class="form-control border border-1 border-secondary" id="paramaksi" placeholder="Tulis kata pertama nama kegiatan, lalu tekan enter">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th width='125'>ID Kegiatan</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody id="aksidata" class="fsz-6"></tbody>
        </table>
    </section>

    <div class="section bg-white rounded-3 p-3 mb-2">
        <form action="#" method="post">
            {{-- Imput CCD_Descs --}}
            <h5>Deskripsi Sub Kegiatan</h5>
            <table class="table table-sm mb-2">
                <thead>
                    <tr>
                        <th>Id Sub Kegiatan</th>
                        <th>TJ</th>
                        <th>SS</th>
                        <th>PG</th>
                        <th>KG</th>
                        <th>SK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" @readonly(true) id="master_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="tj_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="ss_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="pg_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="kg_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="sk_id"></td>
                    </tr>
                    <tr>
                        <td colspan="6">Deskripsi</td>
                    </tr>
                    <tr>
                        <td colspan="6"><textarea id="deskripsi_1" rows="3" class="form-control"></textarea></td>
                    </tr>
                </tbody>
            </table>
            {{-- INPUT CCD_INDICATORS --}}
            <h5>INDIKATOR</h5>
            <table class="table table-sm mb-2">
                <tbody>
                    <tr>
                        <td colspan="5">Indikator</td>
                    </tr>
                    <tr>
                        <td colspan="5"><textarea id="indikator" rows="3" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">Satuan</td>
                        <td colspan="3">Baseline</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" class="form-control" id="satuan"></td>
                        <td colspan="3"><input type="number" id="baseline" class="form-control" min="0" value="0"></td>
                    </tr>
                    <tr>
                        <td colspan="5" class='text-start'>Target Kinerja Per Tahun</td>
                    </tr>
                    <tr>
                        <td class="text-center">2026</td>
                        <td class="text-center">2027</td>
                        <td class="text-center">2028</td>
                        <td class="text-center">2029</td>
                        <td class="text-center">2030</td>
                    </tr>
                    <tr>
                        <td><input type="number" step="0.01" id="kt1" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt2" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt3" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt4" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt5" class="form-control text-end" min="0" value="0"></td>
                    </tr>
                </tbody>
            </table>
            {{-- INPUT CCD_INDICATORS --}}
            <h5>ANGGARAN</h5>
            <table class="table mb-2">
                <tbody>
                    <tr>
                        <td colspan="5" class='text-start'>Target Keuangan Per Tahun</td>
                    </tr>
                    <tr>
                        <td class="text-center">2026</td>
                        <td class="text-center">2027</td>
                        <td class="text-center">2028</td>
                        <td class="text-center">2029</td>
                        <td class="text-center">2030</td>
                    </tr>
                    <tr>
                        <td><input type="number" id="at1" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at2" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at3" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at4" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at5" class="form-control text-end" min="0" value="0"></td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-around align-middle">
                <input type="reset" value="Reset" class="btn btn-success w100px">
                <input type="submit" value="Simpan" class="btn btn-primary w100px">
            </div>
        </form>
        <style>
            input, textarea{
                border: 1px solid gray!important;
            }
            .w100px{
                width: 100px;
            }
            
        </style>
    </div>
@endsection

@section('scriptes')
    <script>
        const kegs=[];
        $(function(){
            fetch(apiurl + "/desc/list-kegiatan")
            .then(response=>response.json())
            .then(data=>{
                let kegiatan = data.data;
                kegiatan.forEach((aksi,idx)=>{
                    let item = {'master_id':aksi.master_id,'deskripsi':aksi.deskripsi_1}; 
                    kegs.push(item);
                })
            });
            // console.log(kegs);

            // filter kegiatan
            $("#paramaksi").keypress(function(ev){
                if(ev.which === 13){
                    ev.preventDefault();
                    let aksi=kegs.filter(item => item.deskripsi.startsWith('Pengelolaan'));
                    $("#aksidata").empty();
                    aksi.forEach(item=>{
                        $("#aksidata").append(`
                        <tr>
                            <td><span class='master_id text-primary hand-cursor'>${item.master_id}</span></td>
                            <td>${item.deskripsi}</td>
                        </tr>
                        `);
                    })
                }
            })
        })
    </script>
@endsection