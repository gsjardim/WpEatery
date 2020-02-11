<?php
	class Customer{
		private $customerId;
		private $customerName;
		private $phoneNumber;
                private $emailAddress;
                private $referrer;
		
		function __construct($customerId, $customerName, $phoneNumber, $emailAddress, $referrer){
			$this->setCustomerId($customerId);
			$this->setCustomerName($customerName);
			$this->setPhoneNumber($phoneNumber);
                        $this->setEmailAddress($emailAddress);
                        $this->setReferrer($referrer);
		}
		
		public function getCustomerId(){
			return $this->customerId;
		}
		
		public function setCustomerId($customerId){
			$this->customerId = $customerId;
		}
		
		public function getCustomerName(){
			return $this->customerName;
		}
		
		public function setCustomerName($Name){
			$this->customerName = $Name;
		}
		
		public function getPhoneNumber(){
			return $this->phoneNumber;
		}
		
		public function setPhoneNumber($phone){
			$this->phoneNumber = $phone;
		}
                public function getEmailAddress(){
			return $this->emailAddress;
		}
		
		public function setEmailAddress($email){
			$this->emailAddress = $email;
		}
                public function getReferrer(){
			return $this->referrer;
		}
		
		public function setReferrer($referrer){
			$this->referrer = $referrer;
		}
		
	}
?>