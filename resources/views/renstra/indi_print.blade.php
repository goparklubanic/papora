<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panjaang</title>
    <link rel="shortcut icon" href="{{ asset('imgs/logo-01.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/panjaang.css') }}">
    {{-- bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script>
        const weburl = "{{ url('/') }}";
    </script>
    <style>
        html,body{
            font-family: 'Dosis', sans-serif!important;
        }
        h2,p{
            padding:0;
            margin:0;
        }
        table > thead > tr > th,
        table > tbody > tr > td{
            font-size: 1rem;
            padding:0;
            border: 1px solid black;
        }
        table {
            margin:1px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">

        <div class="row">
        <div class="col">
            <h2>{{ $topic }}</h2>
            <p class='fw-bold'>{{ $master_ik }}</p>
        </div>
    </div>
    <div class="row mt-2 ff-dosis">
        <div class="col-sm-12">
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
                {{-- if topic == "Sub Kegiatan" --}}
                @if($topic == "Sub Kegiatan")
    
                <div>Anggaran</div>
                <table class="table table-striped table-sm mt-2">
                    <thead>
                        <tr class="text-center">
                            <th id="at1"></th>
                            <th id="at2"></th>
                            <th id="at3"></th>
                            <th id="at4"></th>
                            <th id="at5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="text-end monospace fsz-6" id="vat1"></td>
                            <td class="text-end monospace fsz-6" id="vat2"></td>
                            <td class="text-end monospace fsz-6" id="vat3"></td>
                            <td class="text-end monospace fsz-6" id="vat4"></td>
                            <td class="text-end monospace fsz-6" id="vat5"></td>
                        </tr>
                    </tbody>
                </table>
                @endif
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
    </div>
<script src="{{ asset('js/jquery.js') }}"></script>
    {{-- bootstrap js cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const apiurl = "{{ url('/api/v0') }}";
    </script>

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
            $("#iku_alasan").text(data.ind.iku_alasan);
            $("#iku_formulasi").text(data.ind.iku_formulasi);
            $("#iku_tipehitung").text(data.ind.iku_tipehitung);
            $("#iku_do").text(data.ind.iku_do);
            $("#iku_sumberdata").text(data.ind.iku_sumberdata);
        });
        if(topic == 'Sub Kegiatan'){
            getBudget("{{ $master_ik }}");
        }

        setTimeout(() => {
            window.print();
        }, 5000);
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
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td class="title" width="200">${key}</td>
                                <td>${value[0].deskripsi_2}</td>
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
    
</body>
</html>