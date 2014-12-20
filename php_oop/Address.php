<?php 

  require_once "Model.php";
  //Address Class

  
  abstract class Address implements Model{
    const ADDRESS_TYPE_RESIDENCE = 1;
    const ADDRESS_TYPE_BUSINESS = 2;
    const ADDRESS_TYPE_PARK = 3;

    //valid address type
    public static $valid_address_types = array(
      Address::ADDRESS_TYPE_RESIDENCE => 'residence',
      Address::ADDRESS_TYPE_BUSINESS => 'business',
      Address::ADDRESS_TYPE_PARK => 'park',
      );

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

    protected $_address_type_id;
    protected $_address_id;

    protected $_time_created;
    protected $_time_updated;

    //constructor
    function __construct($data = array()){
      $this->_init();
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
        $this->_postcode = $this->_guess_postcode();
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
      //set postcode value
      if($name == "postcode"){
        $this->$name = $value;
        return;
      }

      trigger_error("Undefined or unallowed property via __set: " . $name);
    }

    protected function _setAddressTypeId($address_type_id){
      if(self::isValidAddressTypeId($address_type_id)){
        $this->_address_type_id = $address_type_id;
      }
    }

    protected function _guess_postcode(){
      return "Guess value from DB";
    }

    //check if address type id is valid
    public static function isValidAddressTypeId($address_type_id){
      return array_key_exists($address_type_id, self::$valid_address_types);
    }

    protected abstract function _init();

    final public static function load($address_id){

    } 

    final public function save(){

    }

    //display address
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

    //magic __tostring
    function __toString(){
      return $this->display();
    }
  }