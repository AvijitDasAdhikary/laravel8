<x-layout>
    <x-slot name="list">
        Custom list    
    </x-slot>
    @foreach($tasks as $task)
        {{ $task }}
    @endforeach
    <x-slot name="list2">
        @foreach($tasks2 as $t)
            {{ $t }}
        @endforeach
    </x-slot>
</x-layout>