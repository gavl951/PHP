<?php

class CustomerTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c; 
    }

    public function getCustomers() { 
        // execute a query to get all customers
        $sqlQuery = "SELECT * FROM customers";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
    }

    public function getCustomerById($id) { 
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM customers WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }

    public function insertCustomer($n, $a, $m, $e, $sn, $bno) {
        $sqlQuery = "INSERT INTO customers " .
                "(Name, Address, Mobile, Email, StaffNum, BranchNo) " .
                "VALUES (:Name, :Address, :Mobile, :Email, :StaffNum, :BranchNo)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Name" => $n,
            "Address" => $a,
            "Mobile" => $m,
            "Email" => $e,
            "StaffNum" => $sn,
            "BranchNo" => $bno,
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert user");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteCustomer($id) {
        $sqlQuery = "DELETE FROM customers WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateCustomer($id, $n, $a, $m, $e, $sn, $bno) {
        $sqlQuery =
                "UPDATE customers SET " .
                "Name = :Name, " .
                "Address = :Address, " .
                "Mobile = :Mobile, " .
                "Email = :Email, " .
                "StaffNum = :StaffNum, " .
                "BranchNo = :BranchNo " .
                "WHERE id = :id";


        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "Name" => $n,
            "Address" => $a,
            "Mobile" => $m,
            "Email" => $e,
            "StaffNum" => $sn,
            "BranchNo" => $bno
        );

        //echo '<pre>';
        //print_r($sqlQuery);
        //echo '</pre>';
        
        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}