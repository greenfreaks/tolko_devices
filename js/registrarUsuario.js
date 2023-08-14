$(document).ready(function () {
    let btnRegUsuario = $('#btnRegUsuario').click(function () {
        let data = {
            admin_nombre: $("#admin_nombre").val(),
            admin_usuario: $("#admin_usuario").val(),
            admin_ubicacion: $("#admin_ubicacion").val(),
            admin_area: $("#admin_area").val(),
            admin_puesto: $("#admin_puesto").val(),
            admin_nivel: $("#admin_nivel").val(),
            admin_password: $("#admin_password").val(),
            
            action: $("#action").val(),
        }

        // Validación de datos
        if (data.admin_nombre == "") {
            alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre del usuario</b>`);
            return false;
        } else if (data.admin_usuario == "") {
            alertify.error(`<b class = "boldTx whiteTx">Asigna un nombre de usuario</b>`);
            return false;
        }else if (data.admin_ubicacion == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona la ubicación del usuario</b>`);
            return false;
        }else if (data.admin_area == "") {
            alertify.error(`<b class = "boldTx whiteTx">Selecciona el área del usuario</b>`);
            return false;
        }else if (data.admin_puesto == "") {
            alertify.error(`<b class = "boldTx whiteTx">Escribe que puesto tiene el usuario</b>`);
            return false;
        }else if (data.admin_nivel == "") {
            alertify.error(`<b class = "boldTx whiteTx">Elige el tipo de usuario</b>`);
            return false;
        }else if (data.admin_password == "") {
            alertify.error(`<b class = "boldTx whiteTx">Asigna una contraseña al usuario</b>`);
            return false;
        }else if (data.admin_password.length <= 7) {
            alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener mínimo 8 caracteres</b>`);
            return false;
        }
        // Animación de validación de datos
        let timerInterval
        Swal.fire({
            title: 'Validando datos',
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
        })
        // Envío de datos
        $.ajax({
            url: '../php/registrarUsuario.php',
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
                } else if (response == "Funciona") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Funciona',
                        showConfirmButton: false,
                        timer: 1800
                    })
                }
            }
        }); //End Ajax
    }); // End Function Modal agregar
}) // End Document ready