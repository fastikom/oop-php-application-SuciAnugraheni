<?php
    include_once 'fungsi.php'; //memanggil halaman fungsi.php , supaya fungsi2 didalam halaman tersebut bisa dipanggil disini
    $con = new connect();       //mendeklarasikan objek atau hasil cetak dari class connect
  if(isset($_GET['id_user']))
    {
     $con->admin("SELECT * FROM user WHERE username='$username' and password='$password'".$_GET['admin']);
    header("Location: index.php");
    }

if(($username==$sql['username']) and ($password==$sql['password'])){
	echo "<script>
			window.location = 'index.php';
		</script>";
	}else{
	echo "<script>
		alert ('Username atau Password Salah');
		self.history.back();
		</script>";
	} 


?>