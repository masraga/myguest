<?php

namespace App\Livewire;


use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Form;
use Filament\Forms\Components\Actions\Action;
use Filament\Notifications\Notification; 
use Livewire\Attributes\On;
use App\Models\Guest;
use App\Models\VisitorCard;
use App\Models\Visitor;


class FormFaceApproval extends Component implements HasForms
{
    use InteractsWithForms;

    public $faceImage;
    public $visitorCode;
    public $guestId;
    public $name;
    public $gender;
    public $phone;
    public $description;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make("visitorCode")
            ->label("kode kunjungan")
            ->default($this->visitorCode)
            ->extraInputAttributes(['readonly' => true]),
            TextInput::make("guestId")
            ->label("ID Pengunjung")
            ->autofocus()
            ->required(),
            TextInput::make("name")
            ->label("nama pengunjung")
            ->required(),
            Radio::make("gender")
            ->label("kelamin")
            ->options([
                "laki-laki" =>  "laki-laki",
                "perempuan" =>  "perempuan",
            ])
            ->required(),
            TextInput::make("phone")
            ->label("Telepon")
            ->required(),
            Textarea::make("description")
            ->label("Keperluan")
            ->required(),
        ]); 
    }

    #[On('open-face-detector')]
    public function handleFaceDetector($visitorCode = null, $faceImage = null)
    {
        $this->visitorCode = $visitorCode;
        $this->faceImage = asset($faceImage);
        $this->dispatch('open-modal', id: 'face-detector');
    }

    public function rejectGuest() {
        $this->dispatch('close-modal', id: 'face-detector');
    }

    public function addGuest() {
        $this->dispatch('close-modal', id: 'face-detector');
        $this->dispatch('open-modal', id: 'form-guest');
    }

    public function saveGuest() {
        $card = VisitorCard::where(["card_id" => $this->visitorCode])->first();
        $guest = Guest::create([
            "id_card" => $this->guestId,
            "name" => $this->name,
            "gender" => $this->gender,
            "phone" => $this->phone,
            "description" => $this->description,
        ]);
        $visitor =  Visitor::create([
            "visitor_card_id" => $card->id,
            "guest_id" => $guest->id
        ]);
    
        Notification::make() 
        ->title('Data kunjungan berhasil disimpan')
        ->success()
        ->send();

        $this->dispatch('close-modal', id: 'form-guest');  
        return redirect()->to("/generate-visitor-card?visitorCard=".$card->id);
    }

    public function render()
    {
        return view('livewire.form-face-approval');
    }
}
