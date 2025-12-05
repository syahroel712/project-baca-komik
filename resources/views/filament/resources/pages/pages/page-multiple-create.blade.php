<x-filament-panels::page>
    <div class="space-y-6">

        {{-- Form --}}
        <form wire:submit.prevent="create" class="space-y-6">
            {{ $this->form }}

            <x-filament::button type="submit" color="primary">
                Upload Pages
            </x-filament::button>
        </form>

    </div>
</x-filament-panels::page>
