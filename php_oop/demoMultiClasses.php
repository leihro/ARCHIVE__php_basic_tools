<?php 
  require_once("Address.php");
  require_once("AddressResidence.php");
  require_once("AddressBusiness.php");
  require_once("AddressPark.php");

  $address_residence = new AddressResidence;
  $address_residence->physical_address = "Möllnerstr. 11";
  $address_residence->extra_address = "Haus 2, 23b";
  $address_residence->postcode = "18109";
  $address_residence->city_name = "Rostock";
  $address_residence->province = "MV";
  $address_residence->country_name = "Deutschland";

  
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset ="utf-8">
 </head>
 <body>

  <h3>Park Address: </h3>
  <?php 
    $address_park = new AddressPark(array(
        'physical_address' => 'niulutong',
        'postcode' => '890311',
        'city_name' => 'haidian',
        'province' => 'Beijing',
      ));
    echo $address_park->display();
    echo "<hr>";
   ?>

  <h3>Setting properties of park address: </h3>
  <?php 
    echo "<tt><pre>";
    echo var_export($address_park, TRUE);
    echo "</pre></tt>";
   ?>
  <hr>

 	<h3>Business Address:</h3>
 	<?php 
 		$address_business = new AddressBusiness(array(
 			'physical_address' => 'Jiansheli 8',
 			'postcode' => '066001',
 			'city_name' => 'Qinhuangdao',
 			'province' => 'Hebei',
 			'country_name' => 'China',
 			));
 		echo $address_business;
    echo "<hr>";
 	 ?>
  <h3>Setting properties of business address: </h3>
  <?php 
    echo "<tt><pre>";
    echo var_export($address_business, TRUE);
    echo "</pre></tt>";
   ?>
  <hr>
 	<h3>Residential Address:</h3>
 	<?php  
 		echo $address_residence;
 	?>
 	
  <hr>
 	<h3>Setting properties of residential address: </h3>
 	<?php 
 		echo "<tt><pre>";
 		echo var_export($address_residence, TRUE);
 		echo "</pre></tt>";
 	 ?>


 </body>
 </html>
