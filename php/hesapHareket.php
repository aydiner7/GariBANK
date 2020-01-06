<?php 
	include '../system/baglan.php';


		$query = $db->query("select * from hesaphareketleri where iban = '".$_POST["iban"]."' or iban2 = '".$_POST["iban"]."' order by id desc", PDO::FETCH_ASSOC);
		if ( $query->rowCount() ){
			echo '<div id="hesapekstrebaslik">
					<div class="ekstrebaslik1">AÇIKLAMA</div>
					<div class="ekstrebaslik2">İŞLEM TARİHİ</div>
					<div class="ekstrebaslik3">MEBLAĞ</div>
					<div class="ekstrebaslik4">BAKİYE</div>
				</div><div id="hesapekstrebilgiler">';
		     foreach( $query as $row ){
		          echo '
						<div class="hesapekstrebilgi">
							<div class="ekstrebilgi1">'.$row["aciklama"].'</div>
							<div class="ekstrebilgi2">'.$row["tarih"].'</div>
							<div class="ekstrebilgi3">';
							if($row["iban"] == $_POST["iban"])
								echo "-";
							echo $row["tutar"].'</div>
							<div class="ekstrebilgi4">';
							if($row["iban"] != $_POST["iban"])
								echo $row["bakiye2"];
							else
								echo $row["bakiye"];
							echo '</div>
						</div>';
		     }
		     echo "</div>";
		}
		else
			echo "<h1 style='text-align:center;'>Bu hesaba ait bir hareket bulunmuyor.</h1>";


	 ?>
</div>