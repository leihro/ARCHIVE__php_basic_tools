<?php 
	interface Strategy {
		public function action();
	}

	class Start implements Strategy {
		public function action() {
			return "start project!";
		}
	}

	class Stop implements Strategy {
		public function action() {
			return "stop it!";
		}
	}
	// client could decide which strategy to use by setting it
	class Client {
		private $strategy;
		public function setStrategy(Strategy $strategy){
			$this->strategy = $strategy;
		}

		public function takeAction(){
			return $this->strategy->action();
		}
	}
 ?>
<html>
<head>
	<title>Strategy</title>
</head>
<body>
	<?php 
		$client = new Client();
		$client->setStrategy(new Start());
		// client needs not to know the implementation of takeAction
		echo $client->takeAction();

		echo "<br>";

		$client->setStrategy(new Stop());
		echo $client->takeAction();
	 ?>
</body>
</html>
