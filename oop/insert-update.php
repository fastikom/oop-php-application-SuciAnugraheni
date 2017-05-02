<?php
    include_once 'fungsi.php'; //memanggil halaman fungsi.php , supaya fungsi2 didalam halaman tersebut bisa dipanggil disini
    $con = new connect();       //mendeklarasikan objek atau hasil cetak dari class connect

    // memasukkan data atau tambah data
    if(isset($_POST['btn-save']))
    {
        $first_name = $_POST['first_name']; //menginputkan nama depan
        $last_name = $_POST['last_name'];   //menginputkan nama belakang
        $city = $_POST['city_name'];        //menginputkan kota asal
        $con->setdata("INSERT INTO users(first_name,last_name,user_city) VALUES('$first_name','$last_name','$city')");  //query sql untuk memasukkan data diata kedalam database
    header("Location: index.php");  //setelah memasukkan data akan dibawa ke halaman index.php
    }


// mengambil database dari tabel user melalui QueryString
if(isset($_GET['edit_id']))     //memanggil method dari fungsi.php
{
 $res=$con->getdata("SELECT * FROM users WHERE user_id=".$_GET['edit_id']);
 $row=mysql_fetch_array($res);
}

// kondisi data yang akan di update atau diedit
if(isset($_POST['btn-update']))
{
 $con->setdata("UPDATE users SET first_name='".$_POST['first_name']."',
           last_name='".$_POST['last_name']."',
           user_city='".$_POST['city_name']."'
          WHERE user_id=".$_GET['edit_id']);
 header("Location: index.php"); //setelah memasukkan data akan dibawa ke halaman index.php
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Kelas Kelas 2 IPA 1 SMA Harapan Bangsa</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Data Kelas Kelas 2 IPA 1 SMA Harapan Bangsa</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">Kembali Ke Halaman Awal</a></td>
    </tr>
    <tr>
    <td><input type="text" name="first_name" placeholder="Nama Depan" value="<?php if(isset($row))echo $row['first_name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Nama Belakang" value="<?php if(isset($row))echo $row['last_name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="city_name" placeholder="Asal Kota" value="<?php if(isset($row))echo $row['user_city']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <?php
 if(isset($_GET['edit_id']))
 {
  ?><button type="submit" name="btn-update"><strong>UPDATE</strong></button></td><?php
 }
 else
 {
  ?><button type="submit" name="btn-save"><strong>SAVE</strong></button></td><?php
 }
 ?>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>