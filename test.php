<?php
/**
 * Created by PhpStorm.
 * User: ror
 * Date: 13.11.15
 * Time: 15:43
 */
require_once 'src/af.php';

$address_format = new AddressFormat\AF('DE');

$address_format->company = 'MEGASTORE';
$address_format->zip_code = '56611';
$address_format->city = 'Diestadt';
$address_format->country = 'Deutschland';
$address_format->name = 'Hans Wurst';
$address_format->street = 'Ladenstraße';
$address_format->street_number = '22a';
$address_format->delimiter = '<br>';

echo $address_format->format();
echo '<br>-------------------<br>';

$address_format = new AddressFormat\AF('GB');

$address_format->company = 'MEGASTORE';
$address_format->zip_code = 'EC1Y 8SY';
$address_format->city = 'London';
$address_format->country = 'United Kingdom';
$address_format->name = 'Mr. Walter C. Brown';
$address_format->street = 'Featherstone Street';
$address_format->street_number = '49';
$address_format->delimiter = '<br>';

echo $address_format->format();
echo '<br>-------------------<br>';

$address_format = new AddressFormat\AF('US');

$address_format->delimiter = '<br>';
$address_format->zip_code = '01740';
$address_format->city = 'Bolton';
$address_format->country = 'United States';
$address_format->name = 'Scottie A. Jones';
$address_format->street = 'Hampton Meadows';
$address_format->street_number = '4383';
$address_format->state_code = 'MA';
echo $address_format->format();