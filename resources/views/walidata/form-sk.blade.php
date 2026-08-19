@extends('layouts.wd-app');
@section('content')
    {{-- Kegiatan Finder --}}
    <section class="bg-white rounded-3 p-3 mb-2" id="paramfinder">
        <h5>Tentukan Nama Kegiatan</h5>
        <input type="text" class="form-control border border-1 border-secondary" id="paramaksi" placeholder="Tulis kata pertama nama kegiatan, lalu tekan enter">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th width='125'>ID Kegiatan</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody id="aksidata" class="fsz-6"></tbody>
        </table>
    </section>

    <div class="section bg-white rounded-3 p-3 mb-2">
        <form action="#" method="post" id="skform">
            {{-- Imput CCD_Descs --}}
            <h5>Deskripsi Sub Kegiatan</h5>
            <table class="table table-sm mb-2">
                <thead>
                    <tr>
                        <th>Id Sub Kegiatan</th>
                        <th>TJ</th>
                        <th>SS</th>
                        <th>PG</th>
                        <th>KG</th>
                        <th>SK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" @readonly(true) id="master_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="tj_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="ss_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="pg_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="kg_id"></td>
                        <td><input type="text" class="form-control" @readonly(true) id="sk_id"></td>
                    </tr>
                    <tr>
                        <td colspan="6">Deskripsi</td>
                    </tr>
                    <tr>
                        <td colspan="6"><textarea id="deskripsi_1" rows="3" class="form-control"></textarea></td>
                    </tr>
                </tbody>
            </table>
            {{-- INPUT CCD_INDICATORS --}}
            <h5>INDIKATOR</h5>
            <table class="table table-sm mb-2">
                <tbody>
                    <tr>
                        <td colspan="5">Indikator</td>
                    </tr>
                    <tr>
                        <td colspan="5"><textarea id="indikator" rows="3" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" class="form-control" id="satuan">
                                </div>
                                <div class="col-sm-6">
                                    <label for="satuan">Baseline</label>
                                    <input type="number" id="baseline" class="form-control" min="0" value="0">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="iku_tipehitung">Tipe Perhitungan</label>
                                    <input type="text" id="iku_tipehitung" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label for="iku_sumberdata">Sumber Data</label>
                                    <input type="text" id="iku_sumberdata" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label for="iku_penjab">Penanggung Jawab</label>
                                    <input type="text" id="iku_penjab" class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="iku_alasan">Alasan Pemilihan Indikator</label>
                                    <textarea id="iku_alasan" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="col-sm-4">
                                    <label for="iku_do">Definisi Operasional</label>
                                    <textarea id="iku_do" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="col-sm-4">
                                    <label for="iku_formulasi">Formulasi</label>
                                    <textarea id="iku_formulasi" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class='text-start'>Target Kinerja Per Tahun</td>
                    </tr>
                    <tr>
                        <td class="text-center">2026</td>
                        <td class="text-center">2027</td>
                        <td class="text-center">2028</td>
                        <td class="text-center">2029</td>
                        <td class="text-center">2030</td>
                    </tr>
                    <tr>
                        <td><input type="number" step="0.01" id="kt1" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt2" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt3" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt4" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" step="0.01" id="kt5" class="form-control text-end" min="0" value="0"></td>
                    </tr>
                </tbody>
            </table>
            {{-- INPUT CCD_INDICATORS --}}
            <h5>ANGGARAN</h5>
            <table class="table mb-2">
                <tbody>
                    <tr>
                        <td colspan="5" class='text-start'>Target Keuangan Per Tahun</td>
                    </tr>
                    <tr>
                        <td class="text-center">2026</td>
                        <td class="text-center">2027</td>
                        <td class="text-center">2028</td>
                        <td class="text-center">2029</td>
                        <td class="text-center">2030</td>
                    </tr>
                    <tr>
                        <td><input type="number" id="at1" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at2" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at3" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at4" class="form-control text-end" min="0" value="0"></td>
                        <td><input type="number" id="at5" class="form-control text-end" min="0" value="0"></td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-around align-middle">
                <input type="reset" value="Reset" class="btn btn-success w100px">
                <input type="submit" value="Simpan" class="btn btn-primary w100px">
            </div>
        </form>
        <style>
            input, textarea{
                border: 1px solid gray!important;
            }
            .w100px{
                width: 100px;
            }
            
        </style>
    </div>
@endsection

@section('scriptes')
    <script>
        let kegs=[];
        $(function(){
            fetch(apiurl + "/desc/list-kegiatan")
            .then(response=>response.json())
            .then(data=>{
                let kegiatan = data.data;
                kegiatan.forEach((aksi,idx)=>{
                    let item = {'master_id':aksi.master_id,'deskripsi':aksi.deskripsi_1}; 
                    kegs.push(item);
                })
            });
            // console.log(kegs);

            // filter kegiatan
            $("#paramaksi").keypress(function(ev){
                if(ev.which === 13){
                    ev.preventDefault();
                    let aksi=kegs.filter(item => item.deskripsi.startsWith($(this).val()));
                    $("#aksidata").empty();
                    aksi.forEach(item=>{
                        $("#aksidata").append(`
                        <tr>
                            <td><span class='master_id text-primary hand-cursor'>${item.master_id}</span></td>
                            <td>${item.deskripsi}</td>
                        </tr>
                        `);
                    })
                }
            })
        })

        var skmax="";
        async function getSkmax(master_id) {
            try {
                const response = await fetch(apiurl + "/desc/skmax/" + master_id);
                const data = await response.json();
                let sk_id = data.data[0].sk_id;
                console.log("sk id:",typeof sk_id);
                let skmax = sk_id.toString().padStart(2, '0');
                // console.log(skmax);
                return skmax;
            } catch (error) {
                console.error('Error:', error);
            }
        }

        $("#aksidata").on('click','.master_id',function(){
            let mid = $(this).text();
            getSkmax(mid).then(skmaxv => {
                // Gunakan skmax di sini
                // skmax = skmaxv;
                // console.log(skmax);
                // master_id = replace 00 terakhir dengan skmax
                let master_id = mid.slice(0,-2)+skmaxv;
                let id=mid.split("-");
                $("#master_id").val(master_id);
                $("#tj_id").val(id[0]);
                $("#ss_id").val(id[1]);
                $("#pg_id").val(id[2]);
                $("#kg_id").val(id[3]);
                $("#sk_id").val(skmaxv);
            });
        })

        
        // form submit
        $("#skform").on('submit',function(ev){
            ev.preventDefault();
            const descids=["master_id","tj_id","ss_id","pg_id","kg_id","sk_id","deskripsi_1"];
            const indiids=['master_id','ik_id','indikator','satuan','baseline','kt1','kt2','kt3','kt4','kt5','iku_alasan','iku_tipehitung','iku_formulasi','iku_do','iku_penjab','iku_sumberdata'];
            const budgids=['master_id','at1','at2','at3','at4','at5'];

            // collect descdata
            let descdata = {};
            descids.forEach(item=>{
                descdata[item]=$("#"+item).val();
            })

            let indidata = {};
            indiids.forEach(item=>{
                if(item == 'kt1'){
                    indidata['t1']=$("#"+item).val();
                }else if(item == 'kt2'){
                    indidata['t2']=$("#"+item).val();
                }else if(item == 'kt3'){
                    indidata['t3']=$("#"+item).val();
                }else if(item == 'kt4'){
                    indidata['t4']=$("#"+item).val();
                }else if(item == 'kt5'){
                    indidata['t5']=$("#"+item).val();
                }else if(item == 'master_id'){
                    indidata[item]=$("#master_id").val();
                    indidata['master_ik']=$("#master_id").val()+"-01";
                }else{
                    indidata[item]=$("#"+item).val();
                }                
            })

            let budgdata = {};
            budgids.forEach(item=>{
                if(item == 'at1'){
                    budgdata['t1']=$("#"+item).val();
                }else if(item == 'at2'){
                    budgdata['t2']=$("#"+item).val();
                }else if(item == 'at3'){
                    budgdata['t3']=$("#"+item).val();
                }else if(item == 'at4'){
                    budgdata['t4']=$("#"+item).val();
                }else if(item == 'at5'){
                    budgdata['t5']=$("#"+item).val();
                }else if(item == 'master_id'){
                    budgdata['master_ik']=$("#master_id").val()+"-01";
                }else{
                    budgdata[item]=$("#"+item).val();
                }                
            })

            // console.log(descdata);
            let data = {"deskripsi":descdata,"indikator":indidata,"budget":budgdata};
            // console.log(data);
            $.ajax({
                url: apiurl + "/desc/skbaru",
                method: "POST",
                data: JSON.stringify(data),
                headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                success:function(res){
                    console.log(res.status);
                }
            })
        })

    </script>
@endsection