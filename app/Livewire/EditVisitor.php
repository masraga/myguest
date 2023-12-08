<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms;
use App\Models\Visitor;
use Livewire\Attributes\Url;

class EditVisitor extends Component implements \Filament\Forms\Contracts\HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;

    public Visitor $visitor;

    public $title;
    public $content;

    #[Url] 
    public $search = '';
    
    public function mount(): void
    {
        $this->form->fill([
            'title' => "Raga",
            'content' => "isi konten raga",
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')->default("title")->required(),
            Forms\Components\MarkdownEditor::make('content'),
        ];
    }

    public function render()
    {
        return view('livewire.edit-visitor');
    }
}
