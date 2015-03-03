<?php

class BranchTableGateway {
   
    private $connection;
    
    public function __construct($c){ 
            $this->connection = $c;
}

public function getBranches() {
        //execute a query to get all Branches
        $sqlQuery = "SELECT * FROM branch";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if(!status){
            die("Could not retrieve managers");
        }
        
        return $statement;
}

public function getBranchbyId($id){
        //execute a query to get the branch with the specified id
        $sqlQuery = "SELECT * FROM managers WHERE id = :id";
        //select query where I specify a WHERE clause
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not retrieve manager");
        }
        
        return $statement;
}

    public function insertBranch($a, $pno, $m, $h){
        $sqlQuery = "INSERT INTO branches ".
                "(Address, PhoneNumber, Manager, Hours) ".
                "VALUES(:Address, :PhoneNumber, :Manager, :Hours)";
                    
    $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Address" => $a,
            "PhoneNumber" => $pno,
            "Manager" => $m,
            "Hours" => $h
        );
        
        $status = $statement->execute($params);
        
        if(!$status){
            die("Could not insert Branch");
        }
        
        $id = $this->connection->lastInsertId();
                
                return $id;
    }
    
    public function deleteManager($id){
        $sqlQuery = "DELETE FROM branches WHERE id = id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
                );
        
      $status = $statement->execute($params);
      
      if(!$status){
          die("Could not delete manager");
      }
      return ($statement->rowCount() == 1);
    }
    
    public function updateBranch($id, $a, $pno, $m, $h){
        $sqlQuery = 
                "UPDATE branches SET ".
                "Address = :Address, ".
                "PhoneNumber = :PhoneNumber".
                "Manager = :Manager" . 
                "Hours = :Hours" . 
                "WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "Address" => $a,
            "PhoneNumber" => $pno,
            "Manager" => $m,
            "Hours" => $h
        );
        
        $status = $statement->execute($params);
        
            return ($statement->rowCount() == 1);
  
        }
    }
            