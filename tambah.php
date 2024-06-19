<?php
include_once 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container-sm pt-5">
    <div class="card">
      <div class="card-header">
        <h4>Tambah User</h4>
      </div>
      <div class="card-body">

        <form action="tambah.php" method="POST" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Nama" required>
            <div class="invalid-feedback">
              Please insert name.
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
            <div class="invalid-feedback">
              Please insert email.
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
            <div class="invalid-feedback">
              Please insert password.
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required></textarea>
            <div class="invalid-feedback">
              Please insert alamat.
            </div>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">No Hp</label>
            <input type="number" class="form-control" name="no_hp" id="formGroupExampleInput" placeholder="No Hp" required>
            <div class="invalid-feedback">
              Please insert No Hp.
            </div>
          </div>
          <button name="tambah" type="submit" class="btn btn-light">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $newPassword = md5($password);

    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $data = "INSERT INTO users (nama, password , email , alamat, no_hp) VALUES ('$nama', '$newPassword', '$email' , '$alamat', '$no_hp')";
    $result = mysqli_query($koneksi, $data);
    if ($result) {
      header('location: index.php');
    }
  }
  ?>

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>