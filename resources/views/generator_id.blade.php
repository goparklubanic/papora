<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator ID</title>
    <link rel="shortcut icon" href="imgs/logo-01.png" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ asset('css/panjaang.css') }}"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        span{
            display: block;
            width: 50px;
            border: 1px solid gray;
            text-align: right;
            padding-right: 5px;
        }
        .box-main{
            width: 100%;
            margin-top: 2px;
            margin-bottom: 3px;
        }
        .box-amnt{
            text-align: right;
            border: 1px solid gray;
            padding-right: 5px;
            width: 100%;
        }

        tr#ids td{
            height: 300px;
            max-height: 420px!important;
            overflow-y: auto;
            overflow-x: hidden;
            /* display: block; */
        }
    </style>
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Generator ID</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="row">
                <div>
                    <label for="jmtj">Jumlah tujuan: </label>
                    <input type="number" name="jmtj" id="jmtj" style="display:inline-block; width:60px; border: 1px solid gray;">
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>TUJUAN</th>
                            <th>SASARAN</th>
                            <th>PROGAM</th>
                            <th>KEGIATAN</th>
                            <th>SUBKEGIATAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="ids">
                            <td id="tj">&nbsp;</td>
                            <td id="ss">&nbsp;</td>
                            <td id="pg">&nbsp;</td>
                            <td id="kg">&nbsp;</td>
                            <td id="sk">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-dark" id="setss">SET</button></td>
                            <td><button class="btn btn-dark" id="setpg">SET</button></td>
                            <td><button class="btn btn-dark" id="setkg">SET</button></td>
                            <td><button class="btn btn-dark" id="setsk">SET</button></td>
                            <td><button class="btn btn-dark" id="setid">SET</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mx-auto" id="result"></div>
        </div>
    </div>
    <div style="height: 30px;">&nbsp;</div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        function spantemplate(code,ammt=2){
            const box = `
            <div class="box-main">
                <div class="box-code">${code}</div>
                <div class="box-amnt" id="${code}" contenteditable="true">${ammt}</div>
            </div>
            `;
            return box;
        }
        // jmtj dienter
        $("#jmtj").on("keypress", function(e){
            // only enter and tab allowed
            if(e.keyCode != 13 && (e.keyCode < 48 || e.keyCode > 57)){
                e.preventDefault();
                return;
            }
            if(e.keyCode == 13){
                const jmtj = $(this).val();
                for(let i = 1; i <= parseInt(jmtj); i++){
                    let code = i.toString().padStart(2, '0');
                    code = `${code}-00-00-00-00`;
                    $("#tj").append(spantemplate(code));
                }
            }
        });

        // setss clicked
        $("#setss").on("click", function(){
            // populate .box-mnt id in #tj
            $("#tj .box-amnt").each(function(){
                const amnt = $(this).text();
                for(let i = 1; i <= parseInt(amnt); i++){
                    let code = $(this).prev().text();
                    let split = code.split("-");
                    let newcode = `${split[0]}-${i.toString().padStart(2, '0')}-00-00-00`;
                    $("#ss").append(spantemplate(newcode));
                }
            });
        });

        $("#setpg").on("click", function(){
            // populate .box-mnt id in #ss
            $("#ss .box-amnt").each(function(){
                const amnt = $(this).text();
                for(let i = 1; i <= parseInt(amnt); i++){
                    let code = $(this).prev().text();
                    let split = code.split("-");
                    let newcode = `${split[0]}-${split[1]}-${i.toString().padStart(2, '0')}-00-00`;
                    $("#pg").append(spantemplate(newcode));
                }
            });
        });

        $("#setkg").on("click", function(){
            // populate .box-mnt id in #pg
            $("#pg .box-amnt").each(function(){
                const amnt = $(this).text();
                for(let i = 1; i <= parseInt(amnt); i++){
                    let code = $(this).prev().text();
                    let split = code.split("-");
                    let newcode = `${split[0]}-${split[1]}-${split[2]}-${i.toString().padStart(2, '0')}-00`;
                    $("#kg").append(spantemplate(newcode));
                }
            });
        });

        $("#setsk").on("click", function(){
            // populate .box-mnt id in #kg
            $("#kg .box-amnt").each(function(){
                const amnt = $(this).text();
                for(let i = 1; i <= parseInt(amnt); i++){
                    let code = $(this).prev().text();
                    let split = code.split("-");
                    let newcode = `${split[0]}-${split[1]}-${split[2]}-${split[3]}-${i.toString().padStart(2, '0')}`;
                    $("#sk").append(spantemplate(newcode,0));
                }
            });
        });

        $("#setid").on("click", function(){
            populate_id('tj');
            populate_id('ss');
            populate_id('pg');
            populate_id('kg');
            populate_id('sk');
        });

        function populate_id(location){
            let label ={
                'tj':'TUJUAN',
                'ss':'SASARAN',
                'pg':'PROGAM',
                'kg':'KEGIATAN',
                'sk':'SUBKEGIATAN',
            }
            let codes = [];
            // populate .box-code text in location and push to array
            $("#" + location + " .box-code").each(function(){
                codes.push($(this).text());
            });
            // put to #result, formated as label-code
            let pref = label[location];
            // let html='';
            for(let i = 0; i < codes.length; i++){
                $("#result").append(`<p>${pref}_${codes[i]}</p>`);
                // html += `<p>${pref} - ${codes[i]}</p>`;
            }
            // $("#result").html(html);
        }

        $(function(){
            $("#jmtj").focus();
        })

    </script>


</body>
</html>