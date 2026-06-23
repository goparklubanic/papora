$("#form-desc").on("submit", function (e) {
    e.preventDefault();
    let master_id = $("#master_id").val();
    let deskripsi_1 = $("#deskripsi_1").val();
    let deskripsi_2 = $("#deskripsi_2").val();
    let data = {
        master_id: master_id,
        deskripsi_1: deskripsi_1,
        deskripsi_2: deskripsi_2
    };
    let message = "";
    postData(apiurl + "/set/description", data)
    .then((response) => {
        // console.log(response);
        // trigger success alert
        if (response.message == "success") {
            message = "Deskripsi berhasil disimpan";
            $("#alert-message").text(message);
            $("#alert-phd").removeClass("d-none").addClass("show");
        } else {
            message = "Deskripsi gagal disimpan";
            $("#alert-phd").removeClass("alert-success").addClass("alert-danger");
            $("#danger-message").text(message);
            $("#alert-danger").removeClass("d-none").addClass("show");
        }
    }).catch((error) => {
        console.log(error);
    });
});

$("#form-indi").on("submit", function (e) {
    e.preventDefault();
    let data = {};
    $("#form-indi :input").each(function () {
        let name = $(this).attr("name");
        if (name) {
            data[name] = $(this).val();
        }
    });
    let message = "";
    postData(apiurl + "/set/indikator", data)
    .then((response) => {
        // console.log(response);
        // trigger success alert
        if (response.message == "success") {
            message = "Indikator berhasil disimpan";
            $("#alert-message").text(message);
            $("#alert-phi").removeClass("d-none").addClass("show");
        } else {
            message = "Indikator gagal disimpan";
            $("#alert-message").text(message);
            $("#alert-phi").removeClass("alert-success").addClass("alert-danger");
            $("#alert-phi").removeClass("d-none").addClass("show");
        }
    }).catch((error) => {
        console.log(error);
    });
});


// const token = $('meta[name="csrf-token"]').attr('content');
async function postData(url, data) {
    return $.ajax({
            url: url,
            method: "POST",
            data: JSON.stringify(data),
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            }
            // ,
            // success: function (response) {
            //     console.log(response);
            // },
            // error: function (response) {
            //     console.log(response);
            // },
        });
}