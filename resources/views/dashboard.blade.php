<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Olá Usuário: {{ Auth::user()->name}}. Só na paz?
        </h2>
    </x-slot>

    <div class="py-12">
        Aqui será view HOME
    </div>
</x-app-layout>
