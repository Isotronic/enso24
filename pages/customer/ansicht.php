<?php
$client->getData($search_id, "1", "-");
echo "
    <h3>Kundenansicht</h3><br>
    <div style='width:330px; float:left;'>
    <strong>Stammdaten</strong><br><br>
    Kunden ID: <br>
    Bevorzugter Kontakt: <br><br>
    
    Anrede, Titel: <br>
    Name: <br>
    Geburtsdatum: <br><br>
    
    Erreichbarkeit: <br>
    Telefon: <br>
    Fax: <br>
    Mobil: <br><br>
    
    Kontakt Adresse: <br>
    Rechnungs Adresse: <br><br>
    
    E-Mail Allgemein: <br>
    E-Mail Rechnung: <br><br>
    
    Konto Inhaber: <br>
    Konto Nummer: <br>
    Bankleitzahl: <br>
    IBAN: <br>
    BIC: <br><br>
    </div>
    <div style='margin-left:350px;'>
    <br><br>
    K-".$client->k_id."<br>
    ".$client->b_kontakt."<br><br>
    
    ".$client->anrede.", ".$client->titel."<br>
    ".$client->vorname." ".$client->nachname."<br>
    ".$client->gbdate."<br><br>
    
    ".$client->t_erreichbar."<br>
    ".$client->tel."<br>
    ".$client->fax."<br>
    ".$client->mobil."<br><br>
    
    ".$client->k_adresse.", ".$client->k_plz." ".$client->k_ort."<br>
    ".$client->r_adresse.", ".$client->r_plz." ".$client->r_ort."<br><br>
    
    ".$client->a_mail."<br>
    ".$client->r_mail."<br><br>
    
    ".$client->konto_inhaber."<br>
    ".$client->konto_nummer."<br>
    ".$client->blz."<br>
    ".$client->iban."<br>
    ".$client->bic."<br><br>
    </div>
    <br><br><br><br>
";
$client->liefer = "l1";
$client->getData($search_id, "2", "");
echo "
    <div style='width:330px; float:left;'>
    <strong>Verbrauchsstelle 1</strong><br><br>
    Vertragspartner: <br>
    Straße und Hausnummer: <br>
    Postleitzahl: <br>
    Ort: <br>
    Lage: <br><br>
    
    Strom GV: <br>
    Strom NB: <br>
    Gas GV: <br>
    Gas NB: <br><br>
    
    <strong>Strom 1</strong><br>
    Zählernummer: <br>
    Zählerstand: <br>
    Zählerart: <br><br>
    
    <strong>Strom 2</strong><br>
    Zählernummer: <br>
    Zählerstand: <br>
    Zählerart: <br><br>
    
    <strong>Gas</strong><br>
    Zählernummer: <br>
    Zählerstand: <br><br>
    </div>
    <div style='margin-left:350px;'>
    <br><br>
    ".$client->vertragspartner."<br>
    ".$client->adresse."<br>
    ".$client->plz."<br>
    ".$client->ort."<br>
    ".$client->lage."<br><br>
    
    ".$client->strom_gv."<br>
    ".$client->strom_nb."<br>
    ".$client->gas_gv."<br>
    ".$client->gas_nb."<br><br><br>
    
    ".$client->stromz1."<br>
    ".$client->stromz1_verbrauch."<br>
    ".$client->stromz1_art."<br><br><br>
    
    ".$client->stromz2."<br>
    ".$client->stromz2_verbrauch."<br>
    ".$client->stromz2_art."<br><br><br>
    
    ".$client->gasz."<br>
    ".$client->gasz_verbrauch."<br><br>
    </div>
";
?>