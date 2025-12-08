<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 transition-colors duration-300">
    @if ($success)
        <div class="mb-4 px-4 py-3 rounded-lg bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-100">
            Pesan berhasil terkirim!
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
            <input type="text" id="name" wire:model.defer="name"
                class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm p-2">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" id="email" wire:model.defer="email"
                class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm p-2">
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pesan</label>
            <textarea id="message" rows="4" wire:model.defer="message"
                class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm p-2"></textarea>
            @error('message')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="w-full px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors">
                Kirim Pesan
            </button>
        </div>
    </form>
</div>
