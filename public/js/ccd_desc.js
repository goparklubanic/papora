var detail_id="";
// Cari Sasaran
$("#tujuans").on("click", "button", function () {
    // console.log($(this).data('id'));
    fetch(apiurl + "/desc/getSasaran/" + $(this).data("id"))
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            data.forEach((ss) => {
                let desc1 = ss.deskripsi_1 == "" ? "-" : ss.deskripsi_1;
                let desc2 = ss.deskripsi_2 == "" ? "-" : ss.deskripsi_2;
                $("#sasarans").append(`
                    <tr class='tr-sasaran' id="${ss.master_id}">
                        <td>
                            <section class="row">
                                <div class="col-sm-2 fw-bold desc-sasaran">SASARAN</div>
                                <div class="col-sm-10 desc-nama">${desc1}</div>
                            </section>
                            <section class="row">
                                <div class="col-sm-2 fw-bold desc-sasaran">NAMA</div>
                                <div class="col-sm-10 desc-nama">${desc2}</div>
                            </section>
                        </td>
                        <td width="150px" class="align-middle">
                            <button class="btn btn-sm btn-dark btn-sasaran" data-id="${ss.master_id}">Program</button>
                        </td>
                    </tr>
                `);
            });
        });
});

$("#sasarans").on("click", "button", function () {
    $(".tr-sasaran").hide();
    $(`tr#${$(this).data("id")}`).show();
    // console.log($(this).data('id'));
    fetch(apiurl + "/desc/getProgram/" + $(this).data("id"))
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            data.forEach((pg) => {
                let desc1 = pg.deskripsi_1 == "" ? "-" : pg.deskripsi_1;
                let desc2 = pg.deskripsi_2 == "" ? "-" : pg.deskripsi_2;
                $("#programs").append(`
                <tr class='tr-program' id="${pg.master_id}">
                    <td>
                        <section class="row">
                            <div class="col-sm-2 fw-bold desc-sasaran">SASARAN</div>
                            <div class="col-sm-10 desc-nama">${desc1}</div>
                        </section>
                        <section class="row">
                            <div class="col-sm-2 fw-bold desc-sasaran">NAMA</div>
                            <div class="col-sm-10 desc-nama">${desc2}</div>
                        </section>
                    </td>
                    <td width="150px" class="align-middle"><button class="btn btn-sm btn-dark btn-program" data-id="${pg.master_id}">Kegiatan</button></td>
                </tr>
            `);
            });
        });
});
$("#programs").on("click", "button", function () {
    $(".tr-program").hide();
    $(`tr#${$(this).data("id")}`).show();

    // console.log($(this).data('id'));
    fetch(apiurl + "/desc/getKegiatan/" + $(this).data("id"))
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            data.forEach((kg) => {
                let desc1 = kg.deskripsi_1 == "" ? "-" : kg.deskripsi_1;
                let desc2 = kg.deskripsi_2 == "" ? "-" : kg.deskripsi_2;
                $("#kegiatans").append(`
                <tr class='tr-kegiatan' id="${kg.master_id}">
                    <td>
                        <section class="row">
                            <div class="col-sm-2 fw-bold desc-sasaran">SASARAN</div>
                            <div class="col-sm-10 desc-nama">${desc1}</div>
                        </section>
                        <section class="row">
                            <div class="col-sm-2 fw-bold desc-sasaran">NAMA</div>
                            <div class="col-sm-10 desc-nama">${desc2}</div>
                        </section>
                    </td>
                    <td width="150px" class="align-middle"><button class="btn btn-sm btn-dark btn-kegiatan" data-id="${kg.master_id}">Sub Kegiatan</button></td>
                </tr>
            `);
            });
        });
});

$("#kegiatans").on("click", "button", function () {
    $(".tr-kegiatan").hide();
    $(`tr#${$(this).data("id")}`).show();
    // console.log($(this).data('id'));
    fetch(apiurl + "/desc/getSubkegiatan/" + $(this).data("id"))
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            data.forEach((sk) => {
                let desc1 = sk.deskripsi_1 == "" ? "-" : sk.deskripsi_1;
                let desc2 = sk.deskripsi_2 == "" ? "-" : sk.deskripsi_2;
                $("#subkegiatans").append(`
                <tr>
                    <td>
                        <section class="row">
                            <div class="col-sm-2 fw-bold desc-sasaran">SASARAN</div>
                            <div class="col-sm-10 desc-nama">${desc1}</div>
                        </section>
                        <section class="row">
                            <div class="col-sm-2 fw-bold desc-sasaran">NAMA</div>
                            <div class="col-sm-10 desc-nama">${desc2}</div>
                        </section>
                    </td>
                    <td width="150px">
                        <button class="btn btn-sm btn-dark btn-subkegiatan" data-id="${sk.master_id}">Detail</button>
                    </td>
                </tr>
            `);
            });
        });
});


$("#subkegiatans").on("click", ".btn-subkegiatan", function() {
    detail_id = $(this).data("id");
    location.href = weburl+"/renstra/detail/" + detail_id;
});