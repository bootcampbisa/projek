<?php 
//$koneksi = mysqli_connect("http://103.247.10.166:2082", "gowarmindo", "vE]{HE(gZn=x", "gowarmindo");
//$koneksi = mysqli_connect("103.247.10.166:2082", "gowarmindo_app", "gowarmindo1234", "gowarmindo");
//$koneksi = mysqli_connect("localhost", "gowarmindo", "vE]{HE(gZn=x", "gowarmindo");
$koneksi = mysqli_connect("localhost", "root", "", "gowarmindo");

if(mysqli_connect_errno()){
    echo "Koneksi database gagal. Pesan error : ".mysqli_connect_error();
}
?>