<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasa Sewa Console</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
        background-image: url('yoyi.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: fill;
        background-color: rgba(0, 0, 0.5, 0.5);
        position: relative;
        z-index: -1;
        
    }

    table {
        position: relative;
        z-index: 1;
    }
</style>

<body>
<h5>Status: Admin</h5>
<a class='btn btn-primary btn-sm' href='sistem_logout.php'>Logout</a>
    <div class="container my-5">
        <h2 style="color: #FFFFFF; text-shadow: 2px 2px 4px #000000;">Daftar Penyewa Console</h2>
        <a class ="btn btn-primary" href="/PemwebFinal/create.php" role="button">Tambah Penyewa</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Nomor Telpon</th>
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody>
              <?php  $servername = "localhost";
                $username = "root" ;
                $password = "" ;
                $database = "pemwebfinal" ;

                // Membuat Koneksi
                $connection = new mysqli($servername, $username, $password, $database);

                // Cek Koneksi
                if ($connection->connect_error) {
                    die("Connection Failed: " . $connection->connection_error);
                }

                // Membaca semua row dari tabel database
                $sql = "SELECT * FROM pengguna";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid Query: " . $connection->error);
                }

                // membacata data dalam setiap baris
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[email]</td>
                    <td>$row[nama]</td>
                    <td>$row[phone]</td>
                    
                    <td>
                        <a class='btn btn-primary btn-sm' href='/PemwebFinal/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-primary btn-sm' href='/PemwebFinal/delete.php?id=$row[id]'>Hapus</a>
                    </td>
                </tr>
                    ";
                }
                ?>
            </tbody>
        </table> 
    </div>
</body>
</html>