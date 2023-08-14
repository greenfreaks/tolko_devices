$(document).ready(function () {
  var relocation = "catalogoEquipos.php";

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

  let btnRegNuevoEquipo = $("#btnRegNuevoEquipo").on("click", function () {
    data = {
      nuevoEquipo_nombre: $("#nuevoEquipo_nombre").val(),
      btnRegNuevoEquipo: $("#btnRegNuevoEquipo").val(),
    };

    if (data.nuevoEquipo_nombre == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
      type: "POST",
      data: data,
      success: function (response) {
        if (response == "Success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Equipo registrado correctamente",
            showConfirmButton: false,
            timer: 1800,
          });
          setTimeout(function () {
            window.location.reload();
          }, 2000);
        } else if (response == "Failed") {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "No fue posible registrar los datos",
            showConfirmButton: false,
            timer: 1800,
          });
        }
      },
    });
  }); //END FUNCTION REG NUEVO EQUIPO

  let btn_editEquipo = $("#btn_editEquipo").on("click", function () {
    data = {
      id_edit_equipo: $("#id_edit_equipo").val(),
      edit_equipo: $("#edit_equipo").val(),
      btn_editEquipo: $("#btn_editEquipo ").val(),
    };

    if (data.edit_equipo == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION EDIT EQUIPO

  let btn_deleteEquipo = $("#btn_deleteEquipo").on("click", function () {
    data = {
      id_delete_equipo: $("#id_delete_equipo").val(),
      delete_equipo: $("#delete_equipo").val(),
      btn_deleteEquipo: $("#btn_deleteEquipo ").val(),
    };

    if (data.delete_equipo == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION ELIMINAR EQUIPO

  let btnRegNuevaMarca = $("#btnRegNuevaMarca").on("click", function () {
    data = {
      nuevaMarca_nombre: $("#nuevaMarca_nombre").val(),
      btnRegNuevaMarca: $("#btnRegNuevaMarca").val(),
    };
    if (data.nuevaMarca_nombre == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre de la marca</b>`
      );
      return false;
    }
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
      type: "POST",
      data: data,
      success: function (response) {
        if (response == "Success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Marca registrada correctamente",
            showConfirmButton: false,
            timer: 1800,
          });
          setTimeout(function () {
            window.location.reload(relocation);
          }, 2000);
        } else if (response == "Failed") {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "No fue posible registrar la marca",
            showConfirmButton: false,
            timer: 1800,
          });
        }
      },
    });
  }); // END FUNCTION REG NUEVA MARCA

  let btn_editMarca = $("#btn_editMarca").on("click", function () {
    data = {
      id_edit_marca: $("#id_edit_marca").val(),
      edit_marca: $("#edit_marca").val(),
      btn_editMarca: $("#btn_editMarca").val(),
    };

    if (data.edit_marca == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION EDIT MARCA

  let btn_deleteMarca = $("#btn_deleteMarca").on("click", function () {
    data = {
      id_delete_marca: $("#id_delete_marca").val(),
      delete_marca: $("#delete_marca").val(),
      btn_deleteMarca: $("#btn_deleteMarca").val(),
    };

    if (data.delete_marca == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del equipo</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION ELIMINAR MARCA

  let btnRegNuevoModelo = $("#btnRegNuevoModelo").on("click", function () {
    data = {
      nuevoModelo_nombre: $("#nuevoModelo_nombre").val(),
      btnRegNuevoModelo: $("#btnRegNuevoModelo").val(),
    };
    if (data.nuevoModelo_nombre == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del modelo</b>`
      );
      return false;
    }
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
      type: "POST",
      data: data,
      success: function (response) {
        if (response == "Success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Modelo registrado correctamente",
            showConfirmButton: false,
            timer: 1800,
          });
          setTimeout(function () {
            window.location.reload();
          }, 2000);
        } else if (response == "Failed") {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "No fue posible registrar el modelo",
            showConfirmButton: false,
            timer: 1800,
          });
        }
      },
    });
  }); // END FUNCTION REG NUEVO MODELO

  let btn_editModelo = $("#btn_editModelo").on("click", function () {
    data = {
      id_edit_modelo: $("#id_edit_modelo").val(),
      edit_modelo: $("#edit_modelo").val(),
      btn_editModelo: $("#btn_editModelo").val(),
    };

    if (data.edit_modelo == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION EDIT MODELO

  let btn_deleteModelo = $("#btn_deleteModelo").on("click", function () {
    data = {
      id_delete_modelo: $("#id_delete_modelo").val(),
      delete_modelo: $("#delete_modelo").val(),
      btn_deleteModelo: $("#btn_deleteModelo").val(),
    };

    if (data.delete_modelo == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del componente</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION ELIMINAR MODELO

  let btnRegNuevoEstatus = $("#btnRegNuevoEstatus").on("click", function () {
    data = {
      nuevoEstatus_nombre: $("#nuevoEstatus_nombre").val(),
      btnRegNuevoEstatus: $("#btnRegNuevoEstatus").val(),
    };
    if (data.nuevoEstatus_nombre == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del estatus</b>`
      );
      return false;
    }
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
      type: "POST",
      data: data,
      success: function (response) {
        if (response == "Success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Registro exitoso",
            showConfirmButton: false,
            timer: 1800,
          });
          setTimeout(function () {
            window.location.reload();
          }, 2000);
        } else if (response == "Failed") {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "No fue posible realizar el registro",
            showConfirmButton: false,
            timer: 1800,
          });
        }
      },
    });
  }); // END FUNCTION REG NUEVO ESTATUS

  let btn_editEstado = $("#btn_editEstado").on("click", function () {
    data = {
      id_edit_estado: $("#id_edit_estado").val(),
      edit_estado: $("#edit_estado").val(),
      btn_editEstado: $("#btn_editEstado").val(),
    };

    if (data.edit_estado == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del estatus</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION EDIT ESTADO

  let btn_deleteEstado = $("#btn_deleteEstado").on("click", function () {
    data = {
      id_delete_estado: $("#id_delete_estado").val(),
      delete_estado: $("#delete_estado").val(),
      btn_deleteEstado: $("#btn_deleteEstado").val(),
    };

    if (data.delete_modelo == "") {
      alertify.error(
        `<b class = "boldTx whiteTx">Ingresa el nombre del equipo</b>`
      );
      return false;
    }

    // Animación de validación de datos
    animationValitation();
    $.ajax({
      url: "../php/catalogoEquipos.php",
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
  }); //END FUNCTION ELIMINAR ESTADO
}); //END DOCUMENT READY
