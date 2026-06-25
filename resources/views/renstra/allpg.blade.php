<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Sub Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body { font-family: 'Dosis', sans-serif; }
        table { font-size: .85rem; }
        table > thead > tr > th,
        table > tbody > tr > td {
            border: 1px solid black;
            padding: 4px 6px;
            vertical-align: middle;
        }
        th { text-align: center; background: #f0f0f0; }
        .monospace { font-family: 'Courier New', monospace; }
    </style>
</head>
<body>
    <div class="container-fluid py-3">
        <h2 class="mb-3">Rekap Program Tahun {{ $tahun }}</h2>
            <table class="table table-stripped table-sm">
                <thead>
                    <tr>
                        <th rowspan="2" style="width:40px">No</th>
                        <th rowspan="2" style="min-width:200px">Kegiatan</th>
                        <th rowspan="2" style="min-width:200px">Indikator Kinerja</th>
                        <th rowspan="2" style="width:80px">Target</th>
                        <th colspan="4">Realisasi</th>
                        <th rowspan="2" style="width:90px">Total Realisasi</th>
                        <th rowspan="2" style="width:80px">Capaian Kerja</th>
                        <th rowspan="2" style="min-width:150px">Permasalahan</th>
                        <th rowspan="2" style="min-width:150px">Solusi</th>
                        <th rowspan="2" style="min-width:150px">Analisis</th>
                        {{-- <th rowspan="2" style="width:90px">Target Anggaran</th>
                        <th colspan="4">Realisasi Anggaran</th>
                        <th rowspan="2" style="width:100px">Total Realisasi Anggaran</th>
                        <th rowspan="2" style="width:100px">Capaian Anggaran</th> --}}
                    </tr>
                    <tr>
                        <th>TW1</th>
                        <th>TW2</th>
                        <th>TW3</th>
                        <th>TW4</th>
                        {{-- <th>TW1</th>
                        <th>TW2</th>
                        <th>TW3</th>
                        <th>TW4</th> --}}
                    </tr>
                </thead>
                <tbody id="sk-data">
                    
                </tbody>
            </table>
    </div>
    {{-- bootstrap js --}}

    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- bootstrap js cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const apiurl = "{{ url('/api/v0') }}";
        const tahun = {{ $tahun }};
    </script>
    <script>
        let urut=1;
        $(function(){
            fetch(apiurl + "/all-pg/"+{{ $tahun }}) 
            .then(response => response.json())
            .then(data=>{
                data.data.forEach(allkg => {
                    allkg.indicators.forEach(idk=>{
                        let trk = idk.rk1 + idk.rk2 + idk.rk3 +idk.rk4;
                        let cpk = trk / idk.tk * 100;
                        // let tra = allsk.ra1 + allsk.ra2 + allsk.ra3 + allsk.ra4;
                        // let cpa = tra / allsk.ta * 100;

                        $("#sk-data").append(`
                            <tr>
                                <td>${urut++}</td>
                                <td>${allkg.deskripsi_2}</td>
                                <td>${idk.indikator}</td>
                                <td class='text-end'>${idk.tk}</td>
                                <td class='text-end'>${idk.rk1}</td>
                                <td class='text-end'>${idk.rk2}</td>
                                <td class='text-end'>${idk.rk3}</td>
                                <td class='text-end'>${idk.rk4}</td>
                                <td class='text-end'>${trk}</td>
                                <td class='text-center'>${cpk}</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                </tr>
                                `)
                    })
                            // <td>${allsk.ta}</td>
                            // <td>${allsk.ra1}</td>
                            // <td>${allsk.ra2}</td>
                            // <td>${allsk.ra3}</td>
                            // <td>${allsk.ra4}</td>
                            // <td>${tra}</td>
                            // <td>${cpa}</td>
                });
            })
        })
    </script>
</body>
</html>
