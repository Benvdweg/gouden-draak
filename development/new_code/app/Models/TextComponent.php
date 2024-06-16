<?php

namespace App\Models;

use Parental\HasParent;

class TextComponent
{
    use HasParent;

    public function getTitle()
    {
        return 'Tekst component';
    }
}
