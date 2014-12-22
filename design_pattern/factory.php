<?php 
	class Auto {
		private $automake;
		private $automodel;

		function __construct($make, $model){
			$this->automake = $make;
			$this->automodel = $model;
		}

		public function show(){
			return $this->automake . " : " . $this->automodel;
		}
	}
	// use factory to create auto
	class AutoFactory {
		public static function createAuto($make, $model){
			return new Auto($make, $model);
		}
	}
 ?>
<html>
<head>
	<title>Factory</title>
</head>
<body>
	<?php 
		$vw = AutoFactory::createAuto("Volkswagen", "Polo");
		$audi = AutoFactory::createAuto("Audi", "A4");
		echo $vw->show();
		echo "<br>";
		echo $audi->show();
	 ?>
</body>
</html>
