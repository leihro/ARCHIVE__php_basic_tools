<?php 
  //Address Class
  class Address {
    //public address
    public $physical_address;

    //extra address
    public $extra_address;

    //post code
    protected $_postcode;

    //city name
    public $city_name;

    //province
    public $province;

    //country name
    public $country_name;

    protected $_address_id;

    protected $_time_created;
    protected $_time_updated;

    //constructor
    function __construct($data = array()){
      $this->_time_created = time();

      //Ensure that the Address can be populated
      if(!is_array($data)){
        trigger_error("Unable to construct address with a " . get_class($name));
      }

      // init the obj
      if(count($data) > 0){
        foreach ($data as $name => $value) {
          if(in_array($name, array('time_created', 'time_updated'))){
            $name = '_' . $name;
          }
          $this->$name = $value;
        }
      }
    } 

    //magic __get
    function __get($name){
      if(!$this->_postcode){
        $this->_postcode = $this->guess_postcode();
      }
      $protected_name = '_' . $name;
      if(property_exists($this, $protected_name)){
        return $this->$protected_name;
      }

      trigger_error("Undefined property via __get: " . $name);
      return NULL;
    }

    //magic __set
    function __set($name, $value){
      if($name == "postcode"){
        $this->$name = $value;
        return;
      }

      trigger_error("Undefined or unallowed property via __set: " . $name);
      return NULL;
    }

    //magic __tostring
    function __toString(){
      return $this->display();
    }

    protected function guess_postcode(){
      return "Guess value from DB";
    }

    public function display(){
      $output = "";
      $output .= $this->physical_address;
      if ($this->extra_address) {
        $output .= ", " . $this->extra_address;
      }
      $output .= "<br>";
      $output .= $this->postcode . ", ";
      $output .= $this->city_name . ", ";
      $output .= $this->province . ", ";
      $output .= $this->country_name;
      return $output;
    }


  }