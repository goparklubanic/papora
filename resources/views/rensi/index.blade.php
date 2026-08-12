@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col px-5">
        <table id="hierarchyTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>TUJUAN / SASARAN STRATEGIS / PROGRAM / KEGIATAN / SUB KEGIATAN</th>
                </tr>
            </thead>
            <tbody id="hierarchyBody">
                <tr><td colspan="4">Loading...</td></tr>
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
            $tbody.html('<tr><td colspan="4">Failed to load data</td></tr>');
            return;
        }

        $tbody.empty();
        renderRows(json.data, $tbody);
    })
    .fail(function (jqXHR, textStatus) {
        console.error('Error loading hierarchy:', textStatus);
        $tbody.html('<tr><td colspan="4">Error loading data</td></tr>');
    });
}

// Recursively render each node (and its children) as table rows
function renderRows(nodes, $tbody) {
    $.each(nodes, function (i, node) {
        var tdclass = node.kategori ? node.kategori.replace(/\s+/g, '-') : '';
        var $tr = $('<tr>');
        var $td = $('<td>').addClass(tdclass);

        $td.append($('<b>').text(node.kategori));
        $td.append('<br/>');
        $td.append(document.createTextNode(node.deskripsi));

        $tr.append($td);

        $tbody.append($tr);

        if (node.children && node.children.length > 0) {
            renderRows(node.children, $tbody); // recurse into children
        }
    });
}
</script>
@endsection