<?php
class connect 	//mendeklarasikan class connect (koneksi ke database)
{
 public function connect()	//mendeklarasikan method (function yang berada di dalam class) : fungsi konek ke database
 {
  mysql_connect("localhost","root");	//nama username dan password mysql
  mysql_select_db("latihan");			//nama database yang dibuat
 }
 public function admin()
 {
 	mysql_query($sql);
 }
 public function setdata($sql)	//mendeklarasikan method : membuat fungsi setdata (untuk menyetting data atau edit data)
 {
  mysql_query($sql);
 }
 public function getdata($sql)	//mendeklarasikan method : membuat fungsi getdata (mengambil data dari database "latihan")
 {
  return mysql_query($sql);
 }
 public function delete($sql)	//mendeklarasikan method : membuat fungsi delete (menghapus data dari database "latihan")
 {
  mysql_query($sql);
 }
}
?>