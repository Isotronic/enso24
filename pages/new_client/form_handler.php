<?php 
// adding a new customer
require_once '../../includes/php/client.php';

$client = new client();

$step = $_POST["step"];

if ($step == "basic") {
    $client->type = $_POST["type"];
    $client->vp_id = $_POST["vp_id"];
    $client->title = $_POST["title"];
    $client->first_name = $_POST["first_name"];
    $client->last_name = $_POST["last_name"];
    $client->gender = $_POST["gender"];
    $client->birth_date = $_POST["birth_date"];
    
    $mysqli = new mysqli("localhost", "root", "", "db1519108");
    do {
        if($stmt = $mysqli->prepare("SELECT client_id FROM client_basic_info WHERE client_id=?")) {
            $client->client_id=$client->vp_id.rand(0000, 9999);
            $stmt->bind_param('s', $client->client_id);
            $stmt->execute();
            $stmt->store_result();
            $check=$stmt->num_rows;
            $stmt->close();
        } else {
            echo "Prepared Statement Error: %s\n", $mysqli->error;
        }
    } while ($check > 0);
    
    $client->newClient($step);
	echo $client->client_id.".basic_added";
    
} elseif ($step == "contact") {
    $client->client_id = $_POST["client_id"];
    $client->phone = $_POST["phone"];
    $client->fax = $_POST["fax"];
    $client->mobile = $_POST["mobile"];
    $client->email = $_POST["email"];
    $client->contact_method = $_POST["contact_method"];
    $client->contact_timing = $_POST["contact_timing"];
    
    $client->newClient($step);
	echo $client->client_id.".contact_added";
    
} elseif ($step == "address") {
    for ($i=0; $i <= $address_count; $i++) { 
        do {
            if($stmt = $mysqli->prepare("")) {
                $this->address_id=rand(00000000, 99999999);
                $stmt->bind_param('i', $this->address_id);
                $stmt->execute();
                $stmt->store_result();
                $this->check=$stmt->num_rows;
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        } while ($this->check > 0);
        
        $client->client_id = $_POST["client_id"];
        $client->street = $_POST["street"];
        $client->house_no = $_POST["house_no"];
        $client->postal_code = $_POST["postal_code"];
        $client->city = $_POST["city"];
        $client->contract_partner = $_POST["contract_partner"];
        $client->address_type = $_POST["address_type"];
        $client->newClient($step);
        
        for ($i=0; $i <= $meter_count; $i++) { 
            $client->meter_type = $_POST["meter_type"];
            $client->meter_no = $_POST["meter_no"];
            $client->newClient("meter");
        } 
    }
	echo $client->client_id."address_added";
} elseif ($step == "bank") {
    $client->client_id = $_POST["client_id"];
    $client->account_owner = $_POST["account_owner"];
    $client->iban = $_POST["iban"];
    $client->bic = $_POST["bic"];
    $client->newClient($step);
    
} elseif ($step == "order") {
    $client->contract_type = $_POST["contract_type"];
    $client->client_id = $_POST["client_id"];
    $client->sending_method = $_POST["sending_method"];
    
    do {
        if($stmt = $mysqli->prepare("")) {
            $this->order_id=rand(0000000000, 9999999999);
            $stmt->bind_param('i', $this->order_id);
            $stmt->execute();
            $stmt->store_result();
            $this->check=$stmt->num_rows;
            $stmt->close();
        } else {
            echo "Prepared Statement Error: %s\n", $mysqli->error;
        }
    } while ($this->check > 0);
    
    $client->newClient($step);
}


?>