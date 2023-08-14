$(document).ready(function () {
    var relocation = "../";
    function validationAnimation() {
        let timerInterval
        Swal.fire({
            title: 'Validando registro',
            timer: 2300,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        });
    }
    // Configuración del llenado y lógica de los campos

    let btnInventariar = $('.btnInventariar').click(function () {
        let data = {
            usuario_nombre: $("#usuario_nombre").val(),
            usuario_area: $("#usuario_area").val(),
            usuario_puesto: $("#usuario_puesto").val(),
            equipo_nombre: $("#equipo_nombre").val(),
            equipo_tipo: $("#equipo_tipo").val(),
            equipo_marca: $("#equipo_marca").val(),
            equipo_modelo: $("#equipo_modelo").val(),
            equipo_procesador: $("#equipo_procesador").val(),
            equipo_ram: $("#equipo_ram").val(),
            equipo_discoDuro: $("#equipo_discoDuro").val(),
            equipo_noSerie: $("#equipo_noSerie").val(),
            equipo_noInventario: $("#equipo_noInventario").val(),
            equipo_precio: $("#equipo_precio").val(),
            equipo_precioLetra: $("#equipo_precioLetra").val(),
            prestamo_fechaPrestamo: $("#prestamo_fechaPrestamo").val(),
            prestamo_observaciones: $("#prestamo_observaciones").val(),
            btnInventariar: $("#btnInventariar").val(),
        }

        // Validación de datos
        if (data.usuario_nombre == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre del usuario</b>`);
            return false;
        } else if (data.usuario_area == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona la área del usuario</b>`);
            return false;
        } else if (data.usuario_puesto == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el puesto del usuario</b>`);
            return false;
        } else if (data.equipo_nombre == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`);
            return false;
        } else if (data.equipo_tipo == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona el tipo de componente</b>`);
            return false;
        } else if (data.equipo_marca == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona la marca del componente</b>`);
            return false;
        } else if (data.equipo_modelo == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona el modelo del componente</b>`);
            return false;
        } else if (data.equipo_noSerie == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el número de serie del componente</b>`);
            return false;
        } else if (data.equipo_noInventario == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona el modelo del componente</b>`);
            return false;
        } else if (data.equipo_precio == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el precio del componente</b>`);
            return false;
        } else if (data.equipo_precioLetra == "") {
            alertify.error(`<b class = "boldTx whiteTx">Escribe con palabras el precio del componente</b>`);
            return false;
        } else if (data.prestamo_fechaPrestamo == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa la fecha en la que se le hace el préstamo del componente al usuario</b>`);
            return false;
        }
        // Animación de validación de datos
        validationAnimation();
        // Envío de datos
        $.ajax({
            url: '../php/inventariar.php',
            type: 'post',
            data: data,
            success: function (response) {
                // alert(response);
                console.log(response);
                if(response == "No serie existe"){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Este número de serie ya existe, no es posible volver a registrarlo',
                        showConfirmButton: false,
                        timer: 1800
                    });
                } else if (response == "No inventario existe") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Este número de inventario ya existe, no es posible volver a registrarlo',
                        showConfirmButton: false,
                        timer: 1800
                    });
                } else if (response == "Success") {
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
    }); // End Function Modal agregar

    let btn_editInventariar = $('#btn_editInventariar').on("click", function () {
        data = {
            edit_id_inventario: $("#edit_id_inventario").val(),
            edit_usuario_nombre: $("#edit_usuario_nombre").val(),
            edit_usuario_area: $("#edit_usuario_area").val(),
            edit_usuario_puesto: $("#edit_usuario_puesto").val(),
            edit_equipo_nombre: $("#edit_equipo_nombre").val(),
            edit_equipo_estado: $("#edit_equipo_estado").val(),
            edit_equipo_tipo: $("#edit_equipo_tipo").val(),
            edit_equipo_marca: $("#edit_equipo_marca").val(),
            edit_equipo_nuevaMarca: $("#edit_equipo_nuevaMarca").val(),
            edit_equipo_modelo: $("#edit_equipo_modelo").val(),
            edit_equipo_nuevoModelo: $("#edit_equipo_nuevoModelo").val(),
            edit_equipo_procesador: $("#edit_equipo_procesador").val(),
            edit_equipo_ram: $("#edit_equipo_ram").val(),
            edit_equipo_discoDuro: $("#edit_equipo_discoDuro").val(),
            edit_equipo_noSerie: $("#edit_equipo_noSerie").val(),
            edit_equipo_noInventario: $("#edit_equipo_noInventario").val(),
            edit_equipo_precio: $("#edit_equipo_precio").val(),
            edit_equipo_precioLetra: $("#edit_equipo_precioLetra").val(),
            edit_prestamo_fechaPrestamo: $("#edit_prestamo_fechaPrestamo").val(),
            edit_prestamo_observaciones: $("#edit_prestamo_observaciones").val(),
            btn_editInventariar: $('#btn_editInventariar').val()
        }

        // Validación de datos
        if (data.edit_usuario_nombre == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre del usuario</b>`);
            return false;
        } else if (data.edit_usuario_area == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona la área del usuario</b>`);
            return false;
        } else if (data.edit_usuario_puesto == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el puesto del usuario</b>`);
            return false;
        } else if (data.edit_equipo_nombre == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`);
            return false;
        } else if (data.edit_equipo_tipo == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona el tipo de componente</b>`);
            return false;
        } else if (data.edit_equipo_marca == "" && data.equipo_nuevaMarca == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona la marca del componente</b>`);
            return false;
        } else if (data.edit_equipo_modelo == "" && data.equipo_nuevoModelo == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona el modelo del componente</b>`);
            return false;
        } else if (data.edit_equipo_noSerie == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el número de serie del componente</b>`);
            return false;
        } else if (data.edit_equipo_noInventario == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona el modelo del componente</b>`);
            return false;
        } else if (data.edit_equipo_precio == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el precio del componente</b>`);
            return false;
        } else if (data.edit_equipo_precioLetra == "") {
            alertify.error(`<b class = "boldTx whiteTx">Escribe con palabras el precio del componente</b>`);
            return false;
        } 

        // Animación de validación de datos
        validationAnimation();
        // Envío de datos
        $.ajax({
            url: '../php/inventariar.php',
            type: 'post',
            data: data,
            success: function (response) {
                // alert(response);
                console.log(response);
                if (response == "Success") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Datos actualizados',
                        showConfirmButton: false,
                        timer: 1800
                    });
                    setTimeout(function () {
                        window.location.replace(relocation);
                    }, 2000)
                } else if (response == "Failed") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'No fue posible actualizar los datos',
                        showConfirmButton: false,
                        timer: 1800
                    })
                }
            }
        }); //End Ajax
    }); // END EDIT INVENTARIAR

    let btn_deleteInventariar = $('#btn_deleteInventariar').on("click", function () {
        data = {
            delete_id_inventario: $("#delete_id_inventario").val(),
            btn_deleteInventariar: $('#btn_deleteInventariar').val()
        }
        // Animación de validación de datos
        validationAnimation();
        // Envío de datos
        $.ajax({
            url: '../php/inventariar.php',
            type: 'post',
            data: data,
            success: function (response) {
                // alert(response);
                console.log(response);
                if (response == "Success") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registro eliminado',
                        showConfirmButton: false,
                        timer: 1800
                    });
                    setTimeout(function () {
                        window.location.replace(relocation);
                    }, 2000)
                } else if (response == "Failed") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'No fue posible eliminar el registro',
                        showConfirmButton: false,
                        timer: 1800
                    })
                }
            }
        }); //End Ajax
    }); // END FUNCTION DELETE INVENTARIAR

    $('.cartaFirmada_limpiar_campo').on('click', function (e) {
        $("#cartaFirmada_equipo_archivo").val("")
    })
    
    $('#nuevaCarta_btn').on("click", function(){
        if($('#nueva_carta').val() == ""){
            alertify.error(`<b class = "boldTx whiteTx">Debes de cargar un archivo</b>`);
            return false;
        }
    });

    $('#cartaFirmada_btn').on("click", function(){
        if($('#cartaFirmada_equipo_archivo').val() == ""){
            alertify.error(`<b class = "boldTx whiteTx">Debes de cargar un archivo</b>`);
            return false;
        }
    });

    $('#inv_btnLimpiarExcel').on('click', function (e) {
        $("#inv_subirExcel").val("");
        return false;
    })

    $('#inv_buttonExcel').on("click", function(){
        if($('#inv_subirExcel').val() == ""){
            alertify.error(`<b class = "boldTx whiteTx">Debes de cargar un archivo</b>`);
            return false;
        }
    });
}) // End Document ready