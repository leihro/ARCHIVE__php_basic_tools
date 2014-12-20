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
 	<?php  echo $address->display(); ?>
 </body>
 </html>
