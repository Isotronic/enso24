<?php
if ($_GET['b']=="2") {
    if ($_GET['n']=="2") {$client->liefer="l2";} elseif ($_GET['n']=="3") {$client->liefer="l3";} 
        elseif ($_GET['n']=="4") {$client->liefer="l4";} elseif ($_GET['n']=="5") {$client->liefer="l5";} else {$client->liefer="l1";}
    $client->setVar4($_POST['v_partner'], $_POST['v_adresse'], $_POST['v_plz'], $_POST['v_ort'], $_POST['v_lage'], $_POST['v_sz1n'], $_POST['v_sz1v'], 
        $_POST['v_sz1a'], $_POST['v_sz2n'], $_POST['v_sz2v'], $_POST['v_sz2a'], $_POST['v_sgv'], $_POST['v_snb'], $_POST['v_gzn'], 
        $_POST['v_gzv'], $_POST['v_ggv'], $_POST['v_gnb'], $search_id);
    $client->insertDB("5");
} 

if ($_GET['n']=="1") {$client->liefer="l2";} elseif ($_GET['n']=="2") {$client->liefer="l3";} 
    elseif ($_GET['n']=="3") {$client->liefer="l4";} elseif ($_GET['n']=="4") {$client->liefer="l5";} else {$client->liefer="l1";}
$client->getData($search_id, "2", "-");

if (!isset($_POST['weitere_vb'])) {
    $weitere_vb="1";
    $schritt="&action=verbrauchsstellen&b=2&n=1";
} elseif ($_POST['weitere_vb']=="1") {
    $schritt="&action=verbrauchsstellen&b=2&n=2";
    $weitere_vb="2";
} elseif ($_POST['weitere_vb']=="2") {
    $schritt="&action=verbrauchsstellen&b=2&n=3";
    $weitere_vb="3";
} elseif ($_POST['weitere_vb']=="3") {
    $schritt="&action=verbrauchsstellen&b=2&n=4";
    $weitere_vb="4";
} elseif ($_POST['weitere_vb']=="4") {
    $schritt="&action=verbrauchsstellen&b=2&n=5";
    $weitere_vb="5";
}elseif ($_POST['weitere_vb']=="0") {
    header("Location: index.php?pid=bestandskunden&id=".$search_id);
}
if ($_GET['n'] < "6") {
    
    echo "
    <form action='index.php?pid=customer".$schritt."' method='post'>
        <table align='left'>
        <tr><td><strong>Verbrauchsstelle ".$weitere_vb."</strong></td><td></td></tr>
        <tr><td>Vertragskontonummer:</td><td>".$client->vertragsktn."</td></tr>
        <tr><td>Vertragspartner: </td><td><input type='text' maxlength='50' name='v_partner' value='".$client->vertragspartner."'></td></tr>
        <tr><td>Straße und Hausnummer: </td><td><input type='text' maxlength='70' name='v_adresse' value='".$client->adresse."'></td></tr>
        <tr><td>Postleitzahl: </td><td><input type='text' maxlength='5' name='v_plz' size='7' value='".$client->plz."'></td></tr>
        <tr><td>Ort: </td><td><input type='text' maxlength='40' name='v_ort' value='".$client->ort."'></td></tr>
        <tr><td>Lage: </td><td><input type='text' maxlength='30' name='v_lage' value='".$client->lage."'></td></tr>
        <tr><td>Strom GV: </td><td><input type='text' maxlength=30' name='v_sgv' value='".$client->strom_gv."'></td></tr> 
        <tr><td>Strom NB: </td><td><input type='text' maxlength=30' name='v_snb' value='".$client->strom_nb."'></td></tr>
        <tr><td>Gas GV: </td><td><input type='text' maxlength=30' name='v_ggv' value='".$client->gas_gv."'></td></tr>
        <tr><td>Gas NB: </td><td><input type='text' maxlength=30' name='v_gnb' value='".$client->gas_nb."'></td></tr>
        <tr><td><br></td><td></td></tr>
        
        <tr><td><strong>Strom 1</strong></td><td></td></tr>
        <tr><td>Zählernummer: </td><td><input type='text' maxlength='15' name='v_sz1n' value='".$client->stromz1."'></td></tr>
        <tr><td>Zählerstand: </td><td><input type='text' maxlength='15' name='v_sz1v' value='".$client->stromz1_verbrauch."'></td></tr>
        <tr><td>Zählerart: </td><td><input type='text' maxlength='15' name='v_sz1a' value='".$client->stromz1_art."'></td></tr>
        <tr><td><br></td><td></td></tr>
        
        <tr><td><strong>Strom 2</strong></td><td></td></tr>
        <tr><td>Zählernummer: </td><td><input type='text' maxlength='15' name='v_sz2n' value='".$client->stromz2."'></td></tr>
        <tr><td>Zählerstand: </td><td><input type='text' maxlength='15' name='v_sz2v' value='".$client->stromz2_verbrauch."'></td></tr>
        <tr><td>Zählerart: </td><td><input type='text' maxlength='15' name='v_sz2a' value='".$client->stromz2_art."'></td></tr>
        <tr><td><br></td><td></td></tr>
        
        <tr><td><strong>Gas</strong></td><td></td></tr>
        <tr><td>Zählernummer: </td><td><input type='text' maxlength='15' name='v_gzn' value='".$client->gasz."'></td></tr>
        <tr><td>Zählerstand: </td><td><input type='text' maxlength='15' name='v_gzv' value='".$client->gasz_verbrauch."'></td></tr>
        <tr><td><br></td><td></td></tr>
        
        <tr><td><strong>Weitere Verbrauchstellen?</strong></td><td></td></tr>
        <tr><td><label for='vb_ja'>Ja</label> <input type='radio' name='weitere_vb' id='vb_ja' value='".$weitere_vb."'></td>
        <td><label for='vb_nein'>Nein</label> <input type='radio' name='weitere_vb' id='vb_nein' value='0'></td></tr>
        <tr><td><br></td><td></td></tr>
        
        <tr><td></td><td><input type='hidden' name='search_id' value='".$search_id."'></td></tr>
        <tr><td></td><td><input type='button' value='Speichern' onclick='form.submit()'></td></tr>
        </table>
    </form>
    ";
}
?>