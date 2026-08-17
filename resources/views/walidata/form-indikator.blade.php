@extends('layouts.wd-app')

@section('content')
    @php
        // Label tahun untuk t1..t5 (baseline s/d 2030), sesuai ralat: 2026-2030 berurutan
        $tYears = [
            't1' => 2026,
            't2' => 2027,
            't3' => 2028,
            't4' => 2029,
            't5' => 2030,
        ];

        // Label tahun untuk tabel target & capaian triwulanan (tt1..tt5 / ct1..ct5)
        // disamakan dengan pola t1..t5 di atas
        $twYears = [
            1 => 2026,
            2 => 2027,
            3 => 2028,
            4 => 2029,
            5 => 2030,
        ];
    @endphp
    <section class="bg-white rounded-3 p-3 mb-2" id="paramfinder">
        <h4>Tentukan indikator kinerja</h4>
        <input type="text" class="form-control border border-1 border-secondary" id="paramindi" placeholder="Tulis beberapa kalimat awal indikator, lalu tekan enter">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>ID Indikator</th>
                    <th>Indikator</th>
                </tr>
            </thead>
            <tbody id="indidata" class="fsz-6"></tbody>
        </table>
    </section>

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h3 class="mb-4">Form Input Ukur Kinerja</h3>

            <form id="formIndikator" novalidate>

                {{-- ================= IDENTITAS (READONLY) ================= --}}
                <h5 class="section-title">Identitas</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="master_ik" class="form-label">Master IK</label>
                        <input type="text" class="form-control" id="master_ik" name="master_ik" value="{{ $data['master_ik'] ?? '' }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="master_id" class="form-label">Master ID</label>
                        <input type="text" class="form-control" id="master_id" name="master_id" value="{{ $data['master_id'] ?? '' }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="ik_id" class="form-label">IK ID</label>
                        <input type="text" class="form-control" id="ik_id" name="ik_id" value="{{ $data['ik_id'] ?? '' }}" readonly maxlength="2">
                    </div>
                </div>

                {{-- ================= INDIKATOR & SATUAN ================= --}}
                <h5 class="section-title">Indikator</h5>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="indikator" class="form-label">Indikator</label>
                        <textarea class="form-control" id="indikator" name="indikator" rows="3">{{ $data['indikator'] ?? '' }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="satuan" class="form-label">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" list="satuanList" value="{{ $data['satuan'] ?? '' }}" autocomplete="off">
                        <datalist id="satuanList">
                            {{-- Sumber datalist diabaikan sesuai instruksi --}}
                        </datalist>
                    </div>
                </div>

                {{-- ================= BASELINE & TARGET TAHUNAN ================= --}}
                <h5 class="section-title">Baseline &amp; Target Tahunan</h5>
                <div class="row g-3">
                    <div class="col">
                        <label for="baseline" class="form-label">Baseline</label>
                        <input type="text" class="form-control" id="baseline" name="baseline" value="{{ $data['baseline'] ?? '' }}">
                    </div>
                    @foreach ($tYears as $field => $year)
                        <div class="col">
                            <label for="{{ $field }}" class="form-label">{{ $year }}</label>
                            <input type="number" step="0.01" class="form-control" id="{{ $field }}" name="{{ $field }}" value="{{ $data[$field] ?? '' }}">
                        </div>
                    @endforeach
                </div>

                {{-- ================= IKU: ALASAN & FORMULASI ================= --}}
                <h5 class="section-title">Detail IKU</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="iku_alasan" class="form-label">Alasan</label>
                        <textarea class="form-control" id="iku_alasan" name="iku_alasan" rows="3">{{ $data['iku_alasan'] ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="iku_formulasi" class="form-label">Formulasi</label>
                        <textarea class="form-control" id="iku_formulasi" name="iku_formulasi" rows="3">{{ $data['iku_formulasi'] ?? '' }}</textarea>
                    </div>
                </div>

                {{-- ================= TIPE PERHITUNGAN ================= --}}
                <div class="row g-3 mt-1">
                    <div class="col-12">
                        <label class="form-label d-block">Tipe Perhitungan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="iku_tipehitung" id="tipehitung_kumulatif" value="Kumulatif"
                                {{ (isset($data['iku_tipehitung']) && $data['iku_tipehitung'] === 'Kumulatif') ? 'checked' : '' }}>
                            <label class="form-check-label" for="tipehitung_kumulatif">Kumulatif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="iku_tipehitung" id="tipehitung_nonkumulatif" value="Non Kumulatif"
                                {{ (isset($data['iku_tipehitung']) && $data['iku_tipehitung'] === 'Non Kumulatif') ? 'checked' : '' }}>
                            <label class="form-check-label" for="tipehitung_nonkumulatif">Non Kumulatif</label>
                        </div>
                    </div>
                </div>

                {{-- ================= SUMBER DATA & PENANGGUNG JAWAB ================= --}}
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label for="iku_sumberdata" class="form-label">Sumber Data</label>
                        <input type="text" class="form-control" id="iku_sumberdata" name="iku_sumberdata" value="{{ $data['iku_sumberdata'] ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="iku_penjab" class="form-label">Penanggung Jawab</label>
                        <input type="text" class="form-control" id="iku_penjab" name="iku_penjab" value="{{ $data['iku_penjab'] ?? '' }}">
                    </div>
                </div>

                {{-- ================= TARGET KINERJA TRIWULANAN ================= --}}
                <h5 class="section-title">Target Kinerja Triwulanan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered tw-table">
                        <thead class="table-light">
                            <tr>
                                <th>Tahun</th>
                                <th>Triwulan 1</th>
                                <th>Triwulan 2</th>
                                <th>Triwulan 3</th>
                                <th>Triwulan 4</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 5; $i++)
                                @if($twYears[$i] == date('Y'))
                                <tr>
                                    {{-- <th class="table-light">Target {{ $i }}</th> --}}
                                    @php
                                        $total = 0;
                                    @endphp
                                    <td class="year-col">{{ $twYears[$i] }}</td>
                                    @for ($j = 1; $j <= 4; $j++)
                                        @php $field = "tt{$i}_tw{$j}"; @endphp
                                        <td>
                                            <input type="number" step="0.01" class="form-control form-control-sm" name="{{ $field }}" id="{{ $field }}" value="{{ $data[$field] ?? '0.00' }}">
                                            @php
                                                $total+=$data[$field] ?? '0.00';
                                            @endphp
                                        </td>
                                    @endfor
                                    <td class='text-end'>{{ $total ?? '0.00' }}</td>
                                </tr>
                                @endif
                            @endfor
                        </tbody>
                    </table>
                </div>

                {{-- ================= CAPAIAN KINERJA TRIWULANAN ================= --}}
                <h5 class="section-title">Realisasi Kinerja Triwulanan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered tw-table">
                        <thead class="table-light">
                            <tr>
                                <th>Tahun</th>
                                <th>Triwulan 1</th>
                                <th>Triwulan 2</th>
                                <th>Triwulan 3</th>
                                <th>Triwulan 4</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for ($i = 1; $i <= 5; $i++)
                                @if($twYears[$i] == date('Y'))
                                <tr>
                                    <td class="year-col">{{ $twYears[$i] }}</td>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @for ($j = 1; $j <= 4; $j++)
                                    @php $field = "ct{$i}_tw{$j}"; @endphp
                                    <td>
                                        <input type="number" step="0.01" class="form-control form-control-sm" name="{{ $field }}" id="{{ $field }}" value="{{ $data[$field] ?? '0.00' }}">
                                        @php
                                            $total += $data['field'] ?? '0.00';
                                        @endphp
                                    </td>
                                    @endfor
                                    <td class="table-light">{{ $total }}</td>
                                </tr>
                                @endif
                            @endfor
                        </tbody>
                    </table>
                </div>

                {{-- ================= ACTIONS ================= --}}
                <div id="formAlert" class="alert d-none mt-3" role="alert"></div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmit">
                        <span class="spinner-border spinner-border-sm d-none" id="btnSpinner" role="status" aria-hidden="true"></span>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .tw-table th, .tw-table td { text-align: center; vertical-align: middle; }
        .tw-table th.year-col, .tw-table td.year-col { background-color: #f1f3f5; font-weight: 600; }
        .tw-table input[type="number"] { min-width: 90px; text-align: right; }
        .section-title { border-bottom: 2px solid #dee2e6; padding-bottom: .5rem; margin-bottom: 1.25rem; margin-top: 2rem; }
    </style>
@endsection

@section('scriptes')
    <script>
        const API_URL = apiurl + '/admin/set-indikator';

        const form = document.getElementById('formIndikator');
        const alertBox = document.getElementById('formAlert');
        const btnSubmit = document.getElementById('btnSubmit');
        const btnSpinner = document.getElementById('btnSpinner');

        // Field yang bertipe angka (float) sesuai skema migrasi
        const numericFields = [
            't1', 't2', 't3', 't4', 't5',
            'tt1_tw1', 'tt1_tw2', 'tt1_tw3', 'tt1_tw4',
            'tt2_tw1', 'tt2_tw2', 'tt2_tw3', 'tt2_tw4',
            'tt3_tw1', 'tt3_tw2', 'tt3_tw3', 'tt3_tw4',
            'tt4_tw1', 'tt4_tw2', 'tt4_tw3', 'tt4_tw4',
            'tt5_tw1', 'tt5_tw2', 'tt5_tw3', 'tt5_tw4',
            'ct1_tw1', 'ct1_tw2', 'ct1_tw3', 'ct1_tw4',
            'ct2_tw1', 'ct2_tw2', 'ct2_tw3', 'ct2_tw4',
            'ct3_tw1', 'ct3_tw2', 'ct3_tw3', 'ct3_tw4',
            'ct4_tw1', 'ct4_tw2', 'ct4_tw3', 'ct4_tw4',
            'ct5_tw1', 'ct5_tw2', 'ct5_tw3', 'ct5_tw4',
        ];

        function showAlert(message, type = 'danger') {
            alertBox.className = `alert alert-${type} mt-3`;
            alertBox.textContent = message;
            alertBox.classList.remove('d-none');
        }

        function hideAlert() {
            alertBox.classList.add('d-none');
        }

        function collectFormData() {
            const formData = new FormData(form);
            const payload = {};

            for (const [key, value] of formData.entries()) {
                if (numericFields.includes(key)) {
                    payload[key] = value === '' ? null : parseFloat(value);
                } else {
                    payload[key] = value;
                }
            }

            // Pastikan field radio yang belum dipilih tetap terkirim (jika ada)
            if (!('iku_tipehitung' in payload)) {
                payload.iku_tipehitung = null;
            }

            return payload;
        }

        // $("#btnSubmit").on('mouseover', function(){
        //     const pdata = collectFormData();
        //     console.log(pdata);
        // })

        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            hideAlert();

            const payload = collectFormData();

            btnSubmit.disabled = true;
            btnSpinner.classList.remove('d-none');

            try {
                const response = await fetch(API_URL, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    },
                    body: JSON.stringify(payload),
                });

                const result = await response.json().catch(() => ({}));

                if (!response.ok) {
                    throw new Error(result.message || `Gagal menyimpan data (HTTP ${response.status})`);
                }

                showAlert('Data indikator berhasil disimpan.', 'success');
            } catch (err) {
                showAlert(err.message || 'Terjadi kesalahan saat mengirim data.', 'danger');
            } finally {
                btnSubmit.disabled = false;
                btnSpinner.classList.add('d-none');
            }
        });
    </script>

    <script>
        // query pencarian indikator
        $("#paramindi").on('keypress', function (ev) {
            if (ev.which === 13) {
                ev.preventDefault();
                const data = { data: $("#paramindi").val() };
                $.ajax({
                    url: apiurl + "/ukin/get-indi",
                    method: "POST",
                    data: JSON.stringify(data),
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (res) {
                        if (res.message === 'data ditemukan') {
                            let html = "";
                            res.data.forEach(function (item) {
                                html += "<tr><td class='ff-mono'><a href='#' class='link_ik'>" + item.master_ik + "</a></td><td>" + item.indikator + "</td></tr>";
                            });
                            $("#indidata").html(html);
                        }
                    }
                });
            }
        });

        $("#indidata").on('click','.link_ik',function(){
            $("#paramfinder").hide();
            let master_ik = $(this).text();
            fetch(apiurl+"/ukin/indidata/"+master_ik)
            .then(response=>response.json())
            .then(data=>{
                $("#master_ik").val(data[0].master_ik);
                $("#master_id").val(data[0].master_id);
                $("#ik_id").val(data[0].ik_id);
                $("#indikator").val(data[0].indikator);
                $("#satuan").val(data[0].satuan);
                $("#baseline").val(data[0].baseline);
                $("#t1").val(data[0].t1);
                $("#t2").val(data[0].t2);
                $("#t3").val(data[0].t3);
                $("#t4").val(data[0].t4);
                $("#t5").val(data[0].t5);
                $("#iku_alasan").val(data[0].iku_alasan);
                $("#iku_formulasi").val(data[0].iku_formulasi);
                $("#iku_sumberdata").val(data[0].iku_sumberdata);
                $("#iku_penjab").val(data[0].iku_penjab);
                
                // target triwulanan
                for (let t = 1; t <= 5; t++) {
                    for (let tw = 1; tw <= 4; tw++) {
                        const key = `tt${t}_tw${tw}`;
                        $(`#${key}`).val(data[0][key]);
                    }
                }

                // realisasi triwulanan
                for (let t = 1; t <= 5; t++) {
                    for (let tw = 1; tw <= 4; tw++) {
                        const key = `ct${t}_tw${tw}`;
                        $(`#${key}`).val(data[0][key]);
                    }
                }
            });
        });
    </script>
@endsection