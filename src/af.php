<?php
/**
 * Created by PhpStorm.
 * User: ror
 * Date: 13.11.15
 * Time: 14:36
 */
namespace AddressFormat;

class AF
{
    public $locale = '';
    public $company = '';
    public $name = '';
    public $street_number = '';
    public $street = '';
    public $city = '';
    public $state_code = '';
    public $zip_code = '';
    public $country = '';
    public $delimiter = ' ';
    public $patterns = null;

    public function __construct($locale) {

        $this->locale = $locale;
        $this->patterns = json_decode(file_get_contents(
            __DIR__ . DIRECTORY_SEPARATOR . 'patterns.json'))->patterns;

    }

    public function  format() {

        $locale = $this->locale;
        $pattern = $this->patterns->$locale;

        if ($this->company == '')
            $pattern = preg_replace('/%o%d/', '', $pattern);

        $find = array(
            '/%o/', '/%fl/', '/%n/', '/%s/', '/%l/', '/%sc/', '/%z/', '/%c/', '/%d/');
        $replace = array($this->company, $this->name, $this->street_number,
            $this->street, $this->city, $this->state_code, $this->zip_code,
            $this->country, $this->delimiter);

        return preg_replace($find, $replace, $pattern);
    }
}