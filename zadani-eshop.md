## administrace a přihlášení
- fortify
  
## kategorie (done)
- jmeno
- popis kategorie
- datum
- slug
  
## subkategorie
- jmeno
- id nadřezení kategorie
- datum
- slug 
    
## výrobce
- jmeno
- adresa
- slug
    
## značka
- jmeno
- popis
- slug

## kolekce
- jméno
- popisek
- slug

## zboží
- unikátni_id (neměnné)
- jmeno
- kategory_id
- vyrobce_id
- znacka_id
- kolekce_id
- EAN
- popis
- krátký popis
- dlouhý popis
- meta popis
- počet kusů
- cena s dph
- cena bez dph
- cena nákupní
- marze v procentech
- marze v kč
- dan
- datum
- aktivní
- slug

## zboží varianty
- zatím nevím jak to udělat

## obrázky
- produkt_id
- jméno
- přípona
- vstupní jméno
- generované jméno
- úplná adresa
- datum

## menu a kategorie
- zatím podle kategorie a subkategorie
  
## košík
- user_id
- active
- session_id?  session()->getId()
- datum

## kosik_item
- kosik_id
- produkt_id

## doprava 
- jmeno
- cena

## platba 
- jmeno
- cena


## objednávky
- cart id
- form_id
- 
## stavy objednavek 
-  přijato
-  zpracovává se
-  předáno přepravci / expedováno
-  dodáno

## trakovací čísla
- id_objednavky
- hash od doručovatele
## akce
- vyprodej
- akce
