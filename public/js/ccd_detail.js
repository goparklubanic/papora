$(function () {
    // console.log("Detail Renstra");
    fetch(apiurl + "/desc/detail/" + detail_id)
        .then((response) => response.json())
        .then((data) => {
            console.log(data.sasaran);
            // lengkapi deskripsi sasaran
            $("#ss_desc1").text(data.sasaran[0].deskripsi_1);
            $("#ss_desc2").text(data.sasaran[0].deskripsi_2);

            // lengkapi indikator sasaran
            let ss_indikator = data.sasaran[0].indicators;
            ss_indikator.forEach((ind) => {
                $("#ss_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                    </tr>
                `);
            });

            // lengkapi deskripsi program
            $("#pg_desc1").text(data.program[0].deskripsi_1);
            $("#pg_desc2").text(data.program[0].deskripsi_2);

            // lengkapi indikator program
            let pg_indikator = data.program[0].indicators;
            pg_indikator.forEach((ind) => {
                $("#pg_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                    </tr>
                `);
            });

            // lengkapi deskripsi kegiatan
            $("#kg_desc1").text(data.kegiatan[0].deskripsi_1);
            $("#kg_desc2").text(data.kegiatan[0].deskripsi_2);

            // lengkapi indikator kegiatan
            let kg_indikator = data.kegiatan[0].indicators;
            kg_indikator.forEach((ind) => {
                $("#kg_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                    </tr>
                `);
            });

            // lengkapi deskripsi sub kegiatan
            $("#sk_desc1").text(data.subkegiatan[0].deskripsi_1);
            $("#sk_desc2").text(data.subkegiatan[0].deskripsi_2);

            // lengkapi indikator sub kegiatan
            let sk_indikator = data.subkegiatan[0].indicators;
            sk_indikator.forEach((ind) => {
                $("#sk_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                    </tr>
                `);
            });
        });
});