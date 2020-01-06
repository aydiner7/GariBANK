<?php session_start();
include '../system/baglan.php'; ?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="system/hesapstyle.css">

	<title>Hesaplar</title>
</head>
<body>

<table class="demo">
	<caption></th>
		<th>Hesap Adı</th>
		<th>Iban</th>
		<th>Bakiye</th>
	</tr>
	</thead>
	<tbody>
	

<?php 

	$query = $db->query("SELECT * FROM musteri,hesaplar WHERE hesaplar.musteri_id = musteri.id AND musteri.tc = '{$_SESSION["tc"]}'", PDO::FETCH_ASSOC);
	if ( $query->rowCount() ){
	     foreach( $query as $row ){
	          echo '<tr >
					<tr >
						<td rowspan="2"><i class="fas fa-id-card tcolor"></i>'.$row['hesap_adi'].'</td>
						<td rowspan="2"><div class="boxed2"><i class="fas fa-money-check tcolor"></i>'.$row['iban'].'</div> <div class="boxed"><p>Hesap Detayı </p><p>Hesap Hareketleri</p></div> </td>
						
						<td rowspan="2">'.$row['tutar'].' ₺<i class="fas fa-lira-sign tcolor"></i>

				</td>';
	     }
	}

 ?>

</tbody>
</table>
</body>
</html>

