<div class="bg-white shadow-xl rounded-lg p-6 mb-4">
    <p class=" text-xl text-center font-semibold mb-2">Estado del Producto</p>

    <div class=" mx-9 mb-4 flex justify-between">
        <label>
            <input wire:model.defer="status" type="radio" name="status" value="1">
                BORRADOR      
        </label>
        <label>
            <input wire:model.defer="status" type="radio" name="status" value="2">
                PUBLICADO
        </label>
    </div>

    <div class="flex justify-center">
        <x-jet-action-message class="mr-3" on="saved">
            Actualizado
        </x-jet-action-message>

        <x-jet-button class="w-full justify-center" wire:click="save"
            wire:loading.attr="disabled"
            wire:target="save">
            
            Actualizar
        </x-jet-button>
    </div>
</div>
