<?php
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table Users</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="container-sm pt-5">
    <div class="card">
      <div class="card-header ">
        <div class="row">
          <div class="col">
            <h4>Data Users</h4>
          </div>
          <div class="col d-flex justify-content-end">
            <a href="tambah.php"><button type="button" class="btn btn-light shadow-sm bg-body rounded"><i class="bi bi-plus"></i>Tambah</button></a>
          </div>
        </div>
      </div>

      <div class="card-body">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Pasword</th>
              <th scope="col">Email</th>
              <th scope="col">Alamat</th>
              <th scope="col">No</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $data = "SELECT * FROM users";
            $no = 1;
            $result = mysqli_query($koneksi, $data);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['no_hp'] ?></td>
                <td>
                  <a href="edit.php?id=<?= $row['id'] ?>"><button type="button" class="btn btn-success">Edit</button></a>
                  <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin Hapus data <?php echo $row['nama'] ?> ?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>

</body>

</html>