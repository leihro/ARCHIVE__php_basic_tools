<?php 
	class Singleton {
		//prevent construct, clone, unserialize
		public static function getInstance(){
			static $instance = null;
			if(null === $instance){
				// an instance of 'Singleton' late binding
				$instance = new static();
			}
			return $instance;
		}

		protected function __construct(){}

		private function __clone(){}

		private function __wakeup(){}
	}

 ?>
<html>
<head>
	<title>Singleton</title>
</head>
<body>
	<?php 
		$instance = Singleton::getInstance();
		var_dump($instance === Singleton::getInstance());
	 ?>
</body>
</html>
