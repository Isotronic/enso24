<?php
/**
 * 
 */
class Client {
	
    // load variables
    
    public $id;
    
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
    public $house_number;                       // hausnummer
    public $postal_code;                        // postleitzahl
    public $city;                               // stadt
    public $contract_partner;                   // vertragspartner
    public $address_type;                       // primäre adresse
    
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
    public $vpID;                               // vertriebspartner nummer
    
    
    
    // standardnetzbetreiber??
    // gas umrechnungsfaktor und brennwert??
    // firmendaten??


    
    
	
	// stammdaten den variablen zuorden
	function setVar($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10)
	{
		$this->k_art=$a2;
		$this->vp_id=$a3;
		$this->erst_datum=time();
		$this->aquise_art=$a4;
		$this->firma=$a5;
		$this->anrede=$a6;
		$this->titel=$a7;
		$this->vorname=$a8;
		$this->nachname=$a9;
		$this->gbdate=$a10;
	}
	
    
    // load data from the database
    function getData($k_id, $i, $id)
    {
        $mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        // kundendaten laden
        if ($i=='1') {
            if($stmt = $mysqli->prepare("SELECT * FROM kundendaten WHERE k_id=?")) {
                $stmt->bind_param('s', $k_id);
                $stmt->execute();
                $stmt->bind_result();
                $stmt->fetch();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        }
    }
    
    
    // save customer details into the database
	function insertDB($step_id) 
	{
        $mysqli = new mysqli("rdbms.strato.de", "U1519108", "lalilu1969", "DB1519108");
        
        // neukunde anlegen
		if($step_id == "1") {
			if($stmt = $mysqli->prepare("INSERT INTO kundendaten (k_art, k_id, vp_id, erst_datum, aquise_art, anrede, titel, vorname, name, geburtsdatum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
				$stmt->bind_param('ssssssssss', $this->k_art, $this->k_id, $this->vp_id, $this->erst_datum, $this->aquise_art, $this->anrede, $this->titel, $this->vorname, $this->nachname, $this->gbdate);
				$stmt->execute();
                $stmt->close();
                if($stmt = $mysqli->prepare("INSERT INTO auftrag (k_id, auftrags_id) VALUES (?, ?)")) {$stmt->bind_param('ss', $this->k_id, $this->auftrags_id); $stmt->execute(); $stmt->close();} 
                    else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
                if($stmt = $mysqli->prepare("INSERT INTO tarifvergleich (k_id) VALUES (?)")) {$stmt->bind_param('s', $this->k_id); $stmt->execute(); $stmt->close();} 
                    else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
                if($stmt = $mysqli->prepare("INSERT INTO tarifwunsch (k_id) VALUES (?)")) {$stmt->bind_param('s', $this->k_id); $stmt->execute(); $stmt->close();} 
                    else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
                if($stmt = $mysqli->prepare("INSERT INTO vertragsdaten (k_id, anbieter_art) VALUES (?, 1)")) {$stmt->bind_param('s', $this->k_id); $stmt->execute(); $stmt->close();} 
                    else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
                    if($stmt = $mysqli->prepare("INSERT INTO vertragsdaten (k_id, anbieter_art) VALUES (?, 2)")) {$stmt->bind_param('s', $this->k_id); $stmt->execute(); $stmt->close();} 
                    else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
			} else {
				echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        
        // kontaktdaten und erste verbrauchsstelle des kunden speichern    
		} elseif ($step_id == "2") {
			if($stmt = $mysqli->prepare("UPDATE kundendaten SET k_adresse=?, k_plz=?, k_ort=?, r_adresse=?, r_plz=?, r_ort=?, telefon=?, fax=?, mobil=?, a_mail=?, r_mail=?, bevorzugter_kontakt=?, tel_erreichbarkeit=? WHERE k_id=?")) {
				$stmt->bind_param('ssssssssssssss', $this->k_adresse, $this->k_plz, $this->k_ort, $this->r_adresse, $this->r_plz, $this->r_ort, $this->tel, $this->fax, $this->mobil, 
				    $this->a_mail, $this->r_mail, $this->b_kontakt, $this->t_erreichbar, $this->k_id);
				$stmt->execute();
				$stmt->close();
				if ($stmt = $mysqli->prepare("INSERT INTO verbrauchsstellen (k_id, l1_vertragsktn, l1_vertragspartner, l1_adresse, l1_plz, l1_ort) VALUES (?, ?, ?, ?, ?, ?)")) {
					$stmt->bind_param('ssssss', $this->k_id, $this->vertragsktn, $this->vertragspartner, $this->k_adresse, $this->k_plz, $this->k_ort);
                    $stmt->execute();
                    $stmt->close();
				} else {
					echo "Prepared Statement Error: %s\n", $mysqli->error;
				}
                if($stmt = $mysqli->prepare("INSERT INTO verbrauchsdaten (k_id, vertrags_ktn) VALUES (?, ?)")) {$stmt->bind_param('ss', $this->k_id, $this->vertragsktn); $stmt->execute(); $stmt->close();} 
                    else {echo "Prepared Statement Error: %s\n", $mysqli->error;}
			} else {
				echo "Prepared Statement Error: %s\n", $mysqli->error;
			}
		
		// bankdaten des kunden speichern	
		} elseif ($step_id == "3") {
			if($stmt = $mysqli->prepare("UPDATE kundendaten SET konto_inhaber=?, konto_nummer=?, blz=?, iban=?, bic=? WHERE k_id=?")) {
				$stmt->bind_param('ssssss', $this->konto_inhaber, $this->konto_nummer, $this->blz, $this->iban, $this->bic, $this->k_id);
				$stmt->execute();
                $stmt->close();
			} else {
				echo "Prepared Statement Error: %s\n", $mysqli->error;
			}
		
		// stammdaten des kunden ändern	
		} elseif($step_id == "4") {
            if($stmt = $mysqli->prepare("UPDATE kundendaten SET k_art=?, anrede=?, titel=?, vorname=?, name=?, geburtsdatum=? WHERE k_id=?")) {
                $stmt->bind_param('sssssss', $this->k_art, $this->anrede, $this->titel, $this->vorname, $this->nachname, $this->gbdate, $this->k_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        
        // weitere verbrauchstellen hinzufügen bzw. vorhandene ändern 
        } elseif($step_id == "5") {
            $q=NULL;
            if($this->liefer=="l1") {$q="UPDATE verbrauchsstellen SET l1_vertragspartner=?, l1_adresse=?, l1_plz=?, l1_ort=?, l1_lage=?, l1_stromz1=?, l1_stromz1_verbrauch=?, l1_stromz1_art=?, l1_stromz2=?, l1_stromz2_verbrauch=?, l1_stromz2_art=?, l1_strom_gv=?, l1_strom_nb=?, l1_gasz=?, l1_gasz_verbrauch=?, l1_gas_gv=?, l1_gas_nb=? WHERE k_id=?";}
            elseif($this->liefer=="l2") {$q="UPDATE verbrauchsstellen SET l2_vertragspartner=?, l2_adresse=?, l2_plz=?, l2_ort=?, l2_lage=?, l2_stromz1=?, l2_stromz1_verbrauch=?, l2_stromz1_art=?, l2_stromz2=?, l2_stromz2_verbrauch=?, l2_stromz2_art=?, l2_strom_gv=?, l2_strom_nb=?, l2_gasz=?, l2_gasz_verbrauch=?, l2_gas_gv=?, l2_gas_nb=? WHERE k_id=?";}
            elseif($this->liefer=="l3") {$q="UPDATE verbrauchsstellen SET l3_vertragspartner=?, l3_adresse=?, l3_plz=?, l3_ort=?, l3_lage=?, l3_stromz1=?, l3_stromz1_verbrauch=?, l3_stromz1_art=?, l3_stromz2=?, l3_stromz2_verbrauch=?, l3_stromz2_art=?, l3_strom_gv=?, l3_strom_nb=?, l3_gasz=?, l3_gasz_verbrauch=?, l3_gas_gv=?, l3_gas_nb=? WHERE k_id=?";}
            elseif($this->liefer=="l4") {$q="UPDATE verbrauchsstellen SET l4_vertragspartner=?, l4_adresse=?, l4_plz=?, l4_ort=?, l4_lage=?, l4_stromz1=?, l4_stromz1_verbrauch=?, l4_stromz1_art=?, l4_stromz2=?, l4_stromz2_verbrauch=?, l4_stromz2_art=?, l4_strom_gv=?, l4_strom_nb=?, l4_gasz=?, l4_gasz_verbrauch=?, l4_gas_gv=?, l4_gas_nb=? WHERE k_id=?";}
            elseif($this->liefer=="l5") {$q="UPDATE verbrauchsstellen SET l5_vertragspartner=?, l5_adresse=?, l5_plz=?, l5_ort=?, l5_lage=?, l5_stromz1=?, l5_stromz1_verbrauch=?, l5_stromz1_art=?, l5_stromz2=?, l5_stromz2_verbrauch=?, l5_stromz2_art=?, l5_strom_gv=?, l5_strom_nb=?, l5_gasz=?, l5_gasz_verbrauch=?, l5_gas_gv=?, l5_gas_nb=? WHERE k_id=?";}
            
            if($stmt = $mysqli->prepare($q)) {
                $stmt->bind_param('ssssssssssssssssss', $this->vertragspartner, $this->adresse, $this->plz, $this->ort, $this->lage, $this->stromz1, 
                    $this->stromz1_verbrauch, $this->stromz1_art, $this->stromz2, $this->stromz2_verbrauch, $this->stromz2_art, $this->strom_gv, $this->strom_nb, $this->gasz, 
                    $this->gasz_verbrauch, $this->gas_gv, $this->gas_nb, $this->k_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        
        // kontaktdaten des kunden ändern  
        } elseif ($step_id == "6") {
            if($stmt = $mysqli->prepare("UPDATE kundendaten SET k_adresse=?, k_plz=?, k_ort=?, r_adresse=?, r_plz=?, r_ort=?, telefon=?, fax=?, mobil=?, a_mail=?, r_mail=?, bevorzugter_kontakt=?, tel_erreichbarkeit=? WHERE k_id=?")) {
                $stmt->bind_param('ssssssssssssss', $this->k_adresse, $this->k_plz, $this->k_ort, $this->r_adresse, $this->r_plz, $this->r_ort, $this->tel, $this->fax, $this->mobil, 
                    $this->a_mail, $this->r_mail, $this->b_kontakt, $this->t_erreichbar, $this->k_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        } elseif ($step_id == "7") {
            if($stmt = $mysqli->prepare("UPDATE verbrauchsdaten SET sz1_zst_von=?, sz1_zst_bis=?, sz1_verbrauch=?, sz1_von=?, sz1_bis=?, sz2_zst_von=?, sz2_zst_bis=?, sz2_verbrauch=?, sz2_von=?, sz2_bis=?, gz_zst_von=?, gz_zst_bis=?, gz_von=?, gz_bis=?, gz_verbrauch=?, gz_brennwert=?, gz_umr_faktor=? WHERE vertrags_ktn=?")) {
                $stmt->bind_param('ssssssssssssssssss', $this->stromz1_dv, $this->stromz1_db, $this->stromz1_zsv, $this->stromz1_zsb, $this->stromz1_kwh, $this->stromz2_dv, $this->stromz2_db, 
                    $this->stromz2_zsv, $this->stromz2_zsb, $this->stromz2_kwh, $this->gas_dv, $this->gas_db, $this->gas_zsv, $this->gas_zsb, $this->gas_verbrauch, $this->gas_brenn, $this->gas_umr, $this->vertragsktn);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        } elseif ($step_id == "8") {
            if($stmt = $mysqli->prepare("UPDATE vertragsdaten SET anbieter_id=?, kunden_nr=?, vertrags_ktn=?, vertrags_nr=?, tarif=?, vtg_beginn=?, erst_vtg_laufzeit=?, auto_verlangerung=?, kund_frist=?, preis_garantie=?, kaution=?, boni=?, zahlungsweise=?, anz_abschlag=?, btrg_abschlag=?, vb_preis_etht=?, vb_preis_nt=?, leistung_preis_kw=?, sz1_grundpreis_m=?, sz1_grundpreis_j=? WHERE k_id=? AND anbieter_art=1")) {
                $stmt->bind_param('sssssssssssssssssssss', $this->anbieter_id, $this->kundennummer, $this->vertragskonto, $this->vertragsnummer, $this->tarif, $this->beginn, $this->laufzeit, 
                    $this->auto, $this->frist, $this->preisgarantie, $this->kaution, $this->boni, $this->zahlart, $this->anzahlabs, $this->betragabs, $this->preisetht, $this->preisnt, $this->preiskw, $this->grundpreism1, $this->grundpreisj1, $this->k_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        } elseif ($step_id == "9") {
            if($stmt = $mysqli->prepare("UPDATE vertragsdaten SET anbieter_id=?, kunden_nr=?, vertrags_ktn=?, vertrags_nr=?, tarif=?, vtg_beginn=?, erst_vtg_laufzeit=?, auto_verlangerung=?, kund_frist=?, preis_garantie=?, kaution=?, boni=?, zahlungsweise=?, anz_abschlag=?, btrg_abschlag=?, vb_preis_etht=?, vb_preis_nt=?, leistung_preis_kw=?, gz_grundpreis_m=?, gz_grundpreis_j=? WHERE k_id=? AND anbieter_art=2")) {
                $stmt->bind_param('sssssssssssssssssssss', $this->anbieter_id, $this->kundennummer, $this->vertragskonto, $this->vertragsnummer, $this->tarif, $this->beginn, $this->laufzeit, 
                    $this->auto, $this->frist, $this->preisgarantie, $this->kaution, $this->boni, $this->zahlart, $this->anzahlabs, $this->betragabs, $this->preisetht, $this->preisnt, $this->preiskw, $this->grundpreism1, $this->grundpreisj1, $this->k_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        } elseif ($step_id == "10") {
            if($stmt = $mysqli->prepare("UPDATE auftrag SET auftrags_id=?, kontrakt_art=?, zustell_art=?, kontakt_aufnahme=?, widerruf_verzicht=?, sonst_vereinbarung=? WHERE k_id=?")) {
                $stmt->bind_param('sssssss', $this->auftrags_id, $this->kontrakt_art, $this->zustell_art, $this->kontakt_aufnahme, $this->widerruf_verzicht, $this->vereinbarung, $this->k_id);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Prepared Statement Error: %s\n", $mysqli->error;
            }
        }
	}
}
?>