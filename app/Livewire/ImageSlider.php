<?php

namespace App\Livewire;

// app/Http/Livewire/ImageSlider.php

use Doctrine\DBAL\Schema\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Livewire\Component;
use App\Models\Image;

class ImageSlider extends Component
{
    public $images;

    public function mount()
    {
        // Récupérer toutes les images depuis la base de données
        $this->images = Image::all();
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('livewire.image-slider');
    }
}
