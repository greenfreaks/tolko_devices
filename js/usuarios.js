$(document).ready(function () {
  var relocation = "usuarios.php";

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
  let btnRegUsuario = $('#btnRegUsuario').click(function () {
    let data = {
      admin_nombre: $("#admin_nombre").val(),
      admin_usuario: $("#admin_usuario").val(),
      admin_nivel: $("#admin_nivel").val(),
      admin_password: $("#admin_password").val(),
      btnRegUsuario: $('#btnRegUsuario').val()
    }

    // Validación de contraseña
    let expReg_passMayus = /[A-Z]/;
    let verify_passMayus = expReg_passMayus.test(data.admin_password);
    let expReg_passMinus = /[a-z]/;
    let verify_passMinus = expReg_passMinus.test(data.admin_password);
    let expReg_passNumero = /[0-9]/;
    let verify_passNumero = expReg_passNumero.test(data.admin_password);
    let expReg_passEspecial = /[!@#$%&*]/;
    let verify_passEspecial = expReg_passEspecial.test(data.admin_password);
    let expReg_passEspacio = /[\s]/;
    let verify_passEspacio = expReg_passEspacio.test(data.admin_password);



    // Validación de datos
    if (data.admin_nombre == "") {
      alertify.error(`<b class = "boldTx whiteTx">Ingresa el nombre completo del usuario</b>`);
      return false;
    } else if (data.admin_usuario == "") {
      alertify.error(`<b class = "boldTx whiteTx">Asigna un nombre de usuario</b>`);
      return false;
    } else if (data.admin_nivel == "") {
      alertify.error(`<b class = "boldTx whiteTx">Elige el tipo de usuario</b>`);
      return false;
    } else if (data.admin_password == "") {
      alertify.error(`<b class = "boldTx whiteTx">Asigna una contraseña al usuario</b>`);
      return false;
    } else if (data.admin_password.length <= 7) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener mínimo 8 caracteres</b>`);
      return false;
    } else if (verify_passMinus == false) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener al menos una letra minúscula</b>`);
      return false;
    } else if (verify_passMayus == false) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener al menos una letra mayúscula</b>`);
      return false;
    } else if (verify_passNumero == false) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener al menos un caracter numérico</b>`);
      return false;
    } else if (verify_passEspecial == false) {
      alertify.error(`<p class = "whiteTx">La contraseña debe de tener al menos un caracter especial <b class = "boldTx whiteTx">(! @ # $ % &*)</b></p>`);
      return false;
    } else if (verify_passEspacio == true) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener espacios en blanco</b>`);
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
  }); // End Function Modal agregar usuario

  let btn_editUsuario = $("#btn_editUsuario").on("click", function () {
    data = {
      edit_admin_id: $("#edit_admin_id").val(),
      edit_admin_nombre: $("#edit_admin_nombre").val(),
      edit_admin_usuario: $("#edit_admin_usuario").val(),
      edit_admin_nivel: $("#edit_admin_nivel").val(),
      edit_admin_password: $("#edit_admin_password").val(),
      btn_editUsuario: $("#btn_editUsuario").val(),
    };

    let expReg_passMayus = /[A-Z]/;
    let verify_passMayus = expReg_passMayus.test(data.edit_admin_password);
    let expReg_passMinus = /[a-z]/;
    let verify_passMinus = expReg_passMinus.test(data.edit_admin_password);
    let expReg_passNumero = /[0-9]/;
    let verify_passNumero = expReg_passNumero.test(data.edit_admin_password);
    let expReg_passEspecial = /[!@#$%&*]/;
    let verify_passEspecial = expReg_passEspecial.test(data.edit_admin_password);
    let expReg_passEspacio = /[\s]/;
    let verify_passEspacio = expReg_passEspacio.test(data.edit_admin_password);

    if (data.edit_admin_nombre == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre completo del usuario</b>`
      );
      return false;
    } else if (data.edit_admin_usuario == "") {
      alertify.error(`<b class = "boldTx whiteTx">Define un nombre de usuario</b>`);
      return false;
    } else if (data.edit_admin_nivel == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Define el tipo de usuario</b>`
      );
      return false;
    } else if (data.edit_admin_password == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Establece una contraseña para el usuario</b>`
      );
      return false;
    } else if (data.edit_admin_password.length <= 7) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener mínimo 8 caracteres</b>`);
      return false;
    } else if (verify_passMinus == false) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener al menos una letra minúscula</b>`);
      return false;
    } else if (verify_passMayus == false) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener al menos una letra mayúscula</b>`);
      return false;
    } else if (verify_passNumero == false) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener al menos un caracter numérico</b>`);
      return false;
    } else if (verify_passEspecial == false) {
      alertify.error(`<p class="whiteTx">La contraseña debe de tener al menos un caracter especial <b class = "boldTx whiteTx">(! @ # $ % & *)</b></p>`);
      return false;
    } else if (verify_passEspacio == true) {
      alertify.error(`<b class = "boldTx whiteTx">La contraseña debe de tener espacios en blanco</b>`);
      return false;
    }


    animationValitation();

    $.ajax({
      url: "../php/registrarUsuario.php",
      type: "POST",
      data: data,
      success: function (response) {
        if (response == "Success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Datos actualizado correctamente",
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
  }); // END FUNCTION EDITAR USUARIO

  let btn_deleteUsuario = $("#btn_deleteUsuario").on("click", function () {
    data = {
      delete_admin_id: $("#delete_admin_id").val(),
      btn_deleteUsuario: $("#btn_deleteUsuario").val(),
    };
    animationValitation();

    $.ajax({
      url: "../php/registrarUsuario.php",
      type: "POST",
      data: data,
      success: function (response) {
        if (response == "Success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Registro Eliminado",
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
  }); // END FUNCTION ELIMINAR USUARIO
});