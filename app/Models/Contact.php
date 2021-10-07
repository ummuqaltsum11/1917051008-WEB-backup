<?php

namespace App\Models;

use CoeIgniter\Model;

class Contact extends Model {

    public static function getContact() {

        return [
            'nama' -> 'Yuki',
            'nohp' -> '082278060182'
        ];
    }
}