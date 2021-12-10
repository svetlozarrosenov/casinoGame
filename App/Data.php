<?php
declare(strict_types = 1);

namespace App;

interface Data {
    public function getSource( String $name );
}