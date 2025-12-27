@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <h1>Detail Renstra</h1>
        <p class='fw-bold'>{{ $master_id }}</p>
    </div>
</div>
{{-- Detail Sasaran --}}
<div class="row">
    <div class="col">
        <div class="detail-desc">
            <p class="fw-bold">Sasaran</p>
            <p id="ss_desc1"></p>
            <p id="ss_desc2"></p>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-indikator">
                <thead class='text-center'>
                    <tr>
                        <th rowspan="2">Indikator</th>
                        <th rowspan="2">Satuan</th>
                        <th colspan="5">Target</th>
                    </tr>
                    <tr>
                        <th>Tahun 1</th>
                        <th>Tahun 2</th>
                        <th>Tahun 3</th>
                        <th>Tahun 4</th>
                        <th>Tahun 5</th>
                    </tr>
                </thead>
                <tbody id="ss_indikator"></tbody>
            </table>
        </div>
    </div>
</div>
{{-- Detail Program --}}
<div class="row">
    <div class="col">
        <div class="detail-desc">
            <p class="fw-bold">Program</p>
            <p id="pg_desc1"></p>
            <p id="pg_desc2"></p>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-indikator">
                <thead class='text-center'>
                    <tr>
                        <th rowspan="2">Indikator</th>
                        <th rowspan="2">Satuan</th>
                        <th colspan="5">Target</th>
                    </tr>
                    <tr>
                        <th>Tahun 1</th>
                        <th>Tahun 2</th>
                        <th>Tahun 3</th>
                        <th>Tahun 4</th>
                        <th>Tahun 5</th>
                    </tr>
                </thead>
                <tbody id="pg_indikator"></tbody>
            </table>
        </div>
    </div>
</div>
{{-- Detail Kegiatan --}}
<div class="row">
    <div class="col">
        <div class="detail-desc">
            <p class="fw-bold">Kegiatan</p>
            <p id="kg_desc1"></p>
            <p id="kg_desc2"></p>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-indikator">
                <thead class='text-center'>
                    <tr>
                        <th rowspan="2">Indikator</th>
                        <th rowspan="2">Satuan</th>
                        <th colspan="5">Target</th>
                    </tr>
                    <tr>
                        <th>Tahun 1</th>
                        <th>Tahun 2</th>
                        <th>Tahun 3</th>
                        <th>Tahun 4</th>
                        <th>Tahun 5</th>
                    </tr>
                </thead>
                <tbody id="kg_indikator"></tbody>
            </table>
        </div>
    </div>
</div>
{{-- Detail SubKegiatan --}}
<div class="row">
    <div class="col">
        <div class="detail-desc">
            <p class="fw-bold">Sub Kegiatan</p>
            <p id="sk_desc1"></p>
            <p id="sk_desc2"></p>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-indikator">
                <thead class='text-center'>
                    <tr>
                        <th rowspan="2">Indikator</th>
                        <th rowspan="2">Satuan</th>
                        <th colspan="5">Target</th>
                    </tr>
                    <tr>
                        <th>Tahun 1</th>
                        <th>Tahun 2</th>
                        <th>Tahun 3</th>
                        <th>Tahun 4</th>
                        <th>Tahun 5</th>
                    </tr>
                </thead>
                <tbody id="sk_indikator"></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scriptes')
<script>
    const detail_id = "{{ $master_id }}";
</script>
<script src="{{ asset('js/ccd_detail.js') }}"></script>
@endsection