<?php

namespace App\Http\Livewire;

use App\View\Components\GuestLayout;
use Livewire\Component;
use WireUi\Traits\Actions;

class TaskListWireUi extends Component
{
    use Actions;

    public ?string $task = null;

    public array $tasks = [
        'Learn Livewire',
        'Learn Blade',
        'Learn Vue',
        'Learn Laravel',
        'Learn WireUI',
    ];

    public ?int $editingIndex = null;

    public ?int $userSelected = 299;

    protected $rules = [
        'task' => 'required|string|min:3',
    ];

    // public function confirmSave()
    // {
    //     if ($this->editingIndex === null) {
    //         $this->save();

    //         return;
    //     }



    //     $this->dialog()->confirm([
    //         'title'       => 'Are you Sure?',
    //         'description' => 'Save the information?',
    //         'acceptLabel' => 'Yes, save it',
    //         'method'      => 'save',
    //     ]);
    // }

    public function save()
    {
        $this->validate();

        if ($this->editingIndex !== null) {
            $this->tasks[$this->editingIndex] = $this->task;
            $this->editingIndex = null;
        } else {
            $this->tasks[] = $this->task;
        }

        $this->notification()->success(
            title: 'Task Saved',
            description: 'Your task has been saved!'
        );

        $this->task = null;
    }

     public function edit(int $index): void
    {
        $this->editingIndex = $index;
        $this->task = $this->tasks[$index];
    }

    public function remove(int $index)
    {
        unset($this->tasks[$index]);

        $this->notification()->success(
            title: 'Task Removed',
            description: 'Your task has been removed!'
        );
    }

    public function render()
    {
        return view('livewire.task-list-wire-ui')->layout(GuestLayout::class);
    }
}
