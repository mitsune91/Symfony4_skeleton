<?php

namespace App\Hello;

use App\Hello\Magnifier;
class HelloWorld
{
    private $magnifier;
    private $prenom;

    public function __construct(string $p, Magnifier $m)
    {
        $this->prenom = $p;
        $this->magnifier = $m;
    }

    public function yoUpper()
    {
        return $this->magnifier->upper($this->yo());
    }

    public function yo()
    {
        return 'Yoo ' . $this->prenom;

    }

}