<?php
// API mysqli untuk koneksi ke da
$mysqli = new mysqli("localhost", "root", "", "universitas_pasundan");
// Ambil semua data  dari database
$result = $mysqli->query("SELECT * FROM mahasiswa");
$rows = $result->fetch_all();

// koversi ke format JSON
$data_json = json_encode($rows);

// Tampilkan data JSOn
// echo $data_json;
?>

<!doctype html>
<html lang="en">

<head>
    <title>REST API</title>
</head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body class="container">
    <h3 class="my-3">Daftar Mahasiswa</h3>
    <table border="1" class="table table-hover">
        <thead>
            <tr>
                <th class="table-success">NO</th>
                <th class="table-info">Nama</th>
                <th class="table-success">NRP</th>
                <th class="table-info">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach (json_decode($data_json) as $data) { ?>
                <tr>
                    <td class="table-success"><?= $i; ?></td>
                    <td class="table-info"><?= $data[1]; ?></td>
                    <td class="table-success"><?= $data[2]; ?></td>
                    <td class="table-info"><?= $data[3]; ?></td>
                </tr>
                <?php $i++ ?>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>