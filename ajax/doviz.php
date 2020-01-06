
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="system/dovizstyle.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
	<title>Anlık Döviz</title>
</head>
<body>
	<?php  
include("anlik.php");

 

?>
<form action="anlik.php" method="post">
	<table class="ana">

	<caption></th>
		<th>Para</th>
		<th>Alış </th>
		<th>Satış</th>
	</tr>
	</thead>
	<tbody>
	<tr >
	<tr >
		<td ><i class="fas fa-dollar-sign tcolor"></i>Dolar</td>
		<td><?php  echo ''.$usd_buying.'<br>';

?>



 <i class="fas fa-arrow-circle-up"></i></td>
		<td >	<?php  


echo ''.$usd_selling.'<br>';


?></td>

</td>
<tr>
	<td><i class="fas fa-euro-sign"></i>Euro</td>
		<td><?php  
 
echo ''.$euro_buying.'<br>';

?>
<i class="fas fa-arrow-circle-up"></i></td>
		<td ><?php  
 
echo ''.$euro_selling.'<br>';

?></td>
<tr>


<td ><i class="fas fa-pound-sign"></i>İngiliz Sterlini</td>
		<td ><?php  

    echo ''.$sterlin_buying.'<br>';

?><i class="fas fa-arrow-circle-up"></i></td>
		<td ><?php  
echo ''.$sterlin_selling.'<br>';

?></td>
<tr>

	<td ><i class="fas fa-ruble-sign"></i>Ruble</td>
		<td ><?php 

 
echo ''.$ruble_buying.'<br>';

?> <i class="fas fa-arrow-circle-up"></i></td>
		<td ><?php  
echo ''.$ruble_selling.'<br>'; ?></td>
		


</form>

</tbody>
</table>


</body>
</html>