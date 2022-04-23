<?php

$id = $_GET['idhapus'];

$gambar = $koneksi->query("SELECT berita_gambar FROM tbl_berita WHERE berita_id='$id'")->fetch_assoc();
$namagambar = $gambar['berita_gambar'];
unlink("asset/images/foto_berita/".$namagambar);

$hapus = $koneksi->query("DELETE FROM tbl_berita WHERE berita_id='$id'");

if ($hapus == True){
    echo"<script>
    alert('data berhasil dihapus')
    window.location='?page=pages/berita/view_berita'
    </script>";        
}else{
    echo"<script>
    alert('data Gagal dihapus')
    window.location='?page=pages/berita/view_berita'
    </script>";           
}


?>