<?php 

class AddressPark extends Address {

	public $country_name = "China";

	//override the parent display method
	public function display() {
		$output = '<div style = "background-color : PaleGreen;">';
		$output .= parent::display();
		$output .= '</div>';
		return $output;
	}

	protected function _init(){
		$this->_setAddressTypeId(Address::ADDRESS_TYPE_PARK);
	}
}