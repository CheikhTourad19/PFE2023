<!-- resources/views/livewire/image-slider.blade.php -->

<div x-data="{ currentSlide: 0 }">
    <div x-show="currentSlide === 0" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
        <img src="{{ $images->last()->url }}" alt="Image" class="w-full">
    </div>
    @foreach ($images as $image)
        <div x-show="currentSlide === {{ $loop->index + 1 }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            <img src="{{ $image->url }}" alt="Image" class="w-full">
        </div>
    @endforeach
    <div x-show="currentSlide === {{ $images->count() + 1 }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
        <img src="{{ $images->first()->url }}" alt="Image" class="w-full">
    </div>
    <button @click="currentSlide === 0 ? currentSlide = {{ $images->count() + 1 }} : currentSlide--" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Prev</button>
    <button @click="currentSlide === {{ $images->count() + 1 }} ? currentSlide = 0 : currentSlide++" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Next</button>
</div>

