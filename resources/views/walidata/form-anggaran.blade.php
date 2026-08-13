@extends('layouts.wd-app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Anggaran</h3>
                </div>
                <div class="card-body">
                    <form id="formAnggaran" method="POST">
                        @csrf
                        
                        <!-- Master IK dan Indikator -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="master_ik">Master IK</label>
                                    <input type="text" class="form-control" id="master_ik" name="master_ik" value="IK-001" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="indikator">Indikator</label>
                                    <textarea class="form-control" id="indikator" name="indikator" rows="2" readonly>Persentase capaian target kinerja</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Target Tahunan -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5>Target Tahunan</h5>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="t1">2026</label>
                                    <input type="number" class="form-control" id="t1" name="t1" step="0.01" min="0" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="t2">2027</label>
                                    <input type="number" class="form-control" id="t2" name="t2" step="0.01" min="0" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="t3">2028</label>
                                    <input type="number" class="form-control" id="t3" name="t3" step="0.01" min="0" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="t4">2029</label>
                                    <input type="number" class="form-control" id="t4" name="t4" step="0.01" min="0" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="t5">2030</label>
                                    <input type="number" class="form-control" id="t5" name="t5" step="0.01" min="0" placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        <!-- Target Keuangan Triwulanan -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5>Target Keuangan Triwulanan</h5>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tableTarget">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Triwulan 1</th>
                                                <th>Triwulan 2</th>
                                                <th>Triwulan 3</th>
                                                <th>Triwulan 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $years = ['2026', '2027', '2028', '2029', '2030'];
                                                $fields = ['tt1_tw1', 'tt1_tw2', 'tt1_tw3', 'tt1_tw4',
                                                          'tt2_tw1', 'tt2_tw2', 'tt2_tw3', 'tt2_tw4',
                                                          'tt3_tw1', 'tt3_tw2', 'tt3_tw3', 'tt3_tw4',
                                                          'tt4_tw1', 'tt4_tw2', 'tt4_tw3', 'tt4_tw4',
                                                          'tt5_tw1', 'tt5_tw2', 'tt5_tw3', 'tt5_tw4'];
                                            @endphp
                                            @foreach($years as $index => $year)
                                                <tr>
                                                    <td><strong>{{ $year }}</strong></td>
                                                    @for($i = 1; $i <= 4; $i++)
                                                        @php
                                                            $fieldName = 'tt' . ($index + 1) . '_tw' . $i;
                                                        @endphp
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm" 
                                                                   name="{{ $fieldName }}" 
                                                                   id="{{ $fieldName }}"
                                                                   step="0.01" min="0" placeholder="0.00">
                                                        </td>
                                                    @endfor
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Capaian Keuangan Triwulanan -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5>Capaian Keuangan Triwulanan</h5>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tableCapaian">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Triwulan 1</th>
                                                <th>Triwulan 2</th>
                                                <th>Triwulan 3</th>
                                                <th>Triwulan 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $fieldsCap = ['ct1_tw1', 'ct1_tw2', 'ct1_tw3', 'ct1_tw4',
                                                              'ct2_tw1', 'ct2_tw2', 'ct2_tw3', 'ct2_tw4',
                                                              'ct3_tw1', 'ct3_tw2', 'ct3_tw3', 'ct3_tw4',
                                                              'ct4_tw1', 'ct4_tw2', 'ct4_tw3', 'ct4_tw4',
                                                              'ct5_tw1', 'ct5_tw2', 'ct5_tw3', 'ct5_tw4'];
                                            @endphp
                                            @foreach($years as $index => $year)
                                                <tr>
                                                    <td><strong>{{ $year }}</strong></td>
                                                    @for($i = 1; $i <= 4; $i++)
                                                        @php
                                                            $fieldName = 'ct' . ($index + 1) . '_tw' . $i;
                                                        @endphp
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm" 
                                                                   name="{{ $fieldName }}" 
                                                                   id="{{ $fieldName }}"
                                                                   step="0.01" min="0" placeholder="0.00">
                                                        </td>
                                                    @endfor
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">
                                    <i class="fas fa-save"></i> Simpan Anggaran
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    <i class="fas fa-undo"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptes')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#formAnggaran').on('submit', function(e) {
        e.preventDefault();
        
        // Disable submit button
        $('#btnSubmit').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Menyimpan...');
        
        // Collect form data
        var formData = {
            master_ik: $('#master_ik').val(),
            indikator: $('#indikator').val(),
            t1: parseFloat($('#t1').val()) || 0,
            t2: parseFloat($('#t2').val()) || 0,
            t3: parseFloat($('#t3').val()) || 0,
            t4: parseFloat($('#t4').val()) || 0,
            t5: parseFloat($('#t5').val()) || 0
        };
        
        // Collect target triwulanan data
        var targetFields = [
            'tt1_tw1', 'tt1_tw2', 'tt1_tw3', 'tt1_tw4',
            'tt2_tw1', 'tt2_tw2', 'tt2_tw3', 'tt2_tw4',
            'tt3_tw1', 'tt3_tw2', 'tt3_tw3', 'tt3_tw4',
            'tt4_tw1', 'tt4_tw2', 'tt4_tw3', 'tt4_tw4',
            'tt5_tw1', 'tt5_tw2', 'tt5_tw3', 'tt5_tw4'
        ];
        
        targetFields.forEach(function(field) {
            formData[field] = parseFloat($('#' + field).val()) || 0;
        });
        
        // Collect capaian triwulanan data
        var capaianFields = [
            'ct1_tw1', 'ct1_tw2', 'ct1_tw3', 'ct1_tw4',
            'ct2_tw1', 'ct2_tw2', 'ct2_tw3', 'ct2_tw4',
            'ct3_tw1', 'ct3_tw2', 'ct3_tw3', 'ct3_tw4',
            'ct4_tw1', 'ct4_tw2', 'ct4_tw3', 'ct4_tw4',
            'ct5_tw1', 'ct5_tw2', 'ct5_tw3', 'ct5_tw4'
        ];
        
        capaianFields.forEach(function(field) {
            formData[field] = parseFloat($('#' + field).val()) || 0;
        });
        
        // Send data to API
        $.ajax({
            url: 'http://localhost:8000/api/v0/admin/set-anggaran',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function(response) {
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data anggaran berhasil disimpan.',
                    timer: 3000
                });
                console.log('Success:', response);
            },
            error: function(xhr, status, error) {
                // Show error message
                let errorMsg = 'Terjadi kesalahan saat menyimpan data.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: errorMsg,
                    timer: 3000
                });
                console.error('Error:', error);
            },
            complete: function() {
                // Enable submit button
                $('#btnSubmit').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan Anggaran');
            }
        });
    });
    
    // Auto format number inputs
    $('input[type="number"]').on('blur', function() {
        var val = $(this).val();
        if (val && !isNaN(val)) {
            $(this).val(parseFloat(val).toFixed(2));
        }
    });
    
    // Validation: ensure values are not negative
    $('input[type="number"]').on('input', function() {
        if ($(this).val() < 0) {
            $(this).val(0);
        }
    });
});
</script>

<!-- Include SweetAlert2 for better UI notifications -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection