<?php
include 'koneksi.php';
$db = new koneksi();

session_start();

$nama = $_SESSION['nama'];
$lives = $_SESSION['lives'];
$skor = $_SESSION['skor'];
$email = $_SESSION['email'];

$db->insertdata($nama, $email, $skor);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAME OVER</title>

    <!-- Link & Scripts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js""></script>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container mt-4 p-5" style="border: 3px solid green;">
        <h1>Hello <?php echo $nama ?>, Sayang permainan sudah selesai.Semoga lain kali bisa lebih baik.</h1>
        <h1>Skor Anda : <?php echo $skor ?></h1>
        <a href="index.php" class="btn btn-primary">Main Lagi</a>
        <hr>
        <h2>Hall of Fame</h2>
        <table class='table table-dark'>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Skor</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = mysqli_query($db->con, "select * from utsgame order by score desc limit 10");
                $no = 0;
                while($dt = mysqli_fetch_array($q)){
                    $no += 1;
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>".$dt['nama']."</td>";
                    echo "<td>".$dt['email']."</td>";
                    echo "<td>".$dt['score']."</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>