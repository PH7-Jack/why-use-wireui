<?php

namespace App\Http\Livewire;

use App\View\Components\GuestLayout;
use Livewire\Component;

class TaskList extends Component
{
    public array $tasks = [
        'Learn Livewire',
        'Learn Blade',
        'Learn Vue',
        'Learn Laravel',
        'Learn WireUI',
    ];

    public ?string $task = null;

    public ?int $editingIndex = null;

    protected $rules = [
        'task' => 'required|string|min:3',
    ];

    public function save(): void
    {
        $this->validate();

        if ($this->editingIndex !== null) {
            $this->tasks[$this->editingIndex] = $this->task;
            $this->editingIndex = null;
        } else {
            $this->tasks[] = $this->task;
        }

        $this->task = null;
    }

    public function edit(int $index): void
    {
        $this->editingIndex = $index;
        $this->task = $this->tasks[$index];
    }

    public function remove(int $index): void
    {
        unset($this->tasks[$index]);
    }

    public function render()
    {
        return view('livewire.task-list')->layout(GuestLayout::class);
    }
}
