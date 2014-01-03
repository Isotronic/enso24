<?php

// class to handle everything to do with IDs
class Id extends Client {
    
    private $check;             // -
    private $random;            // -
    
    // generate the IDs
    function generateId($step)
    {
        //$mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        $mysqli = new mysqli("localhost", "root", "", "db1519108");
        
        // generate address_id
        if ($step == "address") {
            do {
                if($stmt = $mysqli->prepare("")) {
                    $this->random=rand(00000000, 99999999);
                    $stmt->bind_param('s', $this->random);
                    $stmt->execute();
                    $stmt->store_result();
                    $this->check=$stmt->num_rows;
                    $stmt->close();
                } else {
                    echo "Prepared Statement Error: %s\n", $mysqli->error;
                }
            } while ($this->check > 0);
            $this->address_id=$this->random;
        
        // generate order_id    
        } elseif ($step == "order") {
            do {
                if($stmt = $mysqli->prepare("")) {
                    $this->random=rand(0000000000, 9999999999);
                    $stmt->bind_param('s', $this->random);
                    $stmt->execute();
                    $stmt->store_result();
                    $this->check=$stmt->num_rows;
                    $stmt->close();
                } else {
                    echo "Prepared Statement Error: %s\n", $mysqli->error;
                }
            } while ($this->check > 0);
            $this->order_id=$this->random;
        
        // generate client_id    
        } elseif ($step == "client") {
            do {
                if($stmt = $mysqli->prepare("")) {
                    $this->random=$this->vp_id.rand(0000, 9999);
                    $stmt->bind_param('s', $this->random);
                    $stmt->execute();
                    $stmt->store_result();
                    $this->check=$stmt->num_rows;
                    $stmt->close();
                } else {
                    echo "Prepared Statement Error: %s\n", $mysqli->error;
                }
            } while ($this->check > 0);
            $this->client_id=$this->random;
        }
    }

}


?>