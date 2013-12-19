<?php
$client->getData($search_id, "3", $bla);
echo "
<form action='index.php?pid=customer&id=".$search_id."&b=3' method=post>
    <table align='left'>
    <tr><td>Vertragskontonummer:</td><td> V-".$client->vertragsktn."</td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Stromzähler 1</strong></td><td></td></tr>
    <tr><td>Ablesungsdatum von:</td><td><input type='text' name='sz1_dv' value='".$client->stromz1_dv."'></td></tr>
    <tr><td>Ablesungsdatum bis:</td><td><input type='text' name='sz1_db' value='".$client->stromz1_db."'></td></tr>
    <tr><td>Zählerstand von:</td><td><input type='text' name='sz1_zsv' value='".$client->stromz1_zsv."'></td></tr>
    <tr><td>Zählerstand bis:</td><td><input type='text' name='sz1_zsb' value='".$client->stromz1_zsb."'></td></tr>
    <tr><td>Gesamt Verbrauch:</td><td><input type='text' name='sz1_verbrauch' value='".$client->stromz1_verbrauch."'></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Stromzähler 2</strong></td><td></td></tr>
    <tr><td>Ablesungsdatum von:</td><td><input type='text' name='sz2_dv' value='".$client->stromz2_dv."'></td></tr>
    <tr><td>Ablesungsdatum bis:</td><td><input type='text' name='sz2_db' value='".$client->stromz2_db."'></td></tr>
    <tr><td>Zählerstand von:</td><td><input type='text' name='sz2_zsv' value='".$client->stromz2_zsv."'></td></tr>
    <tr><td>Zählerstand bis:</td><td><input type='text' name='sz2_zsb' value='".$client->stromz2_zsb."'></td></tr>
    <tr><td>Gesamt Verbrauch:</td><td><input type='text' name='sz2_verbrauch' value='".$client->stromz2_verbrauch."'></td></tr>
    <tr><td><br></td><td></td></tr>
    
    <tr><td><strong>Gaszähler</strong></td><td></td></tr>
    <tr><td>Ablesungsdatum von:</td><td><input type='text' name='gz_dv' value='".$client->gas_dv."'></td></tr>
    <tr><td>Ablesungsdatum bis:</td><td><input type='text' name='gz_db' value='".$client->gas_db."'></td></tr>
    <tr><td>Zählerstand von:</td><td><input type='text' name='gz_zsv' value='".$client->gas_zsv."'></td></tr>
    <tr><td>Zählerstand bis:</td><td><input type='text' name='gz_zsb' value='".$client->gas_zsb."'></td></tr>
    <tr><td>Gesamt Verbrauch:</td><td><input type='text' name='gz_verbrauch' value='".$client->gas_verbrauch."'></td></tr>
    <tr><td>Brennwert:</td><td><input type='text' name='gz_brenn' value='".$client->gas_brenn."'></td></tr>
    <tr><td>Umrechnungsfaktor:</td><td><input type='text' name='gz_umr' value='".$client->gas_umr."'></td></tr>
    <tr><td><br></td><td><input type='hidden' name='vktn' value='".$client->vertragsktn."'></td></tr>
    <tr><td></td><td><input type='submit' value='Speichern' name='submit'></td></tr>
    </table> 
</form>
";
?>
