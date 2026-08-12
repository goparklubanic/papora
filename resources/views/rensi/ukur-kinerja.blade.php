@extends('layouts.app1')
@section('content')
    {{-- 
    <div class="row">
        <div class="col col-title">
            <h2>Pengukuran Kinerja Tahun …</h2>
            <p class='fw-bold'>{{ $master_ik }}</p>
        </div>
    </div> 
    --}}
    <div class="row mt-2 ff-dosis">
        <div class="col-sm-8 mx-auto">
            {{-- Komponen / Elemen --}}
            <section class="bg-white rounded-3 p-3 mb-2">
                <h2>Pengukuran Kinerja Tahun …</h2>
                <table class="table table-sm mb-0">
                    <tbody>
                        <tr>
                            <td class="title" style="width:45%">Nama Tujuan, Sasaran, Program, Kegiatan atau Sub Kegiatan</td>
                            <td id="nama"></td>
                        </tr>
                        <tr>
                            <td class="title">Indikator</td>
                            <td id="indikator"></td>
                        </tr>
                        <tr>
                            <td class="title">Alasan Pemilihan Indikator</td>
                            <td id="iku_alasan"></td>
                        </tr>
                        <tr>
                            <td class="title">Formulasi Pengukuran</td>
                            <td id="iku_formulasi"></td>
                        </tr>
                        <tr>
                            <td class="title">Tipe Perhitungan</td>
                            <td id="iku_tipehitung"></td>
                        </tr>
                        <tr>
                            <td class="title">Definisi Operasional</td>
                            <td id="iku_do"></td>
                        </tr>
                        <tr>
                            <td class="title">Penanggungjawab</td>
                            <td id="penanggungjawab"></td>
                        </tr>
                        <tr>
                            <td class="title">Sumber Data</td>
                            <td id="iku_sumberdata"></td>
                        </tr>
                    </tbody>
                </table>
            </section>

            {{-- Target, Realisasi dan Pencapaian Tri Wulan Kinerja --}}
            <section class="bg-white rounded-3 p-3 mb-2">
                <p class="title fw-bold">Target, Realisasi dan Pencapaian Tri Wulan Kinerja</p>
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr class="text-center">
                                <th class="text-start" style="width:25%">Komponen</th>
                                <th>Tri Wulan 1</th>
                                <th>Tri Wulan 2</th>
                                <th>Tri Wulan 3</th>
                                <th>Tri Wulan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="fw-bold text-start">Target</td>
                                <td contenteditable=true class="cet" id="kt_tw1"></td>
                                <td contenteditable=true class="cet" id="kt_tw2"></td>
                                <td contenteditable=true class="cet" id="kt_tw3"></td>
                                <td contenteditable=true class="cet" id="kt_tw4"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="fw-bold text-start">Realisasi</td>
                                <td contenteditable=true class="cet" id="kr_tw1"></td>
                                <td contenteditable=true class="cet" id="kr_tw2"></td>
                                <td contenteditable=true class="cet" id="kr_tw3"></td>
                                <td contenteditable=true class="cet" id="kr_tw4"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="fw-bold text-start">Capaian</td>
                                <td contenteditable=true class="cet" id="kc_tw1"></td>
                                <td contenteditable=true class="cet" id="kc_tw2"></td>
                                <td contenteditable=true class="cet" id="kc_tw3"></td>
                                <td contenteditable=true class="cet" id="kc_tw4"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- Target, Realisasi dan Pencapaian Tri Wulan Keuangan --}}
            <section class="bg-white rounded-3 p-3 mb-2">
                <p class="title fw-bold">Target, Realisasi dan Pencapaian Tri Wulan Keuangan</p>
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr class="text-center">
                                <th class="text-start" style="width:25%">Komponen</th>
                                <th>Tri Wulan 1</th>
                                <th>Tri Wulan 2</th>
                                <th>Tri Wulan 3</th>
                                <th>Tri Wulan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold text-start">Target</td>
                                <td class="text-end cet" contenteditable=true id="at_tw1"></td>
                                <td class="text-end cet" contenteditable=true id="at_tw2"></td>
                                <td class="text-end cet" contenteditable=true id="at_tw3"></td>
                                <td class="text-end cet" contenteditable=true id="at_tw4"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start">Realisasi</td>
                                <td class="text-end cet" contenteditable=true id="ar_tw1"></td>
                                <td class="text-end cet" contenteditable=true id="ar_tw2"></td>
                                <td class="text-end cet" contenteditable=true id="ar_tw3"></td>
                                <td class="text-end cet" contenteditable=true id="ar_tw4"></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-start">Capaian</td>
                                <td class="text-end cet" contenteditable=true id="ac_tw1"></td>
                                <td class="text-end cet" contenteditable=true id="ac_tw2"></td>
                                <td class="text-end cet" contenteditable=true id="ac_tw3"></td>
                                <td class="text-end cet" contenteditable=true id="ac_tw4"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            {{-- Analisa, Masalah, Solusi --}}
            <section class="bg-white rounded-3 p-3 mb-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>Analisa</th>
                                <th>Masalah</th>
                                <th>Solusi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="analisa" style="height:80px"></td>
                                <td id="masalah"></td>
                                <td id="solusi"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scriptes')

{{-- <script>
    // const topic = "{{ $topic }}";
    // $(function(){
    //     fetch(apiurl + "/view/{{ $master_ik }}")
    //         .then(response => response.json())
    //         .then(data => {
    //             $("#nama").text(data.des.deskripsi_2);
    //             $("#indikator").text(data.ind.indikator);
    //             $("#iku_alasan").text(data.ind.iku_alasan);
    //             $("#iku_formulasi").text(data.ind.iku_formulasi);
    //             $("#iku_tipehitung").text(data.ind.iku_tipehitung);
    //             $("#iku_do").text(data.ind.iku_do);
    //             $("#iku_sumberdata").text(data.ind.iku_sumberdata);

    //             // Target, Realisasi dan Pencapaian Tri Wulan Kinerja
    //             const kt = [data.ind.t1, data.ind.t2, data.ind.t3, data.ind.t4];
    //             const kr = [data.ind.ct1_tw1, data.ind.ct1_tw2, data.ind.ct1_tw3, data.ind.ct1_tw4];
    //             for (let i = 1; i <= 4; i++) {
    //                 $("#kt_tw" + i).text(kt[i - 1]);
    //                 $("#kr_tw" + i).text(kr[i - 1]);
    //                 $("#kc_tw" + i).text(realisasiRealisasi(kr[i - 1], kt[i - 1]));
    //             }
    //         });

    //     if(topic == 'Sub Kegiatan'){
    //         getBudget("{{ $master_ik }}");
    //     }
    // });

    // function getBudget(master_ik){
    //     fetch(apiurl + "/budget/" + master_ik)
    //         .then(response => response.json())
    //         .then(data => {
    //             const rupiah = (v) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(v);
    //             const at = [data.t1, data.t2, data.t3, data.t4];
    //             const ar = [data.ct1_tw1, data.ct1_tw2, data.ct1_tw3, data.ct1_tw4];
    //             for (let i = 1; i <= 4; i++) {
    //                 $("#at_tw" + i).text(rupiah(at[i - 1]));
    //                 $("#ar_tw" + i).text(rupiah(ar[i - 1]));
    //                 $("#ac_tw" + i).text(realisasiRealisasi(ar[i - 1], at[i - 1]));
    //             }
    //         });
    // }

    // function realisasiRealisasi(realisasi, target){
    //     if (target > 0) {
    //         return (realisasi / target * 100).toFixed(2) + "%";
    //     }
    //     return "-";
    // }
    // 
</script> --}}

@endsection