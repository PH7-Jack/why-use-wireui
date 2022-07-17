<div class="p-20">
    <div class="bg-white border shadow rounded-md p-5">
        <x-select
            label="Search a User"
            wire:model.defer="userSelected"
            placeholder="Select some user"
            :async-data="route('users.index')"
            option-label="name"
            option-value="id"
        />

        <div class="flex gap-2 w-full">
            <div class="w-full">
                <x-jet-label for="task" value="Create a Task" />
                <x-jet-input
                    wire:model.defer="task"
                    id="task"
                    class="block mt-1 w-full"
                    type="text"
                    name="task"
                    required
                    autofocus
                />
                <x-jet-input-error for="task" class="mt-2" />
            </div>

            <x-jet-button wire:click="save" class="mt-6">
                Save
            </x-jet-button>
        </div>

        <ul class="mt-8 space-y-3">
            @forelse ($tasks as $index => $task)
                <li wire:key="tasks.{{ $index }}"
                    class="p-3 flex items-center justify-between gap-x-3 bg-gray-100 rounded-md">
                    {{ $task }}

                    <div class="flex items-center gap-x-2">
                        <button wire:click="edit({{ $index }})">
                            <x-icons.phosphor name="pencil-simple" class="w-5 h-5" />
                        </button>

                        <button
                            wire:click="remove({{ $index }})"
                            {{-- onclick="confirm('Are you sure you want to delete this task?')" --}}
                        >
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#2d2020" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><line x1="216" y1="56" x2="40" y2="56" fill="none" stroke="#2d2020" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><line x1="104" y1="104" x2="104" y2="168" fill="none" stroke="#2d2020" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><line x1="152" y1="104" x2="152" y2="168" fill="none" stroke="#2d2020" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line><path d="M200,56V208a8,8,0,0,1-8,8H64a8,8,0,0,1-8-8V56" fill="none" stroke="#2d2020" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path><path d="M168,56V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40V56" fill="none" stroke="#2d2020" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path></svg>
                        </button>
                    </div>
                </li>
            @empty
                <li wire:key="tasks.empty" class="mt-8 p-3 bg-gray-100 rounded-md">
                    No tasks
                </li>
            @endforelse
        </ul>
    </div>
</div>
