@extends('layouts.app')
@section('content')
    <div class="row">
    <div class="col col-title">
        <h2>{{ $topic }}</h2>
        <p class='fw-bold'>{{ $master_ik }}</p>
    </div>
</div>
<div class="row mt-2">
    <div class="col-sm-8 mx-auto">
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
                        <th id="t1"></th>
                        <th id="t2"></th>
                        <th id="t3"></th>
                        <th id="t4"></th>
                        <th id="t5"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td id="vt1"></td>
                        <td id="vt2"></td>
                        <td id="vt3"></td>
                        <td id="vt4"></td>
                        <td id="vt5"></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="bg-white rounded-3 p-3 mb-2">
            <p class="title">Indikator Kinerja Umum</p>
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
    </div>
</div>
@endsection

@section('scriptes')
<script>
    $(function(){
        fetch(apiurl + "/view/{{ $master_ik }}")
        .then(response => response.json())
        .then(data => {
            console.log(data);
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
            $("#vt1").text(data.ind.t1);
            $("#vt2").text(data.ind.t2);
            $("#vt3").text(data.ind.t3);
            $("#vt4").text(data.ind.t4);
            $("#vt5").text(data.ind.t5);
            $("#iku_alasan").text(data.ind.iku_alasan);
            $("#iku_formulasi").text(data.ind.iku_formulasi);
            $("#iku_tipehitung").text(data.ind.iku_tipehitung);
            $("#iku_do").text(data.ind.iku_do);
            $("#iku_sumberdata").text(data.ind.iku_sumberdata);
        });
    })
</script>
    
@endsection