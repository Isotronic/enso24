<?php 
// adding a new customer
require_once 'class/client.php';
$neukunde = $_GET["n"];
if ($neukunde == null || "0"){

	echo "
	<p><h3>Bitte ausfüllen:</h3></p>
	<form action='index.php?pid=new-customer&n=1' method='post'>
		Art der Aquise: 
		<select name='aquise_art'>
		  <option value='-'>Bitte Auswählen</option>
		  <option value='VP'>Durch einen VP</option>
		  <option value='Empfehlung'>Empfehlung</option>
		</select><br>
		VP ID eingeben:
		<input type='text' maxlength='4' name='vpid' size='5'><br><br>
		<label for='privat'>Privatkunde</label>
		<input type='radio' name='k_art' id='privat' value='Privat'><br>
		<label for='gewerbe'>Gewerbekunde</label>
		<input type='radio' name='k_art' id='gewerbe' value='Gewerbe'><br><br>
		<!--Firmenbezeichnung: <input type='text' maxlength='60' name='firma' size='60'><br><br>-->
		Anrede: <select name='anrede'><option value='-'>Bitte Auswählen</option><option value='Herr'>Herr</option><option value='Frau'>Frau</option></select><br>
		Titel: <select name='titel'><option value='-'>Bitte Auswählen</option><option value='Dr.'>Dr.</option><option value='Prof.'>Prof.</option></select><br>
		Vorname: <input type='text' maxlength='20' name='vorname' size='20'><br>
		Nachname: <input type='text' maxlength='30' name='nachname' size='30'><br>
		Geburtsdatum: <input type='text' name='gbdatum' maxlength='12' size='20'><br>
		
		<input type='hidden' name='step_id' value='1'>
		<input type='button' value='Weiter' onclick='form.submit()'>
	</form>
	";
} elseif ($neukunde == "1") {  
    $client = new client();
    $client->createID("3", $_POST['vpid']);
    $client->setVar1($_POST['k_art'], $_POST['vpid'], $_POST['aquise_art'], $_POST['firma'], $_POST['anrede'], $_POST['titel'], $_POST['vorname'], $_POST['nachname'], $_POST['gbdatum']);
    $client->insertDB($_POST['step_id']);   
	echo "
	<p><h3>Bitte ausfüllen:</h3></p>
	<form action='index.php?pid=new-customer&n=2' method='post'>
		<strong>Kontakt-Adresse</strong><br>
		Straße und Hausnummer: <input type='text' maxlength='70' name='k_adresse' size='50'><br>
		Postleitzahl: <input type='text' maxlength='5' name='k_plz' size='10'>
		Ort: <input type='text' maxlength='40' name='k_ort' size='30'><br><br>
		
		<strong>Rechnungs-Adresse</strong><br>
		Straße und Hausnummer: <input type='text' maxlength='70' name='r_adresse' size='50'><br>
		Postleitzahl: <input type='text' maxlength='5' name='r_plz' size='10'>
		Ort: <input type='text' maxlength='40' name='r_ort' size='30'><br><br>
		
		<strong>Kontaktmöglichkeiten</strong><br>
		Telefon: <input type='text' maxlength='15' name='tel' size='15'><br>
		Telefax: <input type='text' maxlength='15' name='fax' size='15'><br>
		<!--Firmentelefon: <input type='text' maxlength='15' name='f_tel' size='15'><br>
		Firmenfax: <input type='text' maxlength='15' name='f_fax' size='15'><br>-->
		Mobil: <input type='text' maxlength='15' name='mobil' size='15'><br>
		Email Allgemein: <input type='text' maxlength='50' name='a_mail' size='50'><br>
		Email Rechnung: <input type='text' maxlength='50' name='r_mail' size='50'><br>
		Telefonische Erreichbarkeit: <select name='t_erreichbar'><option value='-'>Bitte Auswählen</option><option value='Vormittags'>Vormittags</option><option value='Nachmittags'>Nachmittags</option><option value='Abends'>Abends</option></select><br>
		Bevorzugte Kontaktaufnahme: <select name='b_kontakt'><option value='-'>Bitte Auswählen</option><option value='Telefon'>Telefon</option><option value='eMail'>eMail</option><option value='Post'>Post</option><option value='Fax'>Fax</option><option value='Persöhnlich'>Persöhnlich</option><option value='SMS'>SMS</option></select><br>
		
        <input type='hidden' name='vertragspartner' value='".$client->vorname." ".$client->nachname."'>
		<input type='hidden' name='k_id' value='".$client->k_id."'>
		<input type='hidden' name='step_id' value='2'>
		<input type='button' value='Weiter' onclick='form.submit()'>
	</form>
	";

} elseif ($neukunde == "2") {
    $client = new client();
    $client->createID("1", "-");
    $client->createID("2", "-");
    $client->setVar2($_POST['k_adresse'], $_POST['k_plz'], $_POST['k_ort'], $_POST['r_adresse'], $_POST['r_plz'], $_POST['r_ort'], $_POST['tel'], $_POST['fax'], $_POST['f_tel'], $_POST['f_fax'], 
    $_POST['mobil'], $_POST['a_mail'], $_POST['r_mail'], $_POST['b_kontakt'], $_POST['t_erreichbar'], $_POST['k_id'], $_POST['vertragspartner']);
    $client->insertDB($_POST['step_id']);
	echo "
	<p><h3>Bitte ausfüllen:</h3></p>
	<form action='index.php?pid=new-customer&n=3' method='post'>
		Konto Inhaber: <input type='text' name='konto_inhaber' maxlength='60' value='".$client->vertragspartner."'><br>
		Konto Nummer: <input type='text' name='konto_nummer' maxlength='20' size='30'><br>
		Bankleitzahl: <input type='text' name='blz' maxlength='15' size='30'><br>
		IBAN: <input type='text' name='iban' maxlength='25' size='30'><br>
		BIC: <input type='text' name='bic' maxlength='15' size='30'><br>
		
		<input type='hidden' name='k_id' value='".$client->k_id."'>
		<input type='hidden' name='step_id' value='3'>
		<input type='button' value='Fertig' onclick='form.submit()'>
	</form>
	";

} elseif ($neukunde == "3") {
	
	$client = new client();
	$client->setVar3($_POST['konto_inhaber'], $_POST['konto_nummer'], $_POST['blz'], $_POST['iban'], $_POST['bic'], $_POST['k_id']);
	$client->insertDB($_POST['step_id']);
	
	echo "Kunde wurde hinzugefügt.";
}





?>
