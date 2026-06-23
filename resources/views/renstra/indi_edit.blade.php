@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col col-title">
        <h2>Update Indikator</h2>
        <p class='fw-bold'>{{ $master_ik }}</p>
    </div>
</div>
    {{-- dismissible flash message --}}
    <div id="alert-phi" class="alert alert-success alert-dismissible fade d-none" role="alert">
        <p id="alert-message"></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @php
        $mik = explode("-",$master_ik);
        if($mik[4]!="00"){
            $ro="";
            $bg="";
        }else{
            $ro="readonly";
            $bg="bg-secondary";
        }
    @endphp
     <div class="row">
        <div class="col-sm-6 mx-auto">
            <form action="#" method="post" id="form-indi">
                @csrf
                @method('POST')
                <div class="form-group mb-2">
                    <label for="master_ik">Master IK</label>
                    <input type="text" name="master_ik" id="master_ik" class="form-control" value="{{ $master_ik }}" readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="indikator">Indikator</label>
                    <textarea name="indikator" id="indikator" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan" id="satuan" class="form-control">
                </div>
                
                {{-- inline block --}}
                {{-- <div class="row">
                    <div class="col form-group mb2">
                        <p class="fw-bold">Target</p>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="baseline">Baseline</label>
                        <input type="number" name="baseline" id="baseline" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t1">2026</label>
                        <input type="number" name="t1" id="t1" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t2">2027</label>
                        <input type="number" name="t2" id="t2" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t3">2028</label>
                        <input type="number" name="t3" id="t3" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t4">2029</label>
                        <input type="number" name="t4" id="t4" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t5">2030</label>
                        <input type="number" name="t5" id="t5" class="form-control">
                    </div>
                </div> --}}
                {{-- <div class="form-group mb-2">
                    <label for="cbaseline">Capaian Baseline</label>
                    <input type="number" name="cbaseline" id="cbaseline" class="form-control {{ $bg }}" disabled>
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-bordered bg-trans">
                        <tbody>
                            <tr>
                                <td class="tbi-first-col">Baseline</td>
                                <td><input type="number" name="baseline" id="baseline" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered bg-trans">
                        <thead>                            
                            <tr>
                                <th class="tbi-first-col">HASIL</th>
                                <th>2026</th>
                                <th>2027</th>
                                <th>2028</th>
                                <th>2029</th>
                                <th>2030</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Target</td>                                
                                <td><input type="number" name="t1" id="t1" class="form-control"></td>
                                <td><input type="number" name="t2" id="t2" class="form-control"></td>
                                <td><input type="number" name="t3" id="t3" class="form-control"></td>
                                <td><input type="number" name="t4" id="t4" class="form-control"></td>
                                <td><input type="number" name="t5" id="t5" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>TW1</td>
                                <td><input type="number" name="ct1_tw1" id="ct1_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct2_tw1" id="ct2_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct3_tw1" id="ct3_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct4_tw1" id="ct4_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct5_tw1" id="ct5_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                            <tr>
                                <td>TW2</td>
                                <td><input type="number" name="ct1_tw2" id="ct1_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct2_tw2" id="ct2_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct3_tw2" id="ct3_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct4_tw2" id="ct4_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct5_tw2" id="ct5_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                            <tr>
                                <td>TW3</td>
                                <td><input type="number" name="ct1_tw3" id="ct1_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct2_tw3" id="ct2_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct3_tw3" id="ct3_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct4_tw3" id="ct4_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct5_tw3" id="ct5_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                            <tr>
                                <td>TW4</td>
                                <td><input type="number" name="ct1_tw4" id="ct1_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct2_tw4" id="ct2_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct3_tw4" id="ct3_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct4_tw4" id="ct4_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="ct5_tw4" id="ct5_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- <div class="row">
                    <div class="col form-group mb2 tbr-first-col">
                        <p class="fw-bold">Target</p>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t1">2026</label>
                        <input type="number" name="vat1" id="vat1" class="form-control {{ $bg }}" {{ $ro }}>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t2">2027</label>
                        <input type="number" name="vat2" id="vat2" class="form-control {{ $bg }}" {{ $ro }}>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t3">2028</label>
                        <input type="number" name="vat3" id="vat3" class="form-control {{ $bg }}" {{ $ro }}>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t4">2029</label>
                        <input type="number" name="vat4" id="vat4" class="form-control {{ $bg }}" {{ $ro }}>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t5">2030</label>
                        <input type="number" name="vat5" id="vat5" class="form-control {{ $bg }}" {{ $ro }}>
                    </div>
                </div> --}}
                
                <div class="table-responsive">
                    <table class="table table-bordered bg-trans">
                        <thead>
                            <tr>
                                <th class="tbi-first-col">Anggaran</th>
                                <th>2026</th>
                                <th>2027</th>
                                <th>2028</th>
                                <th>2029</th>
                                <th>2030</th>
                            </tr>
                            <tr>
                                <th class="tbi-first-col">Target</th>
                                <th><input type="number" name="vat1" id="vat1" class="form-control {{ $bg }}" {{ $ro }}></th>
                                <th><input type="number" name="vat2" id="vat2" class="form-control {{ $bg }}" {{ $ro }}></th>
                                <th><input type="number" name="vat3" id="vat3" class="form-control {{ $bg }}" {{ $ro }}></th>
                                <th><input type="number" name="vat4" id="vat4" class="form-control {{ $bg }}" {{ $ro }}></th>
                                <th><input type="number" name="vat5" id="vat5" class="form-control {{ $bg }}" {{ $ro }}></th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Capaian</th>
                                <th>2026</th>
                                <th>2027</th>
                                <th>2028</th>
                                <th>2029</th>
                                <th>2030</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>TW1</td>
                                <td><input type="number" name="cat1_tw1" id="cat1_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat2_tw1" id="cat2_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat3_tw1" id="cat3_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat4_tw1" id="cat4_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat5_tw1" id="cat5_tw1" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                            <tr>
                                <td>TW2</td>
                                <td><input type="number" name="cat1_tw2" id="cat1_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat2_tw2" id="cat2_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat3_tw2" id="cat3_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat4_tw2" id="cat4_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat5_tw2" id="cat5_tw2" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                            <tr>
                                <td>TW3</td>
                                <td><input type="number" name="cat1_tw3" id="cat1_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat2_tw3" id="cat2_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat3_tw3" id="cat3_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat4_tw3" id="cat4_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat5_tw3" id="cat5_tw3" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                            <tr>
                                <td>TW4</td>
                                <td><input type="number" name="cat1_tw4" id="cat1_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat2_tw4" id="cat2_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat3_tw4" id="cat3_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat4_tw4" id="cat4_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                                <td><input type="number" name="cat5_tw4" id="cat5_tw4" class="form-control {{ $bg }}" {{ $ro }}></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
{{-- 
                <div class="form-group mb-2">
                    <label for="iku_alasan">IKU Alasan</label>
                    <textarea name="iku_alasan" id="iku_alasan" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="iku_formulasi">IKU Formulasi</label>
                    <textarea name="iku_formulasi" id="iku_formulasi" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="iku_tipehitung">IKU Tipe Hitung</label>
                    <input type="text" name="iku_tipehitung" id="iku_tipehitung" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="iku_do">IKU DO</label>
                    <textarea name="iku_do" id="iku_do" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="iku_sumberdata">IKU Sumber Data</label>
                    <textarea name="iku_sumberdata" id="iku_sumberdata" class="form-control" rows="3"></textarea>
                </div>
 --}}
                <div class="form-group mt-3 mb-5 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scriptes')
<script>
$(function () {
    fetch(apiurl + "/get/indikaget/{{ $master_ik }}")
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);
            $("#indikator").val(data.indikator.indikator);
            $("#satuan").val(data.indikator.satuan);
            $("#baseline").val(data.indikator.baseline);
            $("#t1").val(data.indikator.t1);
            $("#t2").val(data.indikator.t2);
            $("#t3").val(data.indikator.t3);
            $("#t4").val(data.indikator.t4);
            $("#t5").val(data.indikator.t5);
            $("#ct1_tw1").val(data.indikator.ct1_tw1);
            $("#ct2_tw1").val(data.indikator.ct2_tw1);
            $("#ct3_tw1").val(data.indikator.ct3_tw1);
            $("#ct4_tw1").val(data.indikator.ct4_tw1);
            $("#ct5_tw1").val(data.indikator.ct5_tw1);
            $("#ct1_tw2").val(data.indikator.ct1_tw2);
            $("#ct2_tw2").val(data.indikator.ct2_tw2);
            $("#ct3_tw2").val(data.indikator.ct3_tw2);
            $("#ct4_tw2").val(data.indikator.ct4_tw2);
            $("#ct5_tw2").val(data.indikator.ct5_tw2);
            $("#ct1_tw3").val(data.indikator.ct1_tw3);
            $("#ct2_tw3").val(data.indikator.ct2_tw3);
            $("#ct3_tw3").val(data.indikator.ct3_tw3);
            $("#ct4_tw3").val(data.indikator.ct4_tw3);
            $("#ct5_tw3").val(data.indikator.ct5_tw3);
            $("#ct1_tw4").val(data.indikator.ct1_tw4);
            $("#ct2_tw4").val(data.indikator.ct2_tw4);
            $("#ct3_tw4").val(data.indikator.ct3_tw4);
            $("#ct4_tw4").val(data.indikator.ct4_tw4);
            $("#ct5_tw4").val(data.indikator.ct5_tw4);
            $("#vat1").val(data.budget.t1);
            $("#vat2").val(data.budget.t2);
            $("#vat3").val(data.budget.t3);
            $("#vat4").val(data.budget.t4);
            $("#vat5").val(data.budget.t5);
            $("#cat1_tw1").val(data.budget.cat1_tw1);
            $("#cat2_tw1").val(data.budget.cat2_tw1);
            $("#cat3_tw1").val(data.budget.cat3_tw1);
            $("#cat4_tw1").val(data.budget.cat4_tw1);
            $("#cat5_tw1").val(data.budget.cat5_tw1);
            $("#cat1_tw2").val(data.budget.cat1_tw2);
            $("#cat2_tw2").val(data.budget.cat2_tw2);
            $("#cat3_tw2").val(data.budget.cat3_tw2);
            $("#cat4_tw2").val(data.budget.cat4_tw2);
            $("#cat5_tw2").val(data.budget.cat5_tw2);
            $("#cat1_tw3").val(data.budget.cat1_tw3);
            $("#cat2_tw3").val(data.budget.cat2_tw3);
            $("#cat3_tw3").val(data.budget.cat3_tw3);
            $("#cat4_tw3").val(data.budget.cat4_tw3);
            $("#cat5_tw3").val(data.budget.cat5_tw3);
            $("#cat1_tw4").val(data.budget.cat1_tw4);
            $("#cat2_tw4").val(data.budget.cat2_tw4);
            $("#cat3_tw4").val(data.budget.cat3_tw4);
            $("#cat4_tw4").val(data.budget.cat4_tw4);
            $("#cat5_tw4").val(data.budget.cat5_tw4);
            $("#cat1_tw5").val(data.budget.cat1_tw5);
            $("#cat2_tw5").val(data.budget.cat2_tw5);
            $("#cat3_tw5").val(data.budget.cat3_tw5);
            $("#cat4_tw5").val(data.budget.cat4_tw5);
            $("#cat5_tw5").val(data.budget.cat5_tw5);
        });
});
</script>
<script src="{{ asset('js/updater.js') }}"></script>
@endsection