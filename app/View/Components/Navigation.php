<?php
declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class Navigation extends Component
{
    public function render()
    {
        return view('components.navigation');
    }
}
