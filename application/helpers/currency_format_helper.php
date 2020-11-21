<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Source Code by : Aldy Muldani
Email : dieabra@gmail.com
Github : https://github.com/alldie1207
Line : alldie1207
*/

if ( ! function_exists('currency_format'))

{

    function currency_format($number)

    {

        return 'Rp '.number_format($number,2,',','.');

    }





}