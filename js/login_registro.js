  $(document).ready(function () {
    function logIn(){
      // Captura de valores de datos
      var data = {
        usuarioAdmin: $(".usuarioAdmin").val(),
        passwordAdmin: $(".passwordAdmin").val(),
        action: $("#action").val(),
      };

      // Validación de Email válido
      //let expReg_email = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
      //let verify_email = expReg_email.test(data.email_medico);


      // Validación de datos
      if (data.usuarioAdmin == "") {
        alertify.error(`<b class = "boldTx whiteTx">Ingrese su usuario</b>`);
        return false;
      }else if (data.passwordAdmin == "") {
        alertify.error(`<b class = "boldTx whiteTx">Ingresa una contraseña</b>`);
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
      
      //Envío de datos
      $.ajax({
        url: 'php/login_registro.php',
        type: 'post',
        data: data,
        // Recimimos respuesta de PHP
        success: function (response) {
          console.log(response);
          // alert(response);

          //Se muestra alerta al usuario, dependiendo del resulado de su consulta
          if (response == "Login Successful") {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Iniciando sesión',
              showConfirmButton: false,
              timer: 1800
            })
            setTimeout(function () {
              window.location.reload();
            }, 2000)

          } else if (response == "Wrong Password") {
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Contraseña incorrecta',
              showConfirmButton: false,
              timer: 1800
            })
          } else if (response == "User Not Registered") {
            Swal.fire({
              position: 'center',
              icon: 'warning',
              showCloseButton: false,
              title: `Este usuario no existe, debes de solicitar que te den de alta al area de sistemas`,
              showConfirmButton: false,
            })
          } else if (response == "User Has Already Taken") {
            Swal.fire({
              icon: 'warning',
              title: 'Este usuario ya existe',
              text: ' ¿Deseas iniciar sesión?',
              showConfirmButton: false,
              footer: '<a href="index.php" class ="noDecoration orangeTx boldTx">Iniciar sesión</a>',
            })
          } else if (response == "Registration Successful") {
            Swal.fire({
              icon: 'success',
              title: 'Registro Exitoso',
              text: 'Ahora puedes iniciar sesión',
              showConfirmButton: false,
            })
            setTimeout(function () {
              window.location.replace("index.php");
            }, 3000)
          }
        }
      }); // End Ajax
    }

    let btnEnviar = $('.btnRegLog').click(function () {
      logIn();
    }); // End BTN enviar function

    $(document).on('keypress', function(e){
      if(e.which == 13){
        logIn();
      }
    })

  }); // End Document