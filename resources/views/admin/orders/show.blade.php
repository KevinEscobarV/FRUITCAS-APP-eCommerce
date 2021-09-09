<x-admin-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Modificar estado de Orden -{{ $order->id }}
            </div>
            <x-button-enlace color="teal" class="ml-auto" href="{{ route('admin.orders.index') }}">
                Volver
            </x-button-enlace>
        </div>
    </x-slot>

    @livewire('status-order', ['order' => $order])

</x-admin-layout>