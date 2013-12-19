<?php
<<<<<<< HEAD
// class to handle everything to do with IDs
=======

>>>>>>> b605690bda8f29d652a8a7a785f98b26440e670a
class Id extends Client {
    
    private $check;             // -
    private $random;            // -
    
<<<<<<< HEAD
    // generate the IDs
=======
    // create IDs
>>>>>>> b605690bda8f29d652a8a7a785f98b26440e670a
    function generateId($step)
    {
        $mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        
<<<<<<< HEAD
        // generate address_id
=======
        // vertragskontonummer generieren
>>>>>>> b605690bda8f29d652a8a7a785f98b26440e670a
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
        
<<<<<<< HEAD
        // generate order_id    
=======
        // vertragsnummer generieren    
>>>>>>> b605690bda8f29d652a8a7a785f98b26440e670a
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
        
<<<<<<< HEAD
        // generate client_id    
=======
        // kundennummer generieren    
>>>>>>> b605690bda8f29d652a8a7a785f98b26440e670a
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