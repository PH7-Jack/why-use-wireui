<div class="p-2 pt-10">
    <x-card card-classes="p-2">
        <x-select
            label="Search a User"
            wire:model.defer="userSelected"
            placeholder="Select some user"
            :async-data="route('users.index')"
            option-label="name"
            option-value="id"
        />

        <br />
        <br />
        <br />

        <x-input
            wire:model.defer="task"
            placeholder="Create a task"
            icon="tag">
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    @if ($editingIndex !== null)
                        <x-button
                            wire:key="button.confirmSave"
                            class="h-full rounded-r-md"
                            icon="plus"
                            x-on:confirm="{
                                title: 'Sure Save?',
                                icon: 'question',
                                method: 'save',
                            }"
                            {{-- wire:click="confirmSave" --}}
                            :color="$errors->has('task') ? 'negative':'primary'"
                            flat
                            squared
                        />
                    @else
                        <x-button
                            wire:key="button.save"
                            class="h-full rounded-r-md"
                            icon="plus"
                            wire:click="save"
                            :color="$errors->has('task') ? 'negative':'primary'"
                            flat
                            squared
                        />
                    @endif
                </div>
            </x-slot>
        </x-input>

        <ul class="mt-8 space-y-3">
            @forelse ($tasks as $index => $task)
                <li
                    wire:key="tasks.{{ $index }}"
                    class="p-3 flex items-center justify-between gap-x-3 bg-gray-100 rounded-md">
                    {{ $task }}

                    <div>
                        <x-button.circle
                            icon="pencil"
                            wire:click="edit({{ $index }})"
                            primary
                            flat
                        />

                        <x-button.circle
                            icon="trash"
                            x-on:confirm="{
                                title: 'Sure Delete?',
                                icon: 'question',
                                method: 'remove',
                                params: {{ $index }}
                            }"
                            negative
                            flat
                        />
                    </div>
                </li>
            @empty
                <li
                    wire:key="tasks.empty"
                    class="p-3 flex items-center justify-between gap-x-3 bg-gray-100 rounded-md">
                    Not tasks yet
                </li>
            @endforelse
        </ul>
    </x-card>
</div>
