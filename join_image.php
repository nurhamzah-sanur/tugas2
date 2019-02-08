<?php
 
 
if( isset( $_POST['submit'] ) ){
 
//menentukan file gambar
$gambar_satu = $_FILES['upfile_1']['tmp_name'];
$gambar_dua  = $_FILES['upfile_2']['tmp_name'];
 
//mendekode gambar
$o_gambar_satu    = imagecreatefromjpeg( $gambar_satu );
$o_gambar_dua     = imagecreatefromjpeg( $gambar_dua );
 
//ngambil ukuran gambar dua
$o_gambar_duaX = imagesx( $o_gambar_dua );
$o_gambar_duaY = imagesy( $o_gambar_dua );
 
//melakukan merging $filedekode1, $filedekode2, koordinat kiri, koordinat atas, jarak geser kiri, jarak geser kanan, koordinat kanan, koordinat bawah, persen transparansi
 
imagecopymerge( $o_gambar_satu, $o_gambar_dua, 50, 100, 0, 0, $o_gambar_duaX, $o_gambar_duaY, 70 );
 
 
 
//Output
header( 'Content-type: image/png' );
imagepng( $o_gambar_satu );
imagedestroy( $o_gambar_satu );
}
 
 
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="upfile_1"><br /><input type="file" name="upfile_2"><br /><input type="submit" name="submit" value="upload">
</form>