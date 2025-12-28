$(function () {
    // console.log("Detail Renstra");
    fetch(apiurl + "/desc/detail/" + detail_id)
        .then((response) => response.json())
        .then((data) => {
            // console.log(data.sasaran);
            // lengkapi deskripsi sasaran
            let editd =
                '<a href="' +
                weburl +
                "/edit/deskripsi/" +
                data.sasaran[0].master_id +
                '" class="text-warning float-end fw-normal text-decoration-none d-none edit-link">Edit</a>';

            $("#ss_desc1").text(data.sasaran[0].deskripsi_1);
            $("#ss_desc2").text(data.sasaran[0].deskripsi_2);
            $("#ss_desc2").append(editd);

            // lengkapi indikator sasaran
            let ss_indikator = data.sasaran[0].indicators;
            ss_indikator.forEach((ind) => {
                let editi = `<a href="${weburl}/edit/indikator/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none d-none edit-link me-2"><i class="bi bi-pencil-square"></i></a>`;
                $("#ss_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.baseline}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                        <td class='text-center td-nav'>
                            ${editi}&nbsp;
                            <a href="${weburl}/view/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none edit-link"><i class="bi bi-journal-bookmark"></i></a>
                        </td>
                    </tr>
                `);
            });

            // lengkapi deskripsi program
            editd =
                '<a href="' +
                weburl +
                "/edit/deskripsi/" +
                data.program[0].master_id +
                '" class="text-warning float-end fw-normal text-decoration-none d-none edit-link">Edit</a>';
            $("#pg_desc1").text(data.program[0].deskripsi_1);
            $("#pg_desc2").text(data.program[0].deskripsi_2);
            $("#pg_desc2").append(editd);

            // lengkapi indikator program
            let pg_indikator = data.program[0].indicators;
            pg_indikator.forEach((ind) => {
                let editi = `<a href="${weburl}/edit/indikator/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none d-none edit-link me-2"><i class="bi bi-pencil-square"></i></a>`;
                $("#pg_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.baseline}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                        <td class='text-center td-nav'>
                            ${editi}&nbsp;
                            <a href="${weburl}/view/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none edit-link"><i class="bi bi-journal-bookmark"></i></a>
                        </td>
                    </tr>
                `);
            });

            // lengkapi deskripsi kegiatan
            editd =
                '<a href="' +
                weburl +
                "/edit/deskripsi/" +
                data.kegiatan[0].master_id +
                '" class="text-warning float-end fw-normal text-decoration-none d-none edit-link d-none edit-link">Edit</a>';
            $("#kg_desc1").text(data.kegiatan[0].deskripsi_1);
            $("#kg_desc2").text(data.kegiatan[0].deskripsi_2);
            $("#kg_desc2").append(editd);

            // lengkapi indikator kegiatan
            let kg_indikator = data.kegiatan[0].indicators;
            kg_indikator.forEach((ind) => {
                let editi = `<a href="${weburl}/edit/indikator/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none d-none edit-link me-2"><i class="bi bi-pencil-square"></i></a>`;
                $("#kg_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.baseline}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                        <td class='text-center td-nav'>
                            ${editi}&nbsp;
                            <a href="${weburl}/view/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none edit-link"><i class="bi bi-journal-bookmark"></i></a>
                        </td>
                    </tr>
                `);
            });

            // lengkapi deskripsi sub kegiatan
            editd =
                '<a href="' +
                weburl +
                "/edit/deskripsi/" +
                data.subkegiatan[0].master_id +
                '" class="text-warning float-end fw-normal text-decoration-none d-none edit-link">Edit</a>';
            $("#sk_desc1").text(data.subkegiatan[0].deskripsi_1);
            $("#sk_desc2").text(data.subkegiatan[0].deskripsi_2);
            $("#sk_desc2").append(editd);

            // lengkapi indikator sub kegiatan
            let sk_indikator = data.subkegiatan[0].indicators;
            sk_indikator.forEach((ind) => {
                let editi = `<a href="${weburl}/edit/indikator/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none d-none edit-link me-2"><i class="bi bi-pencil-square"></i></a>`;
                $("#sk_indikator").append(`
                    <tr>
                        <td>${ind.indikator}</td>
                        <td>${ind.satuan}</td>
                        <td class='text-end'>${ind.baseline}</td>
                        <td class='text-end'>${ind.t1}</td>
                        <td class='text-end'>${ind.t2}</td>
                        <td class='text-end'>${ind.t3}</td>
                        <td class='text-end'>${ind.t4}</td>
                        <td class='text-end'>${ind.t5}</td>
                        <td class='text-center td-nav'>
                            ${editi}
                            <a href="${weburl}/view/${ind.master_ik}" class="text-primary float-end fw-normal text-decoration-none edit-link"><i class="bi bi-journal-bookmark"></i></a>
                        </td>
                    </tr>
                `);
            });
        });
});

$("#edit-panel").on("click", function () {
    // alert("Edit Panel");
    $(".edit-link").removeClass("d-none").show();
});
