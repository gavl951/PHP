<?php
class Customer {
    private $id;
    private $Name;
    private $Address;
    private $Mobile;
    private $Email;
    private $StaffNum;

    
    public function __construct($id, $n, $a, $m, $e, $sn) { // constructor
        $this->id = $id;
        $this->Name = $n;
        $this->Address = $a;
        $this->Mobile = $m;
        $this->Email = $e;
        $this->StaffNum = $sn;

    }
    
    public function getid() { return $this->id; } // get and set methods
    public function getName() { return $this->Name; }
    public function getAddress() { return $this->Address; }
    public function getMobile() { return $this->Mobile; }
    public function getEmail() { return $this->Email; }
    public function getStaffNum() { return $this->StaffNum; }

}
