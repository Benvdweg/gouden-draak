<?php

namespace App\Models;

use Parental\HasParent;

class TextComponent extends Component
{
    use HasParent;

    public function getTitle()
    {
        return 'Tekst component';
    }
}
