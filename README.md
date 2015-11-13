# PHP postal address formatter

Outputs postal addresses in a variety of international formats

## Usage

```PHP
$address_format = new AddressFormat\AF('DE');

$address_format->company = 'MEGASTORE';
$address_format->delimiter = ' | ';
$address_format->zip_code = '56611';
$address_format->city = 'Diestadt';
$address_format->country = 'Germany';
$address_format->name = 'Hans Wurst';
$address_format->street = 'Ladenstraße';
$address_format->street_number = '22a';

echo $address_format->format();
```

## Output
```
MEGASTORE | Hans Wurst | Ladenstraße 22a | 56611 Diestadt | Germany
```
