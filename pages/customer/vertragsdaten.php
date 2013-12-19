<?php
$client->getData($search_id, "7", $id);
echo "
<div style='float:left; display:inline-block;'>
<form action='index.php?pid=customer&id=".$search_id."&b=4' method=post>
    <table align='left'>
    <tr><td>Kundennummer:</td><td> K-".$search_id."</td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Stromvertrag</strong></td><td></td></tr>
    <tr><td>Anbieter:</td><td><input type='text' name='sanbieter' value='".$client->anbieter_id."'></td></tr>
    <tr><td>Kunden Nr:</td><td><input type='text' name='skid' value='".$client->kundennummer."'></td></tr>
    <tr><td>Vertrags Ktn:</td><td><input type='text' name='svktn' value='".$client->vertragskonto."'></td></tr>
    <tr><td>Vertrags Nr:</td><td><input type='text' name='svid' value='".$client->vertragsnummer."'></td></tr>
    <tr><td>Tarif:</td><td><input type='text' name='starif' value='".$client->tarif."'></td></tr>    
    <tr><td>Vertragsbeginn:</td><td><input type='text' name='svbeginn' value='".$client->beginn."'></td></tr>
    <tr><td>Laufzeit:</td><td><input type='text' name='slaufzeit' value='".$client->laufzeit."'></td></tr>
    <tr><td>Auto Verlängerung:</td><td><input type='text' name='sauto' value='".$client->auto."'></td></tr>
    <tr><td>Kündigungsfrist:</td><td><input type='text' name='sfrist' value='".$client->frist."'></td></tr>
    <tr><td>Preisgarantie</td><td><input type='text' name='sgarantie' value='".$client->preisgarantie."'></td></tr>
    <tr><td>Kaution:</td><td><input type='text' name='skaution' value='".$client->kaution."'></td></tr>
    <tr><td>Bonus:</td><td><input type='text' name='sbonus' value='".$client->boni."'></td></tr>
    <tr><td><br></td><td></td></tr>
    <tr><td>Zahlungsart:</td><td><input type='text' name='szahlart' value='".$client->zahlart."'></td></tr>
    <tr><td>Anzahl Abschläge:</td><td><input type='text' name='sanzahl' value='".$client->anzahlabs."'></td></tr>
    <tr><td>Abschlagsbetrag:</td><td><input type='text' name='sbetrag' value='".$client->betragabs."'></td></tr>
    <tr><td>VB Preis ET / HT:</td><td><input type='text' name='spreisetht' value='".$client->preisetht."'></td></tr>
    <tr><td>VB Preis NT:</td><td><input type='text' name='spreisnt' value='".$client->preisnt."'></td></tr>
    <tr><td>Leistungspreis KW:</td><td><input type='text' name='spreiskw' value='".$client->preiskw."'></td></tr>
    <tr><td>Grundpreis Monat:</td><td><input type='text' name='sgrundpreism' value='".$client->grundpreism1."'></td></tr>
    <tr><td>Grundpreis Jahr:</td><td><input type='text' name='sgrundpreisj' value='".$client->grundpreisj1."'></td></tr>
    <tr><td><br></td><td></td></tr>
    <tr><td></td><td><input type='submit' value='Speichern' name='submit'></td></tr>
    </table> 
</form>
</div>
";
$client->getData($search_id, "8", $id);
echo "
<div style='display:inline-block; margin-left:100px;'>
<form action='index.php?pid=customer&id=".$search_id."&b=5' method=post>
    <table align='left'>
    <tr><td><br></td><td></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Gasvertrag</strong></td><td></td></tr>
    <tr><td>Anbieter:</td><td><input type='text' name='ganbieter' value='".$client->anbieter_id."'></td></tr>
    <tr><td>Kunden Nr:</td><td><input type='text' name='gkid' value='".$client->kundennummer."'></td></tr>
    <tr><td>Vertrags Ktn:</td><td><input type='text' name='gvktn' value='".$client->vertragskonto."'></td></tr>
    <tr><td>Vertrags Nr:</td><td><input type='text' name='gvid' value='".$client->vertragsnummer."'></td></tr>
    <tr><td>Tarif:</td><td><input type='text' name='gtarif' value='".$client->tarif."'></td></tr>    
    <tr><td>Vertragsbeginn:</td><td><input type='text' name='gvbeginn' value='".$client->beginn."'></td></tr>
    <tr><td>Laufzeit:</td><td><input type='text' name='glaufzeit' value='".$client->laufzeit."'></td></tr>
    <tr><td>Auto Verlängerung:</td><td><input type='text' name='gauto' value='".$client->auto."'></td></tr>
    <tr><td>Kündigungsfrist:</td><td><input type='text' name='gfrist' value='".$client->frist."'></td></tr>
    <tr><td>Preisgarantie</td><td><input type='text' name='ggarantie' value='".$client->preisgarantie."'></td></tr>
    <tr><td>Kaution:</td><td><input type='text' name='gkaution' value='".$client->kaution."'></td></tr>
    <tr><td>Bonus:</td><td><input type='text' name='gbonus' value='".$client->boni."'></td></tr>
    <tr><td><br></td><td></td></tr>
    <tr><td>Zahlungsart:</td><td><input type='text' name='gzahlart' value='".$client->zahlart."'></td></tr>
    <tr><td>Anzahl Abschläge:</td><td><input type='text' name='ganzahl' value='".$client->anzahlabs."'></td></tr>
    <tr><td>Abschlagsbetrag:</td><td><input type='text' name='gbetrag' value='".$client->betragabs."'></td></tr>
    <tr><td>VB Preis ET / HT:</td><td><input type='text' name='gpreisetht' value='".$client->preisetht."'></td></tr>
    <tr><td>VB Preis NT:</td><td><input type='text' name='gpreisnt' value='".$client->preisnt."'></td></tr>
    <tr><td>Leistungspreis KW:</td><td><input type='text' name='gpreiskw' value='".$client->preiskw."'></td></tr>
    <tr><td>Grundpreis Monat:</td><td><input type='text' name='ggrundpreism' value='".$client->grundpreism3."'></td></tr>
    <tr><td>Grundpreis Jahr:</td><td><input type='text' name='ggrundpreisj' value='".$client->grundpreisj3."'></td></tr>
    <tr><td><br></td><td></td></tr>
    <tr><td></td><td><input type='submit' value='Speichern' name='submit'></td></tr>
    </table> 
</form>
</div>
";
?>
