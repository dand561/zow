<?php
include('export_xml.php');
header('content-type: text/xml');
header('Content-Disposition: attachment; filename="reptiles.xml"'); //linia asta poate fi scoasa daca nu se doreste salvarea informatiei intr-un fisier downloadabil
?>

<DOCUMENT>
<?php
sql2xml('select * from animals where category="Reptile"', '2');

?>
</DOCUMENT>
