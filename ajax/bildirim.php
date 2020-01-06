<?php session_start();
	include 'system/baglan.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Bildirimler</title>
	<link href="system/bildirim.css" rel="stylesheet">

</head>
<body>
	<table id="tasarım">

<!--<tr>
<td><blockquote id="danger">
<a id="close" title="Close"  href="#" onClick="document.getElementById('danger').setAttribute('style','opacity:0; visibility:hidden;');">&times;</a>
<span>Dikkat!</span> Bu bir hata mesajıdır.
</blockquote>
</td>

</tr>
<tr>
<td><blockquote id="warning">
<a id="close" title="Close"  href="#" onClick="document.getElementById('warning').setAttribute('style','opacity:0; visibility:hidden;');">&times;</a>
<span>Uyarı!</span> Bu bir uyarı mesajıdır.
</blockquote></td>

</tr>
<tr>
<td><blockquote id="info">
<a id="close" title="Close"  href="#" onClick="document.getElementById('info').setAttribute('style','opacity:0; visibility:hidden;');">&times;</a>
<span>Bilgi!</span> Bu bir bilgi mesajıdır.
</blockquote>
</td>



</tr>-->

<?php 
	$id = 0;
	$kisi = $db->query("select * from musteri where tc='".$_SESSION["tc"]."'")->fetch(PDO::FETCH_ASSOC);
	if($kisi)
	{
		$id = $kisi["id"];
	}
	$query = $db->query("SELECT * FROM bildirimler where musteri_id=".$id." order by tarih desc", PDO::FETCH_ASSOC);
	if ( $query->rowCount() ){
	     foreach( $query as $row ){
	          echo '<tr>
						<td><blockquote id="warning">'.$row["bildirim"].'
						</blockquote></td>

					</tr>';
	     }
	}
	else
	{
		echo '<tr>
						<td><blockquote id="warning">
						<span>Uyarı!</span> Bildiriminiz bulumuyor
						</blockquote></td>

					</tr>';
	}

 ?>


</table>

	
</body>
</html>
