<?php 
  //Address Class
  class Address {
    //public address
    public $physical_address;

    //extra address
    public $extra_address;

    //post code
    public $postcode;

    //city name
    public $city_name;

    //province
    public $province;

    //country name
    public $country_name;

    public function display(){
      $output = "";
      $output .= $this->physical_address;
      if (isset($this->extra_address)) {
        $output .= ", " . $this->extra_address;
      }
      $output .= "<br>";
      $output .= $this->postcode;
      $output .= ", " . $this->city_name;
      $output .= ", " . $this->province;
      $output .= ", " . $this->country_name;
      return $output;
    }
  }