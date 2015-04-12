<?php
class Branch {
    private $id;
    private $Address;
    private $PhoneNumber;
    private $Manager;
    private $Hours;
    private $BranchNo;

    
    public function __construct($id, $a, $pn, $m, $h, $bno) { // constructor
        $this->id = $id;
        $this->Address = $a;
        $this->PhoneNumber = $pn;
        $this->Manager = $m;
        $this->Hours = $h;
        $this->BranchNo = $bno;
    }
    
    public function getid() { return $this->id; } // get and set methods
    public function getAddress() { return $this->Address; }
    public function getPhoneNumber() { return $this->PhoneNumber; }
    public function getManager() { return $this->Manager; }
    public function getHours() { return $this->Hours; }
    public function getBranchNo() { return $this->BranchNo; }

}
