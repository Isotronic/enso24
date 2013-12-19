<?php
$client->getData($search_id, "9", $id);
echo "
<form action='index.php?pid=customer&id=".$search_id."&b=6' method=post>
    <table align='left'>
    <tr><td>Kundennummer:</td><td> K-".$search_id."</td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Aufträge</strong></td><td></td></tr>
    <tr><td>Auftragsnummer:</td><td><input type='text' name='auftrag_id' value='".$client->auftrags_id."'></td></tr>
    <tr><td>Kontrakt Art:</td><td><input type='text' name='kontrakt_art' value='".$client->kontrakt_art."'></td></tr>
    <tr><td>Zustell Art:</td><td><input type='text' name='zustell_art' value='".$client->zustell_art."'></td></tr>
    <tr><td>Kontakt Aufnahme:</td><td><input type='text' name='kontakt_auf' value='".$client->kontakt_aufnahme."'></td></tr>
    <tr><td>Widerruf Verzicht:</td><td><input type='text' name='widerruf_ver' value='".$client->widerruf_verzicht."'></td></tr>    
    <tr><td>Sonst. Vereinbarungen:</td><td><input type='text' name='vereinbarung' value='".$client->vereinbarung."'></td></tr>

    <tr><td><br></td><td></td></tr>
    <tr><td></td><td><input type='submit' value='Speichern' name='submit'></td></tr>
    </table> 
</form>

";




?>