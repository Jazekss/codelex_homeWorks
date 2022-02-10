<?php
include 'func.php';
?>
<link rel="stylesheet" href="style.css" type="text/css"/>
<form method="GET">
  <input id="search_field" type="date" name="date_from" />
  <input id="search_field" type="date" name="date_till" />
  <input id="search_button" type="submit" name="" value="Go!"/>
  <a style="color:lightgrey" href="covid.php">reset</a>
</form>
<?php
if (empty($date_from = $_GET['date_from'])) { // Diezgan muļķīgi, bet strādā
	$date_from = "2020-01-01";
	$date_till = "2022-02-03";
}else{
	$date_from = $_GET['date_from'];
	$date_till = $_GET['date_till'];
}
$perPage = 25;
$offset = 0;
//$dataAll = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search_sql?sql=SELECT%20*%20from%20\"d499d2f0-b1ea-4ba2-9600-2c701b03bd4a\"%20WHERE%20\"Datums\"%20>%20%272022-02-01T00:00:00%27%20AND%20\"Datums\"%20<%20%272022-02-03T00:00:00%27"));
$dataAll = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search_sql?sql=SELECT%20*%20from%20\"d499d2f0-b1ea-4ba2-9600-2c701b03bd4a\"%20WHERE%20\"Datums\"%20>%20%27{$date_from}T00:00:00%27%20AND%20\"Datums\"%20<%20%272{$date_till}T00:00:00%27"));
//vardump($dataAll->result->records);
?>
<table>
  <tr id="titles">
    <th id="index">ID</th>
    <th id="name">Datums</th>
    <th id="name">Testu skaits</th>
    <th id="name">Apstiprināto skaits</th>
    <th id="name">Īpatsvards</th>
  </tr>
  <?php
  foreach ($dataAll->result->records as $result) {
  ?>
  <tr>
    <th id="index"><p><?php echo $result->_id ?></p></th>
      <?php $result->Datums = explode( "T",$result->Datums); ?>
    <th id="name"><p><?php echo $result->Datums[0] ?></p></th>
    <th id="name"><p><?php echo $result->TestuSkaits ?></p></th>
    <th id="name"><p><?php echo $result->ApstiprinataCOVID19InfekcijaSkaits ?></p></th>
    <th id="name"><p><?php echo $result->Ipatsvars ?></p></th>
  </tr>
  <?php
  }
  ?>
</table>
