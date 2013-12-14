<?php

class Id extends Client {
    
    private $check;
    private $random;
    
    // create IDs
    function createID($a, $vpID)
    {
        $mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        
        // vertragskontonummer generieren
        if ($a == "address") {
            do {
                if($stmt = $mysqli->prepare("")) {
                    $this->random=rand(00000000, 99999999);
                    $stmt->bind_param('s', $this->random);
                    $stmt->execute();
                    $stmt->store_result();
                    $check=$stmt->num_rows;
                    $stmt->close();
                } else {
                    echo "Prepared Statement Error: %s\n", $mysqli->error;
                }
            } while ($this->check > 0);
            $this->addressID=$this->random;
        
        // vertragsnummer generieren    
        } elseif ($a == "order") {
            do {
                if($stmt = $mysqli->prepare("")) {
                    $this->random=rand(0000000000, 9999999999);
                    $stmt->bind_param('s', $this->random);
                    $stmt->execute();
                    $stmt->store_result();
                    $check=$stmt->num_rows;
                    $stmt->close();
                } else {
                    echo "Prepared Statement Error: %s\n", $mysqli->error;
                }
            } while ($this->check > 0);
            $this->orderID=$this->random;
        
        // kundennummer generieren    
        } elseif ($a == "client") {
            do {
                if($stmt = $mysqli->prepare("")) {
                    $this->random=rand(0000, 9999);
                    $stmt->bind_param('s', $this->vpID.$this->random);
                    $stmt->execute();
                    $stmt->store_result();
                    $check=$stmt->num_rows;
                    $stmt->close();
                } else {
                    echo "Prepared Statement Error: %s\n", $mysqli->error;
                }
            } while ($this->check > 0);
            $this->clientID=$this->random;
        }
    }

}


?>