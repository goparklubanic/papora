@php
    $cy = date('Y');
    $ny = $cy+1;
@endphp
@extends('layouts.app')
@section('content')
    <div class="row">
    <div class="col col-title">
        <h2>{{ $topic }}</h2>
        <p class='fw-bold'>{{ $master_ik }}</p>
    </div>
</div>
<div class="row mt-2 ff-dosis">
    <div class="col-sm-8 mx-auto">
        <section class="bg-white rounded-3 p-3 mb-2 px-2" id="parent-info">

        </section>
        {{-- deskripsi --}}
        <section class="bg-white rounded-3 p-3 mb-2">
            <p class="title">{{ $topic }}</p>
            <p class="deskripsi" id="des_1"></p>
            <p class="deskripsi" id="des_2"></p>
        </section>
        {{-- indikator --}}
        <section class="bg-white rounded-3 p-3 mb-2">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td class="title">Indikator</td>
                        <td id="indikator"></td>
                    </tr>
                    <tr>
                        <td class="title">Satuan</td>
                        <td id="satuan"></td>
                    </tr>
                    <tr>
                        <td class="title">Baseline</td>
                        <td id="baseline"></td>
                    </tr>
                    <tr>
                        <td class="title">Target</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-striped table-sm mt-2">
                <thead>
                    <tr class="text-center">
                        <th class="text-start fw-bold tbr-first-col">Tahun</th>
                        @if ($cy == 2026)
                            <th id="t1"></th>                            
                        @endif
                        @if ($cy == 2026 && $ny==2027)
                            <th id="t2"></th>                            
                        @endif
                        @if ($cy == 2027 && $ny==2028)
                            <th id="t3"></th>                            
                        @endif
                        @if ($cy == 2028 && $ny==2029)
                            <th id="t4"></th>                            
                        @endif
                        @if ($cy == 2029 || $cy==2030)
                            <th id="t5"></th>                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Rencana</td>
                        @if($cy==2026) <td id="vt1"></td> @endif
                        @if($cy==2026 && $ny==2027) <td id="vt2"></td> @endif
                        @if($cy==2027 && $ny==2028) <td id="vt3"></td> @endif
                        @if($cy==2028 && $ny==2029) <td id="vt4"></td> @endif
                        @if($cy==2029 || $ny==2030) <td id="vt5"></td> @endif
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW1</td>
                        @if($cy==2026) <td id="cvt1_tw1"></td> @endif
                        @if($cy==2026 && $ny==2027) <td id="cvt2_tw1"></td> @endif
                        @if($cy==2027 && $ny==2028) <td id="cvt3_tw1"></td> @endif
                        @if($cy==2028 && $ny==2029) <td id="cvt4_tw1"></td> @endif
                        @if($cy==2029 || $ny==2030) <td id="cvt5_tw1"></td> @endif
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW2</td>
                        @if($cy==2026) <td id="cvt1_tw2"></td> @endif
                        @if($cy==2026 && $ny==2027) <td id="cvt2_tw2"></td> @endif
                        @if($cy==2027 && $ny==2028) <td id="cvt3_tw2"></td> @endif
                        @if($cy==2028 && $ny==2029) <td id="cvt4_tw2"></td> @endif
                        @if($cy==2029 || $ny==2030) <td id="cvt5_tw2"></td> @endif
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW3</td>
                        @if($cy==2026) <td id="cvt1_tw3"></td> @endif
                        @if($cy==2026 && $ny==2027) <td id="cvt2_tw3"></td> @endif
                        @if($cy==2027 && $ny==2028) <td id="cvt3_tw3"></td> @endif
                        @if($cy==2028 && $ny==2029) <td id="cvt4_tw3"></td> @endif
                        @if($cy==2029 || $ny==2030) <td id="cvt5_tw3"></td> @endif
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW4</td>
                        @if($cy==2026) <td id="cvt1_tw4"></td> @endif
                        @if($cy==2026 && $ny==2027) <td id="cvt2_tw4"></td> @endif
                        @if($cy==2027 && $ny==2028) <td id="cvt3_tw4"></td> @endif
                        @if($cy==2028 && $ny==2029) <td id="cvt4_tw4"></td> @endif
                        @if($cy==2029 || $ny==2030) <td id="cvt5_tw4"></td> @endif
                    </tr>
                </tbody>
            </table>
            {{-- if topic == "Sub Kegiatan" --}}
            @if($topic == "Sub Kegiatan")

            <div>Anggaran</div>
            <table class="table table-striped table-sm mt-2">
                <thead>
                    <tr class="text-center">
                        <th class="text-start fw-bold tbr-first-col">Tahun</th>
                        <th id="at1"></th>
                        <th id="at2"></th>
                        <th id="at3"></th>
                        <th id="at4"></th>
                        <th id="at5"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Rencana</td>
                        <td class="text-end monospace fsz-6" id="vat1"></td>
                        <td class="text-end monospace fsz-6" id="vat2"></td>
                        <td class="text-end monospace fsz-6" id="vat3"></td>
                        <td class="text-end monospace fsz-6" id="vat4"></td>
                        <td class="text-end monospace fsz-6" id="vat5"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW1</td>
                        <td class="text-end monospace fsz-6" id="cat1_tw1"></td>
                        <td class="text-end monospace fsz-6" id="cat2_tw1"></td>
                        <td class="text-end monospace fsz-6" id="cat3_tw1"></td>
                        <td class="text-end monospace fsz-6" id="cat4_tw1"></td>
                        <td class="text-end monospace fsz-6" id="cat5_tw1"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW2</td>
                        <td class="text-end monospace fsz-6" id="cat1_tw2"></td>
                        <td class="text-end monospace fsz-6" id="cat2_tw2"></td>
                        <td class="text-end monospace fsz-6" id="cat3_tw2"></td>
                        <td class="text-end monospace fsz-6" id="cat4_tw2"></td>
                        <td class="text-end monospace fsz-6" id="cat5_tw2"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW3</td>
                        <td class="text-end monospace fsz-6" id="cat1_tw3"></td>
                        <td class="text-end monospace fsz-6" id="cat2_tw3"></td>
                        <td class="text-end monospace fsz-6" id="cat3_tw3"></td>
                        <td class="text-end monospace fsz-6" id="cat4_tw3"></td>
                        <td class="text-end monospace fsz-6" id="cat5_tw3"></td>
                    </tr>
                    <tr class="text-center">
                        <td class="fw-bold text-start">Capaian TW4</td>
                        <td class="text-end monospace fsz-6" id="cat1_tw4"></td>
                        <td class="text-end monospace fsz-6" id="cat2_tw4"></td>
                        <td class="text-end monospace fsz-6" id="cat3_tw4"></td>
                        <td class="text-end monospace fsz-6" id="cat4_tw4"></td>
                        <td class="text-end monospace fsz-6" id="cat5_tw4"></td>
                    </tr>
                </tbody>
            </table>
            @endif
        </section>
        <section class="bg-white rounded-3 p-3 mb-2 d-none">
            <p class="title">Indikator Kinerja Utama</p>
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td>Alasan</td>
                        <td id="iku_alasan"></td>
                    </tr>
                    <tr>
                        <td>Formulasi</td>
                        <td id="iku_formulasi"></td>
                    </tr>
                    <tr>
                        <td>Tipe Hitung</td>
                        <td id="iku_tipehitung"></td>
                    </tr>
                    <tr>
                        <td>Definisi Operasional</td>
                        <td id="iku_do"></td>
                    </tr>
                    <tr>
                        <td>Sumber Data</td>
                        <td id="iku_sumberdata"></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="bg-white rounded-3 p-3 mb-2 text-center">
            {{-- link to previous page --}}
            <a href="{{ url("/renstra/print/$master_ik") }}" target="_blank" class="btn btn-sm btn-dark">Cetak</a>
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">Kembali</a>
        </section>
    </div>
</div>
@endsection

@section('scriptes')
<script>
    const topic = "{{ $topic }}";
    $(function(){
        getParentInfo("{{ $topic }}","{{ $master_ik }}");
        fetch(apiurl + "/view/{{ $master_ik }}")
        .then(response => response.json())
        .then(data => {
            // console.log(data);r
            let basetahun=parseInt(data.des.tahun);
            $("#des_1").text("- " + data.des.deskripsi_1);
            $("#des_2").text("- " + data.des.deskripsi_2);
            $("#indikator").text(data.ind.indikator);
            $("#satuan").text(data.ind.satuan);
            $("#baseline").text(data.ind.baseline);
            $("#t1").text(basetahun+1);
            $("#t2").text(basetahun+2);
            $("#t3").text(basetahun+3);
            $("#t4").text(basetahun+4);
            $("#t5").text(basetahun+5);
            $("#at1").text(basetahun+1);
            $("#at2").text(basetahun+2);
            $("#at3").text(basetahun+3);
            $("#at4").text(basetahun+4);
            $("#at5").text(basetahun+5);
            $("#vt1").text(data.ind.t1);
            $("#vt2").text(data.ind.t2);
            $("#vt3").text(data.ind.t3);
            $("#vt4").text(data.ind.t4);
            $("#vt5").text(data.ind.t5);
            $("#cvt1_tw1").text(data.ind.ct1_tw1);
            $("#cvt2_tw1").text(data.ind.ct2_tw1);
            $("#cvt3_tw1").text(data.ind.ct3_tw1);
            $("#cvt4_tw1").text(data.ind.ct4_tw1);
            $("#cvt5_tw1").text(data.ind.ct5_tw1);
            $("#cvt1_tw2").text(data.ind.ct1_tw2);
            $("#cvt2_tw2").text(data.ind.ct2_tw2);
            $("#cvt3_tw2").text(data.ind.ct3_tw2);
            $("#cvt4_tw2").text(data.ind.ct4_tw2);
            $("#cvt5_tw2").text(data.ind.ct5_tw2);
            $("#cvt1_tw3").text(data.ind.ct1_tw3);
            $("#cvt2_tw3").text(data.ind.ct2_tw3);
            $("#cvt3_tw3").text(data.ind.ct3_tw3);
            $("#cvt4_tw3").text(data.ind.ct4_tw3);
            $("#cvt5_tw3").text(data.ind.ct5_tw3);
            $("#cvt1_tw4").text(data.ind.ct1_tw4);
            $("#cvt2_tw4").text(data.ind.ct2_tw4);
            $("#cvt3_tw4").text(data.ind.ct3_tw4);
            $("#cvt4_tw4").text(data.ind.ct4_tw4);
            $("#cvt5_tw4").text(data.ind.ct5_tw4);
            $("#iku_alasan").text(data.ind.iku_alasan);
            $("#iku_formulasi").text(data.ind.iku_formulasi);
            $("#iku_tipehitung").text(data.ind.iku_tipehitung);
            $("#iku_do").text(data.ind.iku_do);
            $("#iku_sumberdata").text(data.ind.iku_sumberdata);
        });
        if(topic == 'Sub Kegiatan'){
            getBudget("{{ $master_ik }}");
        }
    })

    function getBudget(master_ik){
        fetch(apiurl + "/budget/" + master_ik)
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            $("#vat1").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.t1));
            $("#vat2").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.t2));
            $("#vat3").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.t3));
            $("#vat4").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.t4));
            $("#vat5").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.t5));
            $("#cat1_tw1").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct1_tw1));
            $("#cat2_tw1").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct2_tw1));
            $("#cat3_tw1").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct3_tw1));
            $("#cat4_tw1").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct4_tw1));
            $("#cat5_tw1").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct5_tw1));
            $("#cat1_tw2").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct1_tw2));
            $("#cat2_tw2").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct2_tw2));
            $("#cat3_tw2").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct3_tw2));
            $("#cat4_tw2").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct4_tw2));
            $("#cat5_tw2").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct5_tw2));
            $("#cat1_tw3").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct1_tw3));
            $("#cat2_tw3").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct2_tw3));
            $("#cat3_tw3").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct3_tw3));
            $("#cat4_tw3").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct4_tw3));
            $("#cat5_tw3").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct5_tw3));
            $("#cat1_tw4").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct1_tw4));
            $("#cat2_tw4").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct2_tw4));
            $("#cat3_tw4").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct3_tw4));
            $("#cat4_tw4").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct4_tw4));
            $("#cat5_tw4").text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(data.ct5_tw4));
        });
    }

    function getParentInfo(topic,master_ik){
        // lower and strip whitespace topic
        topic = topic.toLowerCase().replace(/\s/g, '');

        fetch(apiurl + "/desc/detailcode/" + master_ik)
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            // for key and value
            $.each(data, function(key, value){
                lkey = key.toLowerCase().replace(/\s/g, '');
                
                if(lkey == topic){
                    return false
                }else{
                    let indicators="";
                    $.each(value, function(k, v){
                        // console.log(v.indicators);
                        $.each(v.indicators, function(ik, iv){
                            // console.log(iv.indikator);
                            indicators += `<li class="list-group-item py-0">${iv.indikator}</li>`;
                        })
                    })
                    $("#parent-info").append(`
                    <hr/>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td class="title" width="200">${key}</td>
                                <td>${value[0].deskripsi_1}</td>
                            </tr>
                            <tr>
                                <td class="title">Indikator</td>
                                <td>
                                    <ul class="list-group">
                                    ${value[0].indicators ? indicators : '-'}
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    `);

                }
            })
        });
    }
</script>
    
@endsection