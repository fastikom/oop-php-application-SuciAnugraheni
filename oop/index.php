<?php
    include_once 'fungsi.php'; //memanggil halaman fungsi.php , supaya fungsi2 didalam halaman tersebut bisa dipanggil disini
    $con = new connect();       //mendeklarasikan objek atau hasil cetak dari class connect

    // menghapus data
    if(isset($_GET['delete_id']))   //memanggil method dari fungsi.php
    {
     $con->delete("DELETE FROM users WHERE user_id=".$_GET['delete_id']);   //query untuk menghapus data
    header("Location: index.php");  //setelah memnghapus data akan dibawa ke halaman index.php
    }
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Kelas Kelas 2 IPA 1 SMA Harapan Bangsa</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function edt_id(id)     //memanggil method edit dari fungsi.php
{
 if(confirm('Apakah Benar akan edit ?'))    //konfirmasi sebelum masuk ke halaman edit
 {
  window.location.href='insert-update.php?edit_id='+id; //menuju halaman edit data
 }
}
function delete_id(id)
{
 if(confirm('Apakah Benar akan hapus ?'))   //konfirmasi sebelum data dihapus
 {
  window.location.href='index.php?delete_id='+id;   //menuju halaman index.php setelah data berhasil dihapus
 }
}
</script>
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
    <table align="center">
    <tr>
    <th colspan="5"><a href="insert-update.php">Tambah Data</a></th>
    </tr>
    <th>Nama Depan</th>
    <th>Nama Belakang</th>
    <th>Asal Kota</th>
    <th colspan="2">Aksi</th>
    </tr>
    <?php
$res=$con->getdata("SELECT * FROM users");  //mengambil data dari tabel user di database
if(mysql_num_rows($res)==0)     
{
 ?>
    <tr>
    <td colspan="5">Data Tidak Ada !</td>
    </tr>
    <?php
}
else
{
 while($row=mysql_fetch_array($res))
 {
  ?>
        <tr>
        <td><?php echo $row['first_name'];  ?></td>
        <td><?php echo $row['last_name'];  ?></td>
        <td><?php echo $row['user_city'];  ?></td>
        <td align="center"><a href="javascript:edt_id('<?php echo $row['user_id']; ?>')">Edit</td>
        <td align="center"><a href="javascript:delete_id('<?php echo $row['user_id']; ?>')">Hapus</a></td>
        </tr>
        <?php
 }
}
?>
    </table>
    </div>
</div>

</center>
</body>
</html>