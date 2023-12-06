<div>
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js" integrity="sha384-mZLF4UVrpi/QTWPA7BjNPEnkIfRFn4ZEO3Qt/HFklTJBj/gBOV8G3HcKn4NfQblz" crossorigin="anonymous"></script>
    <x-filament::modal id="form-guest">
        <form wire:submit.prevent="saveGuest">
            <x-slot name="heading">Form tamu</x-slot>
            <div style="display:flex;justify-content:center;">
                <div>
                    <img class="image-face" src="{{$this->faceImage}}" width="200" height="200">
                </div>
            </div>
            {{$this->form}}
            <x-slot name="footer">
                <x-filament::button wire:click="saveGuest">Simpan & Cetak</x-filament::button>
            </x-slot>
        </form>
    </x-filament::modal>
    
    <x-filament::modal id="face-detector">
        <x-slot name="heading">Tamu Baru</x-slot>
        <div style="display:flex;justify-content:center;">
            <div>
                <img class="image-face" src="{{$this->faceImage}}" width="400" height="400">
            </div>
        </div>
        <x-slot name="footer">
            <x-filament::button wire:click="addGuest">Terima</x-filament::button>
            <x-filament::button color="gray">Tolak</x-filament::button>
        </x-slot>
    </x-filament::modal>

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js" integrity="sha384-mZLF4UVrpi/QTWPA7BjNPEnkIfRFn4ZEO3Qt/HFklTJBj/gBOV8G3HcKn4NfQblz" crossorigin="anonymous"></script>
@script
<script>
    const socket = io("http://localhost:3000");
    const baseUrl = '{{ URL::asset('') }}';
    socket.on("connect", () => {
        socket.on("show-face", (data) => {
            data = JSON.parse(data);
            $wire.dispatch("open-face-detector", {visitorCode: data.code, faceImage: data.face});
        })
    })
</script>
@endscript
</div>
