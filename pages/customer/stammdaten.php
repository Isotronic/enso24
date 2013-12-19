<?php
$client->getData($search_id, "1", "-");
echo "
<form action='index.php?pid=customer&b=1' method='post'>
    <table align='left'>
    <tr><td>Kundenart: </td><td><input type='text' name='k_art' value='".$client->k_art."'></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td>Anrede: </td><td><input type='text' name='anrede' value='".$client->anrede."'></td></tr>
    <tr><td>Titel: </td><td><input type='text' name='titel' value='".$client->titel."'></td></tr>
    <tr><td>Vorname: </td><td><input type='text' maxlength='20' name='vorname' value='".$client->vorname."'></td></tr>
    <tr><td>Nachname: </td><td><input type='text' maxlength='30' name='nachname' value='".$client->nachname."'></td></tr>
    <tr><td>Geburtsdatum: </td><td><input type='text' name='gbdatum' maxlength='12' value='".$client->gbdate."'></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Kontakt-Adresse</strong></td><td></td></tr>
    <tr><td>Straße und Hausnummer: </td><td><input type='text' maxlength='70' name='k_adresse' value='".$client->k_adresse."'></td></tr>
    <tr><td>Postleitzahl: </td><td><input type='text' maxlength='5' name='k_plz' size='7' value='".$client->k_plz."'></td></tr>
    <tr><td>Ort: </td><td><input type='text' maxlength='40' name='k_ort' value='".$client->k_ort."'></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Rechnungs-Adresse</strong></td><td></td></tr>
    <tr><td>Straße und Hausnummer: </td><td><input type='text' maxlength='70' name='r_adresse' value='".$client->r_adresse."'></td></tr>
    <tr><td>Postleitzahl: </td><td><input type='text' maxlength='5' name='r_plz' size='7' value='".$client->r_plz."'></td></tr>
    <tr><td>Ort: </td><td><input type='text' maxlength='40' name='r_ort' value='".$client->r_ort."'></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Kontaktmöglichkeiten</strong></td><td></td></tr>
    <tr><td>Telefon: </td><td><input type='text' maxlength='15' name='tel' value='".$client->tel."'></td></tr>
    <tr><td>Telefax: </td><td><input type='text' maxlength='15' name='fax' value='".$client->fax."'></td></tr>
    <tr><td>Mobil: </td><td><input type='text' maxlength='15' name='mobil' value='".$client->mobil."'></td></tr>
    <tr><td>Email Allgemein: </td><td><input type='text' maxlength='50' name='a_mail' value='".$client->a_mail."'></td></tr>
    <tr><td>Email Rechnung: </td><td><input type='text' maxlength='50' name='r_mail' value='".$client->r_mail."'></td></tr>
    <tr><td>Telefonische Erreichbarkeit: </td><td><input type='text' name='t_erreichbar' value='".$client->t_erreichbar."''></td></tr>
    <tr><td>Bevorzugte Kontaktaufnahme: </td><td><input type='text' name='b_kontakt' value='".$client->b_kontakt."'></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Kontodaten</strong></td><td></td></tr>
    <tr><td>Konto Inhaber: </td><td><input type='text' name='konto_inhaber' maxlength='60' value='".$client->konto_inhaber."'></td></tr>
    <tr><td>Konto Nummer: </td><td><input type='text' name='konto_nummer' maxlength='20' value='".$client->konto_nummer."'></td></tr>
    <tr><td>Bankleitzahl: </td><td><input type='text' name='blz' maxlength='15' value='".$client->blz."'></td></tr>
    <tr><td>IBAN: </td><td><input type='text' name='iban' maxlength='25' value='".$client->iban."'></td></tr>
    <tr><td>BIC: </td><td><input type='text' name='bic' maxlength='15' value='".$client->bic."'></td></tr>
    <tr><td><br></td><td></td></tr>
    <tr><td></td><td><input type='hidden' name='search_id' value='".$search_id."'></td></tr>
    <tr><td></td><td><input type='button' value='Speichern' onclick='form.submit()'></td></tr>
    </table>
</form>
";
?>