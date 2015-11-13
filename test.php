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
$address_format->delimiter = '<br>';
$address_format->zip_code = '56611';
$address_format->city = 'Diestadt';
$address_format->country = 'Deutschland';
$address_format->name = 'Hans Wurst';
$address_format->street = 'Ladenstraße';
$address_format->street_number = '22a';

echo $address_format->format();