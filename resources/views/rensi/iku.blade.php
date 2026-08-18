@extends('layouts.app')
@section('content')
    {{-- header --}}
    <div class="row">
        <div class="col col-title">
            <h2>Indikator Kinerja Utama</h2>
            <p class='fw-bold mt-1'>{{ $master_ik }}</p>
        </div>
    </div>
    @if($master_ik == '00-00-00-00-00-00')
    {{-- ik finder --}}
    <div class="row mt-3">
        <div class="col bg-white p-2">
            <label for="indikator" class="mb-1">Pilih Indikator</label>
            <input type="text" class="form-control form-control-sm border border-1 border-secondary my-2" id="indikator" placeholder="Tuliskan beberapa kata awal indiktor, lalu tekan enter" list="indilist">
            <datalist id="indilist"></datalist>
            <table class="table table-sm d-none" id="indi-tb">
                <thead>
                    <tr>
                        <th width="200">Kode Indikator</th>
                        <th>Deskripsi Indikator</th>
                    </tr>
                </thead>
                <tbody id="indi-data"></tbody>
            </table>
        </div>
    </div>
    @endif
    {{-- body --}}
    <div class="row mt-3">
        <div class="col bg-white p-3" id="indi-info">

        </div>
    </div>
    <div class="row mt-3">
        <section class="bg-white p-3">
            <h5 class="p-0">Sub Kegiatan</h5>
            <p class="pt-0 pb-1 m-0" id="iku-desk">Deskripsi</p>
            <p class="fst-italic pt-0 pb-1 m-0" id="iku-indikator">indikator</p>
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <th width='200px' class='bg-litegray'>Satuan</th>
                        <td id="iku-satuan"></td>
                    </tr>
                    <tr>
                        <th class="bg-litegray">Target Tahun {{ date('Y') }}</th>
                        <td id="iku-target"></td>
                    </tr>
                    <tr>
                        <th class='bg-litegray'>Tipe Hitung</th>
                        <td id="iku-tipehitung"></td>
                    </tr>
                    <tr>
                        <th class='bg-litegray'>Penanggung Jawab</th>
                        <td id="iku-penjab"></td>
                    </tr>
                    <tr>
                        <th class='bg-litegray'>Sumber Data</th>
                        <td id="iku-sumberdata"></td>
                    </tr>
                    <tr>
                        <th class='bg-litegray'>Alasan</th>
                        <td id="iku-alasan"></td>
                    </tr>
                    <tr>
                        <th class='bg-litegray'>Formulasi</th>
                        <td id="iku-formulasi"></td>
                    </tr>
                    <tr>
                        <th class='bg-litegray'>Definisi Operasional</th>
                        <td id="iku-do"></td>
                    </tr>
                </tbody>
            </table>
            
        </section>
    </div>
@endsection

@section('scriptes')
<script>
    const mik = "{{ $master_ik }}";
    const cyr = "{{ date('Y')-2025 }}";
    const tgt = "t"+cyr;
    // console.log(tgt);
    $(function(){
        $('#indikator').keypress(function(e){
            if(e.which === 13){
                e.preventDefault();
                const data = {data: $('#indikator').val()};
                $.ajax({
                    url: apiurl + "/ukin/get-indi",
                    method: "POST",
                    data: JSON.stringify(data),
                    headers: {
                        "Content-Type":"application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function(res){
                        $("#indi-tb").removeClass('d-none');
                        $("#indi-data").empty();
                        res.data.forEach(ind => {
                            let ikurl = "{{ url('/rensi/iku/') }}";
                            $("#indi-data").append(`
                            <tr>
                                <td><a href="${ikurl}/${ind.master_ik}" class="master-ik text-decoration-none">${ind.master_ik}</a></td>
                                <td>${ind.indikator}</td>
                            </tr>
                            `);
                        });
    
                    }
                });
            }
        });

        // pilihan indikator
        $("#indikator").focus(function(){
            let prefix = ['Rata','Harapan','Persentase','Angka','Indeks','Jumlah','Peningkatan','Numerasi','Terlaksananya','Nilai'];
            $("#indilist").empty();
            prefix.forEach(p=>{
                $("#indilist").append(`<option>${p}</option>`);
            })
        })

        if(mik !=='00-00-00-00-00-00'){
            // fetch parent data (tujuan s.d program)
            fetch(apiurl+"/desc/detailcode/"+mik)
            .then(response => response.json())
            .then(data=>{
                $.each(data, function(key,value){
                    let indicators = "";
                    $.each(value, function(k,v){
                        $.each(v.indicators,function(ik,iv){
                            indicators +=`<li class="list-group-item ps-3 py-0">${iv.indikator}</li>`;
                        })
                    })
                    if(key!='subkegiatan'){
                        let ukey = key.toUpperCase();
                        $("#indi-info").append(`
                        <section class="mb-2 p-2 border-bottom border-1 border-dark">
                            <h5 class="m-0"><strong>${ukey}</strong></h5>
                            <p class="m-0">${value[0].deskripsi_1}</p>
                            <ul class="list-group-item">
                                ${value[0].indicators ? indicators : ''}
                            </ul>
                        </section>
                        `);
                    }
                })
            })

            // fetch sub kegiatan
            fetch(apiurl+"/view/"+mik)
            .then(response=>response.json())
            .then(data=>{
                // console.log(data.des);
                $("#iku-desk").text(data.des.deskripsi_1);
                $("#iku-indikator").text(data.ind.indikator);
                $("#iku-satuan").text(data.ind.satuan);
                $("#iku-target").text(data.ind[tgt]);
                $("#iku-tipehitung").text(data.ind.iku_tipehitung);
                $("#iku-penjab").text(data.ind.iku_penjab);
                $("#iku-sumberdata").text(data.ind.iku_sumberdata);
                $("#iku-alasan").text(data.ind.iku_alasan);
                $("#iku-formulasi").text(data.ind.iku_formulasi);
                $("#iku-do").text(data.ind.iku_do);
            });
        }
    })      

</script>
    
@endsection