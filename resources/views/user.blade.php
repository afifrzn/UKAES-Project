<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Data</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        label {
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-style: normal;
        }
        input {
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-style: normal;
        }
        h1 {
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-style: normal;
        }
    </style>
  </head>
  <body>
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="text-dark mb-5">Form Pendaftaran Pasien</h1>

          <form onsubmit="sendMessage()">
            <div class="mb-3">
              <label for="name">Nama </label>
              <input
                type="text"
                id="name"
                placeholder="Masukkan Nama"
                class="form-control shadow-none"
                required 
              />
            </div>
            <div class="mb-3">
              <label for="keluhan">Keluhan</label>
              <input
                type="text"
                id="keluhan"
                placeholder="Masukkan Keluhan"
                class="form-control shadow-none"
                required
              />
            </div>
            <div class="mb-3">
              <label for="kelas">Kelas</label>
              <input
                type="text"
                id="kelas"
                placeholder="Masukkan Kelas"
                class="form-control shadow-none"
                required
              />
            </div>
            <button class="button btn btn-danger px-4">Kirim</button>
          </form>
        </div>
      </div>
    </div>

    <script>
      function sendMessage() {
        const name = document.getElementById("name").value;
        const keluhan = document.getElementById("keluhan").value;
        const kelas = document.getElementById("kelas").value;

        const url =
          "https://api.whatsapp.com/send?phone=+6281212527602&text=Permisi%20kak%0ASaya%20"+name+"%20dari%20Kelas%20"+kelas+"%20Keluhan%20saya%20adalah%20"+keluhan+"%0A%0ATerima%20Kasih%20Kak";

        window.open(url);
      }
    </script>
  </body>
</html>
