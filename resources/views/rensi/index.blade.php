@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col px-5">
        <table id="hierarchyTable" class="table table-bordered table-striped">
            <thead class="align-middle">
                <tr>
                    <th rowspan="2">TUJUAN / SASARAN STRATEGIS / PROGRAM / KEGIATAN / SUB KEGIATAN</th>
                    <th rowspan="2">SATUAN</th>
                    <th rowspan="2">TARGET</th>
                    <th rowspan="2">ANGGARAN</th>
                    <th colspan="4" class="text-center">TARGET PER TRI WULAN</th>
                    <th rowspan="2">PENANGGUNG JAWAB</th>
                </tr>
                <tr>
                    <th>I</th>
                    <th>II</th>
                    <th>III</th>
                    <th>IV</th>
                </tr>
            </thead>
            <tbody id="hierarchyBody">
                <tr><td colspan="9">Loading...</td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scriptes')
<script>
    $(document).ready(function () {
    loadHierarchy();
});

function loadHierarchy() {
    var $tbody = $('#hierarchyBody');

    $.ajax({
        url: apiurl + '/rensi',
        method: 'GET',
        dataType: 'json'
    })
    .done(function (json) {
        if (!json.success) {
            $tbody.html('<tr><td colspan="9">Failed to load data</td></tr>');
            return;
        }

        $tbody.empty();
        renderRows(json.data, $tbody);
    })
    .fail(function (jqXHR, textStatus) {
        console.error('Error loading hierarchy:', textStatus);
        $tbody.html('<tr><td colspan="9">Error loading data</td></tr>');
    });
}

// Recursively render each node (and its children) as table rows
function renderRows(nodes, $tbody) {
    $.each(nodes, function (i, node) {

        // Row 1: kategori — first column filled, rest blank
        $tbody.append(
            '<tr class="row-kategori">' +
                '<td><strong>' + (node.ketegori || '') + '</strong></td>' +
                '<td></td><td></td><td></td>' +
                '<td></td><td></td><td></td><td></td>' +
                '<td></td>' +
            '</tr>'
        );

        // Row 2: deskripsi — first column filled, rest blank
        $tbody.append(
            '<tr class="row-deskripsi">' +
                '<td>' + (node.deskripsi || '') + '</td>' +
                '<td></td><td></td><td></td>' +
                '<td></td><td></td><td></td><td></td>' +
                '<td></td>' +
            '</tr>'
        );

        // Row 3..n: one row per indicator
        if (node.indicators && node.indicators.length) {
            $.each(node.indicators, function (j, ind) {
                let duite = ind.budget.anggaran !== undefined ? toIdr(ind.budget.anggaran) : '';
                console.log('duite:',duite);
                $tbody.append(
                    '<tr class="row-indikator">' +
                        '<td>' + (ind.indikator || '') + '</td>' +
                        '<td>' + (ind.satuan || '') + '</td>' +
                        '<td class="text-end">' + (ind.tgt !== undefined ? parseFloat(ind.tgt).toLocaleString('id-ID') : '') + '</td>' +
                        '<td class="text-end">' + ( duite )+ '</td>' + // ANGGARAN - not provided by indicator data
                        '<td class="text-end">' + (ind.ttw1 !== undefined ? ind.ttw1 : '') + '</td>' +
                        '<td class="text-end">' + (ind.ttw2 !== undefined ? ind.ttw2 : '') + '</td>' +
                        '<td class="text-end">' + (ind.ttw3 !== undefined ? ind.ttw3 : '') + '</td>' +
                        '<td class="text-end">' + (ind.ttw4 !== undefined ? ind.ttw4 : '') + '</td>' +
                        '<td class="text-end">' + (ind.iku_penjab || '') + '</td>' +
                    '</tr>'
                );
            });
        }

        // Recurse into children if the hierarchy is nested (e.g. Tujuan -> Sasaran -> Program -> Kegiatan -> Sub Kegiatan)
        if (node.children && node.children.length) {
            renderRows(node.children, $tbody);
        }
    });
}

function toIdr(str){
    let formatted = Number(str).toLocaleString('id-ID', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    return formatted;
}
</script>
@endsection