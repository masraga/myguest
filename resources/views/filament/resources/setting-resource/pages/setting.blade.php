<x-filament-panels::page>
  <div>
    <x-filament::button
        href="/qr/generate"
        tag="a"
        target="_blank"
    >
        Cetak qrcode komputer
    </x-filament::button>
    @livewire('FormFaceApproval')
  </div>
</x-filament-panels::page>