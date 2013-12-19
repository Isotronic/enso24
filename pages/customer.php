<?php
// looking at / changing customer data
require_once 'class/client.php';
if (isset($_POST['search_fname'])) {
	$client = new client();
    $client->vorname = $_POST['search_fname'];
    $client->nachname = $_POST['search_lname'];
    $client->getData($k_id, "5", $id);
    $_POST['search_id'] = $client->k_id;
} elseif (isset($_POST['search_adresse'])) {
	$client = new client();
    $client->adresse = $_POST['search_adresse'];
    $client->plz = $_POST['search_plz'];
    $client->getData($k_id, "6", $id);
    $_POST['search_id'] = $client->k_id;
}

if (isset($_POST['search_id']) || isset($_GET['id'])) {
    $search_id = NULL;
    if (isset($_POST['search_id'])) {
        $search_id = $_POST['search_id'];
    } else {
        $search_id = $_GET['id'];
    }
    
<<<<<<< HEAD
    //include "includes/customer-nav.php";
=======
    include "includes/customer-nav.php";
>>>>>>> b605690bda8f29d652a8a7a785f98b26440e670a
    $client = new client();
	if(!isset($_GET['action'])) {
        if ($_GET['b']=="1") {
            $client->setVar1($_POST['k_art'], $_POST['vpid'], $_POST['aquise_art'], $_POST['firma'], $_POST['anrede'], $_POST['titel'], $_POST['vorname'], $_POST['nachname'], $_POST['gbdatum']);
            $client->setVar2($_POST['k_adresse'], $_POST['k_plz'], $_POST['k_ort'], $_POST['r_adresse'], $_POST['r_plz'], $_POST['r_ort'], $_POST['tel'], $_POST['fax'], $_POST['f_tel'], $_POST['f_fax'], 
            $_POST['mobil'], $_POST['a_mail'], $_POST['r_mail'], $_POST['b_kontakt'], $_POST['t_erreichbar'], $search_id);
            $client->setVar3($_POST['konto_inhaber'], $_POST['konto_nummer'], $_POST['blz'], $_POST['iban'], $_POST['bic'], $search_id);
            $client->insertDB("4");
            $client->insertDB("6");
            $client->insertDB("3");
        } elseif ($_GET['b']=="2") {
            if ($_GET['n']=="2") {$client->liefer="l2";} elseif ($_GET['n']=="3") {$client->liefer="l3";} 
                elseif ($_GET['n']=="4") {$client->liefer="l4";} elseif ($_GET['n']=="5") {$client->liefer="l5";} else {$client->liefer="l1";}   
            $client->setVar4($_POST['v_partner'], $_POST['v_adresse'], $_POST['v_plz'], $_POST['v_ort'], $_POST['v_lage'], $_POST['v_sz1n'], $_POST['v_sz1v'], 
                $_POST['v_sz1a'], $_POST['v_sz2n'], $_POST['v_sz2v'], $_POST['v_sz2a'], $_POST['v_sgv'], $_POST['v_snb'], $_POST['v_gzn'], 
                $_POST['v_gzv'], $_POST['v_ggv'], $_POST['v_gnb'], $search_id);
            $client->insertDB("5");
        } elseif ($_GET['b']=="3") {
            $client->setVar5($_POST['vktn'], $_POST['sz1_dv'], $_POST['sz1_db'], $_POST['sz1_zsv'], $_POST['sz1_zsb'], $_POST['sz1_verbrauch'], $_POST['sz2_dv'], $_POST['sz2_db'], $_POST['sz2_zsv'], 
                $_POST['sz2_zsb'], $_POST['sz2_verbrauch'], $_POST['gz_dv'], $_POST['gz_db'], $_POST['gz_zsv'], $_POST['gz_zsb'], $_POST['gz_verbrauch'], $_POST['gz_brenn'], $_POST['gz_umr']);
            $client->insertDB("7");
        } elseif ($_GET['b']=="4") {
            $client->setVar6($_POST['sanbieter'], $_POST['skid'], $_POST['svktn'], $_POST['svid'], $_POST['starif'], $_POST['svbeginn'], $_POST['slaufzeit'], $_POST['sauto'], $_POST['sfrist'], 
                $_POST['sgarantie'], $_POST['skaution'], $_POST['sbonus'], $_POST['szahlart'], $_POST['sanzahl'], $_POST['sbetrag'], $_POST['spreisetht'], $_POST['spreisnt'], $_POST['spreiskw'], $_POST['sgrundpreism'], $_POST['sgrundpreisj'], $search_id);
            $client->insertDB("8");
        } elseif ($_GET['b']=="5") {
            $client->setVar6($_POST['ganbieter'], $_POST['gkid'], $_POST['gvktn'], $_POST['gvid'], $_POST['gtarif'], $_POST['gvbeginn'], $_POST['glaufzeit'], $_POST['gauto'], $_POST['gfrist'], 
                $_POST['ggarantie'], $_POST['gkaution'], $_POST['gbonus'], $_POST['gzahlart'], $_POST['ganzahl'], $_POST['gbetrag'], $_POST['gpreisetht'], $_POST['gpreisnt'], $_POST['gpreiskw'], $_POST['ggrundpreism'], $_POST['ggrundpreisj'], $search_id);
            $client->insertDB("9");
        } elseif ($_GET['b']=="6") {
            $client->setVar7($_POST['auftrag_id'], $_POST['kontrakt_art'], $_POST['zustell_art'], $_POST['kontakt_auf'], $_POST['widerruf_ver'], $_POST['vereinbarung'], $search_id);
            $client->insertDB("10");
        } elseif ($_GET['b']=="7") {
            
        } elseif ($_GET['b']=="8") {
            
        }
        
        include 'pages/customer/ansicht.php';
        
    } else {
        
        if ($_GET['action'] == "stammdaten") {
            include 'pages/customer/stammdaten.php';
        } elseif ($_GET['action'] == "verbrauchsstellen") {
            include 'pages/customer/verbrauchsstellen.php';
        } elseif ($_GET['action'] == "verbrauchsdaten") {
            include 'pages/customer/verbrauchsdaten.php';
        } elseif ($_GET['action'] == "vertragsdaten") {
            include 'pages/customer/vertragsdaten.php';
        } elseif ($_GET['action'] == "auftragsdaten") {
            include 'pages/customer/auftragsdaten.php';
        }
    }
} else {
	echo "
    <div style='float:left; display:inline-block; margin-top:50px; margin-bottom:50px;'>
    <form action='index.php?pid=customer' method='post'>
        Kunden Nummer:<br />
        <input type='text' name='search_id' required='true' maxlength='15' size='20' /><br>
        <input type='button' title='Suchen' value='Suchen' onclick='form.submit()' />
    </form>
    </div>
    <div style='display:inline-block; margin-top:50px; margin-bottom:50px; margin-left:10px;'>
    <form action='index.php?pid=customer' method='post'>
        Kunden Name:<br />
        Vor<input type='text' name='search_fname' required='true' maxlength='80' size='30' /><br>
        Nach<input type='text' name='search_lname' required='true' maxlength='80' size='30' /><br>
        <input type='button' title='Suchen' value='Suchen' onclick='form.submit()' />
    </form>
    </div>
    <div style='display:inline-block; margin-top:50px; margin-bottom:50px; margin-left:10px;'>
    <form action='index.php?pid=customer' method='post'>
        Kunden Adresse:<br />
        Adr<input type='text' name='search_adresse' required='true' maxlength='80' size='30' /><br>
        Plz<input type='text' name='search_plz' required='true' maxlength='5' size='7' /><br>
        <input type='button' title='Suchen' value='Suchen' onclick='form.submit()' />
    </form>
    </div>
    ";
}


?>