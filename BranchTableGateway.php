<?php

class BranchTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c; 
    }

    public function getBranches() { 
        // execute a query to get all branches
        $sqlQuery = "SELECT * FROM branches";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve branches");
        }

        return $statement;
    }

    public function getBranchById($id) { 
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM branches WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve branches");
        }

        return $statement;
    }

    public function insertBranch($a, $pn, $m, $h, $bno) {
        $sqlQuery = "INSERT INTO branches " .
                "(Address, PhoneNumber, Manager, Hours, BranchNo) " .
                "VALUES (:Address, :PhoneNumber, :Manager, :Hours, :BranchNo)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Address" => $a,
            "PhoneNumber" => $pn,
            "Manager" => $m,
            "Hours" => $h,
            "BranchNo" => $bno
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert branch");
        }

        $id = $this->connection->lastInsertid();

        return $id;
    }

    public function deleteBranch($id) {
        $sqlQuery = "DELETE FROM branches WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete branch");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateBranch($id, $a, $pn, $m, $h, $bno) {
        $sqlQuery =
                "UPDATE branches SET " .
                "Address = :Address, " .
                "PhoneNumber = :PhoneNumber, " .
                "Manager = :Manager, " .
                "Hours = :Hours, " .
                "BranchNo = :BranchNo " .
                "WHERE id = :id";


        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "Address" => $a,
            "PhoneNumber" => $pn,
            "Manager" => $m,
            "Hours" => $h,
            "BranchNo" => $bno
        );

        //echo '<pre>';
        //print_r($sqlQuery);
        //echo '</pre>';
        
        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}