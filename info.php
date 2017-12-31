<?php
	//this class contains all the informations accumulated during the session
	class info
		{
			private $_cars;
			private $_nbr_passengers;
			private $_insurance;
			//array containing the firstname, lastname and age of every passengers
			private $_list_personal_info;	
			private $_iter;
			private $_price;

			public function __construct()
			{
				$this->_cars = "";
				$this->_nbr_passengers = 0;
				$this->_insurance;
				$this->_list_personal_info = [];
				$this->_iter = 1;
				$this->_price = 0;		
			}
			
			public function set_cars($cars)
			{
				$this->_cars = $cars;
			}

			public function get_cars()
			{
				return $this->_cars;
			}
		
			public function set_nbr_passengers($nbr_passengers)
			{
				$this->_nbr_passengers = $nbr_passengers;
			}

			public function get_nbr_passengers()
			{
				return $this->_nbr_passengers;
			}
		
			public function set_insurance($insurance)
			{
				$this->_insurance = $insurance;
			}

			public function get_insurance()
			{
				return $this->_insurance;
			}
		
			public function set_personal_info($list,$iter)
			{
				$this->_list_personal_info[$iter] = $list;
			}

			public function get_personal_info()
			{
				return $this->_list_personal_info;
			}
			
			public function set_price($price)
			{
				$this->_price = $price;
			}

			//get the total price of the reservation based on the age and the cancelation insurance
			public function get_price()
			{
				$this->_price = 0;
				foreach ($this->_list_personal_info as $info)
				{
					if ($info[2] <= 8)
					{
						$this->_price += 25;
					}
					else
					{
						$this->_price += 20;
					}
				}
				if ($this->_insurance == true)
				{
					$this->_price += 15;
				}
				return $this->_price;
			}
			
			public function get_iter()
			{
				return $this->_iter;
			}
								
			public function up_iter()
			{
				$this->_iter += 1;
			}
						
			public function reset_iter()
			{
				$this->_iter = 1;
			}
			// check if at least on passanger is major
			public function is_major()
			{
				foreach ($this->_list_personal_info as $info)
				{
					if ($info[2] >= 18)
					{
						return true;
					}
				}
				return false;
			}									
	}
?>