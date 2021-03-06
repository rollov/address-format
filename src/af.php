<?php
/**
 * Created by PhpStorm.
 * User: ror
 * Date: 13.11.15
 * Time: 14:36
 */
namespace AddressFormat;

/**
 * Class AF
 * @package AddressFormat
 */
class AF
{
    /**
     * @var string
     */
    public $locale = '';

    /**
     * @var string
     */
    public $company = '';

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $street_number = '';

    /**
     * @var string
     */
    public $street = '';

    public $street_annex = '';

    /**
     * @var string
     */
    public $city = '';

    /**
     * @var string
     */
    public $state_code = '';

    /**
     * @var string
     */
    public $zip_code = '';

    /**
     * @var string
     */
    public $country = '';

    /**
     * @var string
     */
    public $delimiter = ' ';

    /**
     * @var string
     */
    public $patterns = null;

    /**
     * @param $locale
     */
    public function __construct($locale) {

        $this->locale = $locale;
        $this->patterns = json_decode(file_get_contents(
            __DIR__ . DIRECTORY_SEPARATOR . 'patterns.json'))->patterns;

    }

    /**
     * @return mixed
     */
    public function  format() {

        $locale = $this->locale;
        $pattern = $this->patterns->$locale;

        if ($this->company == '')
            $pattern = preg_replace('/%o%d/', '', $pattern);

        if ($this->name == '')
            $pattern = preg_replace('/%fl%d/', '', $pattern);

        if ($this->country == '')
            $pattern = preg_replace('/%d%c/', '', $pattern);

        if ($this->street_annex == '')
            $pattern = preg_replace('/%a%d/', '', $pattern);

        if ($this->locale == 'GB') {
            $this->country = strtoupper($this->country);
            $this->city = strtoupper($this->city);
        }

        /*
         * o = organization/company
         * fl = firstname lastname
         * n = street number
         * s = street
         * a = street annex
         * l = city
         * b = US, CA state code
         * z = zip code
         * c = country
         */

        $find = array(
            '/%o/', '/%fl/', '/%n/', '/%s/', '/%a/', '/%l/', '/%b/', '/%z/', '/%c/', '/%d/');
        $replace = array($this->company, $this->name, $this->street_number,
            $this->street, $this->street_annex, $this->city, $this->state_code,
            $this->zip_code, $this->country, $this->delimiter);

        return preg_replace($find, $replace, $pattern);
    }
}
