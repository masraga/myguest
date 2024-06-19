<div>
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
            <x-filament::button wire:click="rejectGuest" color="gray">Tolak</x-filament::button>
        </x-slot>
    </x-filament::modal>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.js" integrity="sha512-MVIvu+RrRZ8i4gxYMF/87ww/ErVLaW+O1lMHUpNTn0lW5NVXhxALXkQ1vnQbzpalm5eXVhzSmF7Rzf7JVoBhTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@script
<script>
    const socket = io(":3000", {
        secure: false, 
        reconnect: false, 
        rejectUnauthorized: false,
        transports: ["websocket"],
        reconnectionAttempts: 30,
        reconnectionDelay: 2000,
        reconnection: true,
    });

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
