<?php 
  require_once("Address.php");

  $address = new Address;
  $address->physical_address = "Möllnerstr. 11";
  $address->extra_address = "Haus 2, 23b";
  $address->postcode = "18109";
  $address->city_name = "Rostock";
  $address->province = "MV";
  $address->country_name = "Deutschland";

  
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset ="utf-8">
 </head>
 <body>

 	<h3>Testing Constructor</h3>
 	<?php 
 		$address2 = new Address(array(
 			'physical_address' => 'Jiansheli 8',
 			'postcode' => '066001',
 			'city_name' => 'Qinhuangdao',
 			'province' => 'Hebei',
 			'country_name' => 'China',
 			));
 		echo $address2;
 	 ?>

 	<h3>Testing magic __set and __get</h3>
 	<?php  
 		unset($address->postcode);
 		echo $address->display(); 
 	?>
 	<br>

 	<h3>display address</h3>
 	<?php  
 		$address->postcode = 18109;
 		echo $address->display(); 
 	?>
 	<br>

 	<h3>dump all vars in address obj</h3>
 	<?php 
 		echo "<tt><pre>";
 		echo var_export($address, TRUE);
 		echo "</pre></tt>";
 	 ?>
 </body>
 </html>
