<?php session_start();
	include "../system/baglan.php";

	$query = $db->query("SELECT * FROM `faturaOdeme` where tel_no='".$_POST["tel"]."' AND durum=0", PDO::FETCH_ASSOC);
	if ( $query){
		echo '<tr>
	 			<th>Ödenecek Tutar</th>
	 			<th>Son Ödeme Tarihi</th>
	 		</tr>';
	     foreach( $query as $row ){
	         echo '
 				<tr id="kod" kod="'.$row["id"].'">
		 			<td><span id="tutar">'.$row["tutar"].'</span> TL</td>
		 			<td>'.$row["tarih"].'</td>
		 		</tr>';
	     }
	}
 ?>