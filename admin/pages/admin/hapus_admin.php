<?php

$id = $_GET['idhapus'];

$gambar = $koneksi->query("SELECT admin_foto FROM tbl_admin WHERE admin_id='$id'")->fetch_assoc();
$namagambar = $gambar['admin_foto'];
unlink("asset/images/foto_admin/".$namagambar);

$hapus = $koneksi->query("DELETE FROM tbl_admin WHERE admin_id='$id'");

if ($hapus == True){
    echo"<script>
                alert('data berhasil dihapus')
                window.location='?page=pages/admin/view_admin'
              </script>";
}else{
    echo"<script>
                alert('data Gagal dihapus')
                window.location='?page=pages/admin/view_admin'
              </script>";
}


?>