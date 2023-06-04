<?php 

$servername = "localhost";
$username = "root" ;
$password = "" ;
$database = "pemwebfinal" ;
 // Membuat Koneksi
$connection = new mysqli($servername, $username, $password, $database);

$email = "";
$nama = "";
$phone = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $phone = $_POST["phone"];

    do {
        if (empty($email) || empty($nama) || empty($phone) ) {
            $errorMessage = "Isi semua field";
            break;
        }

        //tambah pengguna baru ke database

        $sql = "INSERT INTO pengguna (email, nama, phone) ".
                "VALUES ('$email', '$nama', '$phone')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;

        }

        $email = "";
        $nama = "";
        $phone = "";

        $successMessage = "Pengguna berhasil ditambah";

        header("location: /PemwebFinal/index.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lelang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <div class="container my-5">
        <h2  style="color: #FFFFFF; text-shadow: 2px 2px 4px #000000;">Tambah Pengguna</h2>

        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
            <strong?>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email ;?>">

                    </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" value="<?php echo $nama ;?>">

                    </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nomor Telpon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone ;?>">

                    </div>
            </div>

            <?php 
            if ( !empty($successMessage) )
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-3'>
                        <div class='alert alert-success alert-dismissable fade show' role='alert'>
                            <strong?>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                    "
            
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/PemwebFinal/index.php" role="button">Batal</a>
                </div>
            </div>
            
        </form>
    </div>
</body>
</html>