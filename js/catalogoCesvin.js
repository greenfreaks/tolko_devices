$(document).ready(function () {
    var relocation = "catalogoCesvin.php";

    function animationValitation() {
        // Animación de validación de datos
        let timerInterval;
        Swal.fire({
            title: "Validando registro",
            timer: 2300,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector("b");
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft();
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
    }


    let btnRegNuevaArea = $('#btnRegNuevaArea').click(function () {
        let data = {
            nombre_nuevaArea: $("#nombre_nuevaArea").val(),
            jefe_nuevaArea: $("#jefe_nuevaArea").val(),
            btnRegNuevaArea: $("#btnRegNuevaArea").val(),
        }

        // Validación de datos
        if (data.nombre_nuevaArea == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre de la área</b>`);
            return false;
        } else if (data.jefe_nuevaArea == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre del jefe de la área</b>`);
            return false;
        }
        // Animación de validación de datos
        animationValitation();
        // Envío de datos
        $.ajax({
            url: '../php/catalogoCesvin.php',
            type: 'post',
            data: data,
            success: function (response) {
                // alert(response);
                console.log(response);
                if (response == "Success") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos registrados correctamente',
                        showConfirmButton: false,
                        timer: 1800
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000)
                } else if (response == "Failed") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'No fue posible registrar los datos',
                        showConfirmButton: false,
                        timer: 1800
                    })
                }
            }
        }); //End Ajax
    }); // End registrar Nueva Área

    let btn_editArea = $("#btn_editArea").on("click", function () {
        data = {
            id_edit_area: $("#id_edit_area").val(),
            edit_area: $('#edit_area').val(),
            edit_jefeArea: $('#edit_jefeArea').val(),
            btn_editArea: $("#btn_editArea").val()
        };

        if (data.edit_area == "") {
            alertify.error(
                `<b class = "boldTx whiteTx">Ingresa el nombre del la área</b>`
            );
            return false;
        } else if (data.edit_jefeArea == "") {
            alertify.error(
                `<b class = "boldTx whiteTx">Ingresa el nombre del jefe de área</b>`
            );
            return false;
        }

        // Animación de validación de datos
        animationValitation();
        $.ajax({
            url: "../php/catalogoCesvin.php",
            type: "POST",
            data: data,
            success: function (response) {
                if (response == "Success") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Datos actualizados correctamente",
                        showConfirmButton: false,
                        timer: 1800,
                    });
                    setTimeout(function () {
                        window.location.replace(relocation);
                    }, 2000);
                } else if (response == "Failed") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "No fue posible actualizar los datos",
                        showConfirmButton: false,
                        timer: 1800,
                    });
                }
            },
        });
    }); //END FUNCTION EDIT ÁREA

    let btn_deleteArea = $("#btn_deleteArea").on("click", function () {
        data = {
            id_delete_area: $("#id_delete_area").val(),
            delete_area: $('#delete_area').val(),
            btn_deleteArea: $("#btn_deleteArea").val()
        };

        // Animación de validación de datos
        animationValitation();
        $.ajax({
            url: "../php/catalogoCesvin.php",
            type: "POST",
            data: data,
            success: function (response) {
                if (response == "Success") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Registro eliminado",
                        showConfirmButton: false,
                        timer: 1800,
                    });
                    setTimeout(function () {
                        window.location.replace(relocation);
                    }, 2000);
                } else if (response == "Failed") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "No fue posible eliminar el registro",
                        showConfirmButton: false,
                        timer: 1800,
                    });
                }
            },
        });
    }); //END FUNCTION ELIMINAR ÁREA
}) // End Document ready