<?php

class testimoni{
    public $id_testimoni, $deskripsi, $id_user, $waktu;

    function getAll(){
        include 'config.php';

        $respon['total'] = 0;
        $respon['data'] = [];

        $query_testimoni = mysqli_query($koneksi, "SELECT t.*, u.nama FROM testimoni AS t LEFT JOIN user AS u ON t.id_user = u.id_user ORDER BY waktu DESC");
        if(mysqli_num_rows($query_testimoni) > 0){
            $respon['total'] = mysqli_num_rows($query_testimoni);
            $i = 0;
            while ($data_testimoni = mysqli_fetch_assoc($query_testimoni)){
                $respon['data'][$i] = $data_testimoni;
                $i++;
            }
        }
        return $respon;
    }

    function find($id_testimoni){
        include 'config.php';

        $respon = [];

        $query_testimoni = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE id_testimoni=".$id_testimoni."");
        if(mysqli_num_rows($query_testimoni) > 0){
            $respon['total'] = mysqli_num_rows($query_testimoni);
            while ($data_testimoni = mysqli_fetch_assoc($query_testimoni)){
                $respon = $data_testimoni;
            }
        }
        return $respon;
    }

    function create($id_user, $deskripsi){
        include 'config.php';

        $respon["status"] = 1;
        $respon["message"] = "";

        if(isset($_SESSION['user_id'])){ // Cek apakah ada sesi login atau tidak, jika tidak tampilkan pesan untuk login dulu
            $id_user = $_SESSION['user_id'];
            $id_role = $_SESSION['user_role'];

            if($id_role == 2){// cek apakah role nya sebagai pengunjung atau bukan , jika pengunjung lanjut, jika bukan tampilkan pesan tidak memiliki akses
                $waktu = Date("Y-m-d H:i:s");
                try{
                    $insert = mysqli_query($koneksi, "INSERT INTO testimoni (id_user, deskripsi, waktu) VALUES(".
                                            "'".$id_user."', ".
                                            "'".$deskripsi."', ".
                                            "'".$waktu."'".
                                            ")");
                    if($insert){
                        $respon["status"] = 1;
                        $respon["message"] = "Berhasil menambahkan testimoni.";
                    }else{
                        $respon["status"] = 0;
                        $respon["message"] = "Gagal menambahkan testimoni. Pesan Error : Terjadi Kesalahan.";
                    }
                }catch(Exception $e){
                    $respon["status"] = 0;
                    $respon["message"] = "Gagal menambahkan testimoni. Pesan Error : ".$e->getMessage().".";
                }
            }else{
                $respon["status"] = 0;
                $respon["message"] = "Gagal menambahkan testimoni. Anda tidak memiliki akses untuk testimoni. Silahkan login terlebih dahulu sebagai pengunjung ini.";
            }
        }else{
            $respon["status"] = 0;
            $respon["message"] = "Gagal menambahkan testimoni. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai pengunjung.";
        }

        return $respon;
    }

    function update($id_testimoni, $id_user, $deskripsi){
        include 'config.php';

        $respon["status"] = 1;
        $respon["message"] = "";

        if(isset($_SESSION['user_id'])){ // Cek apakah ada sesi login atau tidak, jika tidak tampilkan pesan untuk login dulu
            $id_user_session = $_SESSION['user_id'];
            $id_role = $_SESSION['user_role'];

            if($id_role == 2 && $id_user == $id_user_session){// cek apakah role nya sebagai pengunjung atau bukan , jika pengunjung lanjut, jika bukan tampilkan pesan tidak memiliki akses
                $modified_date = Date("Y-m-d H:i:s");
                try{
                    $update = mysqli_query($koneksi, "UPDATE testimoni SET ".
                                " deskripsi='".$deskripsi."'".
                                " WHERE id_testimoni='".$id_testimoni."'");

                    $respon["status"] = 1;
                    $respon["message"] = "Berhasil mengubah testimoni.";
                }catch(Exception $e){
                    $respon["status"] = 0;
                    $respon["message"] = "Gagal mengubah testimoni. Pesan Error : ".$e->getMessage().".";
                }
            }else{
                $respon["status"] = 0;
                $respon["message"] = "Gagal mengubah testimoni. Anda tidak memiliki akses untuk testimoni ini. Silahkan login terlebih dahulu sebagai pengunjung ini.";
            }
        }else{
            $respon["status"] = 0;
            $respon["message"] = "Gagal mengubah testimoni. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai pengunjung.";
        }

        return $respon;
    }

    function delete($id_testimoni, $id_user){
        include 'config.php';

        $respon["status"] = 1;
        $respon["message"] = "";

        if(isset($_SESSION['user_id'])){ // Cek apakah ada sesi login atau tidak, jika tidak tampilkan pesan untuk login dulu
            $id_user_session = $_SESSION['user_id'];
            $id_role = $_SESSION['user_role'];

            if($id_role == 2 && $id_user == $id_user_session){// cek apakah role nya sebagai pengunjung atau bukan , jika pengunjung lanjut, jika bukan tampilkan pesan tidak memiliki akses
                $created_date = Date("Y-m-d H:i:s");
                try{
                    $delete = mysqli_query($koneksi, "DELETE FROM testimoni WHERE id_testimoni='".$id_testimoni."'");

                    $respon["status"] = 1;
                    $respon["message"] = "Berhasil menghapus testimoni.";
                }catch(Exception $e){
                    $respon["status"] = 0;
                    $respon["message"] = "Gagal menghapus testimoni. Pesan Error : ".$e->getMessage().".";
                }
            }else{
                $respon["status"] = 0;
                $respon["message"] = "Gagal menghapus testimoni. Anda tidak memiliki akses untuk testimoni ini. Silahkan login terlebih dahulu sebagai pengunjung ini.";
            }
        }else{
            $respon["status"] = 0;
            $respon["message"] = "Gagal menghapus testimoni. Anda belum login atau sesi telah berakhir. Silahkan login terlebih dahulu sebagai pengunjung.";
        }

        return $respon;
    }
}
?>