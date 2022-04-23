<?php

$id = $_GET['idhapus'];

$hapus = $koneksi->query("DELETE FROM tbl_kategori WHERE kategori_id='$id'");
if($hapus == True){
    echo"<script>
    alert('data berhasil dihapus')
    window.location='?page=pages/kategori/view_kategori'
</script>";
}else{
    echo"<script>
    alert('data Gagal dihapus')
    window.location='?page=pages/kategori/view_kategori'
</script>";
}

?>