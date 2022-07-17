<?php

namespace App\Http\Livewire;

use App\View\Components\GuestLayout;
use Livewire\Component;

class TaskListWireUi extends Component
{
    public function render()
    {
        return view('livewire.task-list-wire-ui')->layout(GuestLayout::class);
    }
}
