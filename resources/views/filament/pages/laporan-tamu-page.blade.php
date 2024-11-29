<x-filament::page>
    <form wire:submit.prevent="submit" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit">
            Kirim Laporan
        </x-filament::button>

        <x-filament::button type="button" onclick="location.href='{{ url('/admin/login') }}'">
            Kembali
        </x-filament::button>
    </form>

    <script>
        window.addEventListener('notify', event => {
            alert(event.detail.message); // Anda bisa mengganti alert dengan notifikasi custom
        });
    </script>
</x-filament::page>
