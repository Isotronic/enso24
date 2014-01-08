<?php
/**
 * 
 */
class Client {
	
    // load variables
    // client basic info (kundeninfo)
    public $client_id;                          // kundennummer
    public $type;                               // kunden art
    public $start_date;                         // datum wann die person kunde wurde
    public $gender;                             // anrede
    public $title;                              // titel
    public $first_name;                         // vorname
    public $last_name;                          // nachname
    public $birth_date;                         // geburtsdatum
    
    // client contact info (kontaktdaten)
    public $phone;                              // telefonnummer
    public $fax;                                // faxnummer
    public $mobile;                             // handynummer
    public $email;                              // email adresse
    public $contact_method;                     // bevorzugte kontaktart
    public $contact_timing;                     // bevorzugte kontaktzeit
    
    // client address info (adresse)
    public $address_id;                         // vertragskontonummer
    public $street;                             // straße
    public $house_no;                           // hausnummer
    public $postal_code;                        // postleitzahl
    public $city;                               // stadt
    public $contract_partner;                   // vertragspartner
    public $address_type;                       // primäre adresse
    public $address_data;                       // all data for one address (array)
    
    // client bank info (bankdaten)
    public $account_owner;                      // kontoinhaber
    public $iban;                               // iban nummer
    public $bic;                                // bic nummer
    
    // client meter info (zählerinfo)
    public $meter_id;                           // -
    public $meter_type;                         // zählerart
    public $meter_no;                           // zählernummer
    public $reading_date;                       // zähler lesedatum
    public $meter_reading;                      // zählerstand
    
    // client->provider contract (anbieter-vertragsdaten)
    public $customer_no;                        // kundennummer
    public $contract_account_no;                // vertragskontonummer
    public $contract_no;                        // vertragsnummer
    public $contract_start_date;                // vertragsbeginn
    public $contract_period;                    // vertragslaufzeit
    public $contract_cancellation_deadline;     // kündigungsfrist
    public $price_guarantee_period;             // preisgarantie laufzeit
    public $deposit_amount;                     // kautionssumme
    public $bonus_amount;                       // bonussumme
    public $payment_method;                     // zahlungsart
    public $partial_payment_no;                 // anzahl abschläge
    public $amount_per_payment;                 // abschlagssumme
    public $base_unit_price;                    // preis pro kwh (et/ht)
    public $secondary_unit_price;               // preis pro kwh (nt)
    public $high_power_kw_price;                // leistungspreis pro kw
    public $monthly_base_price;                 // grundgebühr
    
    // client order (kontraktinfo)
    public $order_id;                           // vertragsnummer
    public $contract_type;                      // kontrakt art
    public $sending_method;                     // versandmethode von dokumenten
    
    // client private tariff wishes (tarifwunsch analyse für privatkunden)
    public $energy_source_type;                 // energieherkunft
    public $energy_source_details;              // details zur energieherkunft
    public $tariff_type;                        // tarifart
    public $payment_type;                       // zahlungsart
    public $payment_period;                     // zahlungsweise
    public $deposit;                            // kaution
    public $bonus;                              // bonus
    public $package_tariff;                     // packet-tarife
    public $price_guarantee;                    // preisgarantie
    public $preferred_runtime;                  // vertragslaufzeit
    public $usage_calc_tariff;                  // mehr-/minderverbrauchs-tarife
    
    // client adress analysis (bedarfs analyse)
    public $peak_usage;                         // primärer energiebedarf
    public $peak_usage_details;                 // details zum energiebedarf
    public $energy_usage_details;               // details zur energiebenutzung
    public $living_area;                        // wohn-/nutzfläche
    public $no_of_floors;                       // anzahl etagen
    public $new_building;                       // neu- oder altbau
    public $year_built;                         // baujahr
    public $house_or_flat;                      // wohnung oder haus
    public $building_details;                   // gebäude details (frei stehend, DPH usw.)
    public $no_of_people;                       // personenanzahl im haushalt
    public $energy_saving_optimized;            // energetisch saniert
    public $past_energy_usage_change;           // energiebedarf in der vergangenheit geändert
    public $past_details;                       // details dazu
    public $future_energy_usage_change;         // energiebedarf in der zukunft verändert
    public $future_details;                     // details dazu
    public $plan_to_move;                       // aus-/umzug geplant
    public $moving_date;                        // umzugsdatum
    
    // client documents (dokumente des kunden)
    public $document_id;                        // -
    public $file_name;                          // dateiname
    public $file_type;                          // dateiformat
    public $file_size;                          // dateigröße
    public $file_content;                       // dateiinhalt
    public $document_type;                      // art des dokumentes
    
    // provider info (anbieterdaten)
    public $provider_type_id;                   // -
    public $type_name;                          // art des anbieters
    public $provider_id;                        // art des anbieters
    public $provider_name;                      // anbietername
    public $provider_street;                    // anbieteradresse
    public $provider_postal_code;               // anbieter plz
    public $provider_city;                      // anbieter stadt
    public $provider_phone;                     // anbieter telefon
    public $provider_fax;                       // anbieter fax
    public $provider_email;                     // anbieter email
    
    // - (vertriebspartner)
    public $vp_id;                              // vertriebspartner nummer
    // gas umrechnungsfaktor und brennwert??
    // firmendaten??

    private $check1;                             // internal checking variable
    private $check2;                             // internal checking variable
    // load customer related data
    function getClientData($step, $client_id)
    {
        $this->client_id = $client_id;
        //$mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        $mysqli = new mysqli("localhost", "root", "", "db1519108");
        
        // basic
        if ($step == "basic") {
            if($stmt = $mysqli->prepare("SELECT * FROM client_basic_info WHERE client_id=?")) {
                $stmt->bind_param('s', $this->client_id);
                $stmt->execute();
                $stmt->bind_result($this->client_id, $this->type, $this->start_date, $this->gender, $this->title, $this->first_name, $this->last_name, $this->birth_date);
                $stmt->fetch();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        // contact
        } elseif ($step == "contact") {
            if($stmt = $mysqli->prepare("SELECT * FROM client_contact WHERE client_id=?")) {
                $stmt->bind_param('s', $this->client_id);
                $stmt->execute();
                $stmt->bind_result($this->client_id, $this->phone, $this->fax, $this->mobile, $this->email, $this->contact_method, $this->contact_timing);
                $stmt->fetch();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        // address
        } elseif ($step == "address_meter") {
            $i = 0;
            $n = 0;
            $this->address_data = array();
            do {
                $i++;
                if($stmt = $mysqli->prepare("SELECT * FROM client_address WHERE client_id=?")) {
                    $stmt->bind_param('s', $this->client_id);
                    $stmt->execute();
                    $this->check1=$stmt->num_rows;
                    $stmt->bind_result($this->address_id, $this->client_id, $this->street, $this->house_no, $this->postal_code, $this->city, $this->contract_partner, $this->address_type);
                    $stmt->fetch();
                    $stmt->close();
                    $this->address_data[$i] = array($this->address_id, $this->client_id, $this->street, $this->house_no, $this->postal_code, $this->city, $this->contract_partner, $this->address_type);
                    do {
                        if($stmt = $mysqli->prepare("SELECT * FROM client_meter WHERE address_id=?")) {
                            $stmt->bind_param('s', $this->address_id);
                            $stmt->execute();
                            $this->check2=$stmt->num_rows;
                            $stmt->bind_result($this->meter_id, $this->meter_type, $this->meter_no, $this->address_id);
                            $stmt->fetch();
                            $stmt->close();
                        } else { echo "Prepared Statement Error: %s\n", $mysqli->error; }
                    } while ($this->check2 != $n);
                } else {
                    echo "Prepared Statement Error: %s\n", $mysqli->error;
                }
            } while ($this->check1 != $i);
        // bank
        } elseif ($step == "bank") {
            if($stmt = $mysqli->prepare("SELECT * FROM client_bank WHERE client_id=?")) {
                $stmt->bind_param('s', $this->client_id);
                $stmt->execute();
                $stmt->bind_result($this->client_id, $this->account_owner, $this->iban, $this->bic);
                $stmt->fetch();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        // order
        } elseif ($step == "order") {
            if($stmt = $mysqli->prepare("SELECT * FROM client_order WHERE client_id=?")) {
                $stmt->bind_param('s', $this->client_id);
                $stmt->execute();
                $stmt->bind_result($this->order_id, $this->contract_type, $this->client_id, $this->sending_method);
                $stmt->fetch();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        }
    }
    
    // updating client details
    function updateClient($step)
    {
        //$mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        $mysqli = new mysqli("localhost", "root", "", "db1519108");
        
        // updating basic customer details
        if($step == "basic") {
            if($stmt = $mysqli->prepare("UPDATE client_basic_info SET type=?, gender=?, title=?, first_name=?, last_name=? WHERE client_id=?")) {
                $stmt->bind_param('isssss', $this->type, $this->gender, $this->title, $this->first_name, $this->last_name, $this->client_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        
        // updating the contact details    
        } elseif($step == "contact") {
            if($stmt = $mysqli->prepare("UPDATE client_contact SET phone=?, fax=?, mobile=?, email=?, contact_method=?, contact_timing=? WHERE client_id=?")) {
                $stmt->bind_param('sssssss', $this->phone, $this->fax, $this->mobile, $this->email, $this->contact_method, $this->contact_method, $this->client_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        
        // updating the contact details    
        }
    }
    
    // create a new customer
	function newClient($step) 
	{
        //$mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        $mysqli = new mysqli("localhost", "root", "", "db1519108");
        
        // saving basic customer details
		if($step == "basic") {
			if($stmt = $mysqli->prepare("INSERT INTO client_basic_info (client_id, type, gender, title, first_name, last_name, birth_date) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
				$stmt->bind_param('sisssss', $this->client_id, $this->type, $this->gender, $this->title, $this->first_name, $this->last_name, $this->birth_date);
				$stmt->execute();
                $stmt->close();
			} else {
				echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        
        // saving the contact details    
		} elseif ($step == "contact") {
			if($stmt = $mysqli->prepare("INSERT INTO client_contact (client_id, phone, fax, mobile, email, contact_method, contact_timing) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
				$stmt->bind_param('sssssss', $this->client_id, $this->phone, $this->fax, $this->mobile, $this->email, $this->contact_method, $this->contact_method);
				$stmt->execute();
				$stmt->close();
			} else {
				echo "Prepared Statement Error: %s\n", $mysqli->error;
			}
		
		// saving the address and meter details	
		} elseif ($step == "address") {
		    // address table
			if($stmt = $mysqli->prepare("INSERT INTO client_address (address_id, client_id, street, house_no, postal_code, city, contract_partner, address_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
				$stmt->bind_param('ississss', $this->address_id, $this->client_id, $this->street, $this->house_no, $this->postal_code, $this->city, $this->contract_partner, $this->address_type);
				$stmt->execute();
                $stmt->close();
                // address analysis table
                if($stmt = $mysqli->prepare("INSERT INTO client_address_analysis (address_id) VALUES (?)")) {
                    $stmt->bind_param('i', $this->address_id);
                    $stmt->execute();
                    $stmt->close();
                } else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
			} else {
				echo "Prepared Statement Error: %s\n", $mysqli->error;
			}
		
		// saving the bank details	
		} elseif ($step == "meter") {
            // meter table
            if($stmt = $mysqli->prepare("INSERT INTO client_meter (meter_type, meter_no, address_id) VALUES (?, ?, ?)")) {
                $stmt->bind_param('isi', $this->meter_type, $this->meter_no, $this->address_id);
                $stmt->execute();
                $stmt->close();
            } else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
            
        // saving the bank details  
        } elseif($step == "bank") {
            if($stmt = $mysqli->prepare("INSERT INTO client_bank (client_id, account_owner, iban, bic) VALUES (?, ?, ?, ?)")) {
                $stmt->bind_param('ssss', $this->client_id, $this->account_owner, $this->iban, $this->bic);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        
        // saving the order details 
        } elseif($step == "order") {
            if($stmt = $mysqli->prepare("INSERT INTO client_order (order_id, contract_type, client_id, sending_method) VALUES (?, ?, ?, ?)")) {
                $stmt->bind_param('issi', $this->order_id, $this->contract_type, $this->client_id, $this->sending_method);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        }
	}
}
?>