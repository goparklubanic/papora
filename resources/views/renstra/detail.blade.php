@php
    $baseyr = 2025;
    $currentyr = date('Y');
@endphp
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col col-title">
        <h2>Detail Renstra</h2>
        <p class='fw-bold'>{{ $master_id }} <a href="javascript:void(0)" id="edit-panel" class="text-warning fw-normal text-decoration-none">Edit</a></p>
    </div>
</div>
{{-- Detail Tujuan --}}
<div class="row">
    <div class="col">
        <div class="detail-desc">
            <p class="fw-bold">Tujuan</p>
            <p id="tj_desc1"></p>
            <p id="tj_desc2"></p>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-indikator">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2">Indikator</th>
                        <th rowspan="2">Satuan</th>
                        <th colspan="3">Target</th>
                        <th rowspan="2">Kontrol</th>
                    </tr>
                    <tr>
                        <th>Baseline</th>
                        @php
                            $i=1;
                        @endphp
                        @while ($i<=5)
                            <th>{{ $baseyr+$i }}</th>
                            @php
                                $labelyr = $baseyr+$i;
                                if( $labelyr > $currentyr && $labelyr < 2030){
                                    break;
                                } 
                                $i++;
                            @endphp
                        @endwhile
                    </tr>
                </thead>
                <tbody id="tj_indikator"></tbody>
            </table>
        </div>
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
                        <th colspan="3">Target</th>
                        <th rowspan="2">Kontrol</th>
                    </tr>
                    <tr>
                        <th>Baseline</th>
                        @php
                            $i=1;
                        @endphp
                        @while ($i<=5)
                            <th>{{ $baseyr+$i }}</th>
                            @php
                                $labelyr = $baseyr+$i;
                                if( $labelyr > $currentyr && $labelyr < 2030){
                                    break;
                                } 
                                $i++;
                            @endphp
                        @endwhile
                    </tr>
                </thead>
                <tbody id="ss_indikator"></tbody>
            </table>
            <div class="edit-bar ss-edit d-flex justify-content-between d-none">
                <a href="#" class="btn btn-sm btn-dark">Edit Deskripsi</a>
                <a href="#" class="btn btn-sm btn-dark">Edit Indikator</a>
            </div>
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
                        <th colspan="3">Target</th>
                        <th rowspan="2">Kontrol</th>
                    </tr>
                    <tr>
                        <th>Baseline</th>
                        @php
                            $i=1;
                        @endphp
                        @while ($i<=5)
                            <th>{{ $baseyr+$i }}</th>
                            @php
                                $labelyr = $baseyr+$i;
                                if( $labelyr > $currentyr && $labelyr < 2030){
                                    break;
                                } 
                                $i++;
                            @endphp
                        @endwhile
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
                        <th colspan="3">Target</th>
                        <th rowspan="2">Kontrol</th>
                    </tr>
                    <tr>
                        <th>Baseline</th>
                        @php
                            $i=1;
                        @endphp
                        @while ($i<=5)
                            <th>{{ $baseyr+$i }}</th>
                            @php
                                $labelyr = $baseyr+$i;
                                if( $labelyr > $currentyr && $labelyr < 2030){
                                    break;
                                } 
                                $i++;
                            @endphp
                        @endwhile
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
                        <th colspan="3">Target</th>
                        <th rowspan="2">Kontrol</th>
                    </tr>
                    <tr>
                        <th>Baseline</th>
                        @php
                            $i=1;
                        @endphp
                        @while ($i<=5)
                            <th>{{ $baseyr+$i }}</th>
                            @php
                                $labelyr = $baseyr+$i;
                                if( $labelyr > $currentyr && $labelyr < 2030){
                                    break;
                                } 
                                $i++;
                            @endphp
                        @endwhile
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
    const crrntyear = {{ $currentyr }};
    const maximyear = 2030;
</script>
<script src="{{ asset('js/ccd_detail.js') }}"></script>
@endsection