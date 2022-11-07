<?php
require "config.php";
	if($_GET['id'] != null){
		$id = $_GET['id']; 
		$script = "SELECT * FROM baju WHERE id=$id"; 
		$query = mysqli_query($conn, $script);
		$data = mysqli_fetch_array($query);
	}else{
		header("location: read.php");
	}

	$query2 = null;

	if(isset($_POST['hapus'])) {
		$script2 = "DELETE FROM baju WHERE id = $id"; 
		$query2 = mysqli_query($conn, $script2);
	}

	if($query2 != null){
		header("location:read.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Product</title>
</head>
<body>
<header>
        <div class="wrapper">
            <div class="row">
                <div class="col-0">
        </div>
        <div class="col-5">
        <ul>
            <font face="Sans-serif" color="black" size="4">
                <ul><ul><li> <a href="index.php">Home</a> </li>
                <li> <a href="read.php">Product</a> </li>
                <li> <a href="create.php">Jual Barang</a> </li></font>
        </ul>
        </div>
        <div class="col-4">
        <form method="get">
            <div class="input-group">
            <div class="form-outline">
                <input type="search" name="search" id="form1" placeholder="Search product here!" class="form-control" />
            </div>
            <input type="submit" class="btn btn-primary" value="Search">
            </div>
        </form>
        </div>
    </div>
    </div>
</header>
<br>
<ul>
		<a href="read.php" type="submit" class="btn btn-primary">Kembali</a>
	</ul>
		<div class="wrapper"> 
			<div class="row"> 
				<div class="col-7"> 
					<img src="<?= $data['foto'] ?>" width="90%" alt=""> 
				</div> 
				<div class="col-4"> 
					<div class="box-detail-produk">
						<h2>Tetang produk</h2> <h3><?= $data['judul'] ?></h3> 
						<h5>Rp <?= number_format($data ['harga'])?></h5>
						<p> Asal : <?= $data['asal'] ?></p> 
					</div> 
					<div class="box-detail-produk">
						<h2>Tentang Penjual</h2> 
						<h3><?= $data['nama'] ?></h3> 
						<h5>0<?= $data['telp'] ?></h5>
						<a href="https://wa.me/0<?= $data['telp'] ?>" class="btn btn-success">Hubungi penjual</a> 
					</div> 
					<div class="box-detail-produk">
					<h2>Aksi lainnya</h2> 
					<form method="post">
						<a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning">Update produk</a>
						<input type="submit" name="hapus" value="Hapus produk" class="btn btn-danger"> 
					</form> 
				</div>
				<div class="col-md-12">
					<div class="box-detail-product">
						<h2>Deskripsi Produk</h2>
						<p><?= $data['deskripsi'] ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-06E9RHvbIyZFJoft+2mJbHaEWldlvI9I0Yy5n3zV9zzTtmI3UksdRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uldj003uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCEx130g8ifwB6" crossorigin="anonymous"></script>
</body>
</html>