<?php

namespace App\Controllers;

class Biodata extends BaseController
{
	public function fungsiBaru($nama, $npm) {
	echo "Hello $nama";
	echo "<br> $npm";
	}

    public function fungsiNama($nama) {
		echo "Hello $nama";
	}

    public function fungsiNPM($npm) {
		echo "$npm";
	}
}