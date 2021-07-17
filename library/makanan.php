<?php

class makanan{
    public $id_makanan, $nama_makanan, $foto, $deskripsi, $harga, $created_by, $created_date, $modified_by, $modified_date;

    function getAll(){
        include 'config.php';

        $respon['total'] = 0;
        $respon['data'] = [];

        $query_makanan = mysqli_query($koneksi, "SELECT * FROM makanan ORDER BY nama_makanan ASC");
        if(mysqli_num_rows($query_makanan) > 0){
            $respon['total'] = mysqli_num_rows($query_makanan);
            $i = 0;
            while ($data_makanan = mysqli_fetch_assoc($query_makanan)){
                $respon['data'][$i] = $data_makanan;
                $i++;
            }
        }
        return $respon;
    }

    function find($id_makanan){
        include 'config.php';

        $respon = [];

        $query_makanan = mysqli_query($koneksi, "SELECT * FROM makanan WHERE id_makanan=".$id_makanan."");
        if(mysqli_num_rows($query_makanan) > 0){
            $respon['total'] = mysqli_num_rows($query_makanan);
            while ($data_makanan = mysqli_fetch_assoc($query_makanan)){
                $respon = $data_makanan;
            }
        }
        return $respon;
    }

    function create($nama_makanan, $foto, $deskripsi, $harga){
        include 'config.php';

        $respon["status"] = 1;
        $respon["message"] = "";

        if(isset($_SESSION['user_id'])){ // Cek apakah ada sesi login atau tidak, jika tidak tampilkan pesan untuk login dulu
            $id_user = $_SESSION['user_id'];
            $id_role = $_SESSION['user_role'];

            if($id_role == 1){// cek apakah role nya sebagai admin atau bukan , jika admin lanjut, jika bukan tampilkan pesan tidak memiliki akses
                $created_date = Date("Y-m-d H:i:s");
                try{
                    $insert = mysqli_query($koneksi, "INSERT INTO makanan (nama_makanan, foto, deskripsi, harga, created_by, created_date) VALUES(".
                                            "'".$nama_makanan."', ".
                                            "'".$foto."', ".
                                            "'".$deskripsi."', ".
                                            "'".$harga."', ".
                                            "'".$id_user."', ".
                                            "'".$created_date."'".
                                            ")");
                    if($insert){
                        $respon["status"] = 1;
                        $respon["message"] = "Berhasil menambahkan data.";
                    }else{
                        $respon["status"] = 0;
                        $respon["message"] = "Gagal menambahkan data. Pesan Error : Terjadi Kesalahan.";
                    }
                }catch(Exception $e){
                    $respon["status"] = 0;
                    $respon["message"] = "Gagal menambahkan data. Pesan Error : ".$e->getMessage().".";
                }
            }else{
                $respon["status"] = 0;
                $respon["message"] = "Gagal menambahkan data. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai admin.";
            }
        }else{
            $respon["status"] = 0;
            $respon["message"] = "Gagal menambahkan data. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai admin.";
        }

        return $respon;
    }

    function update($id_makanan, $nama_makanan, $foto, $deskripsi, $harga){
        include 'config.php';

        $respon["status"] = 1;
        $respon["message"] = "";

        if(isset($_SESSION['user_id'])){ // Cek apakah ada sesi login atau tidak, jika tidak tampilkan pesan untuk login dulu
            $id_user = $_SESSION['user_id'];
            $id_role = $_SESSION['user_role'];

            if($id_role == 1){// cek apakah role nya sebagai admin atau bukan , jika admin lanjut, jika bukan tampilkan pesan tidak memiliki akses
                $modified_date = Date("Y-m-d H:i:s");
                try{
                    $update = mysqli_query($koneksi, "UPDATE makanan SET ".
                                " nama_makanan='".$nama_makanan."', ".
                                " foto='".$foto."', ".
                                " deskripsi='".$deskripsi."', ".
                                " harga='".$harga."', ".
                                " modified_by='".$id_user."', ".
                                " modified_date='".$modified_date."'".
                                " WHERE id_makanan='".$id_makanan."'");

                    $respon["status"] = 1;
                    $respon["message"] = "Berhasil mengubah data.";
                }catch(Exception $e){
                    $respon["status"] = 0;
                    $respon["message"] = "Gagal mengubah data. Pesan Error : ".$e->getMessage().".";
                }
            }else{
                $respon["status"] = 0;
                $respon["message"] = "Gagal mengubah data. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai admin.";
            }
        }else{
            $respon["status"] = 0;
            $respon["message"] = "Gagal mengubah data. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai admin.";
        }

        return $respon;
    }

    function delete($id_makanan){
        include 'config.php';

        $respon["status"] = 1;
        $respon["message"] = "";

        if(isset($_SESSION['user_id'])){ // Cek apakah ada sesi login atau tidak, jika tidak tampilkan pesan untuk login dulu
            $id_user = $_SESSION['user_id'];
            $id_role = $_SESSION['user_role'];

            if($id_role == 1){// cek apakah role nya sebagai admin atau bukan , jika admin lanjut, jika bukan tampilkan pesan tidak memiliki akses
                $created_date = Date("Y-m-d H:i:s");
                try{
                    $delete = mysqli_query($koneksi, "DELETE FROM makanan WHERE id_makanan='".$id_makanan."'");

                    $respon["status"] = 1;
                    $respon["message"] = "Berhasil menghapus data.";
                }catch(Exception $e){
                    $respon["status"] = 0;
                    $respon["message"] = "Gagal menghapus data. Pesan Error : ".$e->getMessage().".";
                }
            }else{
                $respon["status"] = 0;
                $respon["message"] = "Gagal menghapus data. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai admin.";
            }
        }else{
            $respon["status"] = 0;
            $respon["message"] = "Gagal menghapus data. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai admin.";
        }

        return $respon;
    }
}
?>