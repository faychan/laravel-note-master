<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('notes.create') }}" class="btn-link btn-lg mb-2">+ New Note</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('notes.update', $note) }}" method="post">
                        @method('put')
                        @csrf
                        <x-input class="w-full" autocomplete="off" type="text" name="title" field="title" :value="@old('title', $note->title)" placeholder="Title"></x-input>
                        <x-textarea class="w-full mt-6" name="text" field="text" id="" rows="10" :value="@old('text', $note->text)" placeholder="Start typing here..."></x-textarea>
                        <div class="mt-4">
                            <input type="checkbox" name="reminder" value="1" {{ @old('reminder', $note->reminder) == 1 ? "checked" : "" }} id="Reminder">
                            <label for="Reminder" >Reminder</label>
                        </div>
                        <x-button class="mt-6">Save note</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
