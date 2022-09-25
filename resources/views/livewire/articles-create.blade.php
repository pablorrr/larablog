<div class="w-full">
    <form class="bg-white">
        <div class="mb-4">
            <label class="block" for="articleTitle">Title:</label>
            <input type="text" class="shadow @error('title') is-invalid @enderror  w-full py-2 px-3 text-gray-700 leading-tight" id="articleTitle"
                   placeholder="Enter title" wire:model="title">
            {{--https://laravel.com/docs/9.x/blade#validation-errors--}}
            @error('title') <span class="text-danger">{{ $message }}</span>@enderror

        </div>
        <div class="mb-4">
            {{-- wire:model="content" powizanie z fillable article content (model)
            https://laravel-livewire.com/docs/2.x/properties
            --}}
            <label class="block mb-2" for="articleContent">Content:</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="articleContent" wire:model="content"
                      placeholder="Enter Content"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span>@enderror

        </div>
        <div class="d-grid gap-2">
            <button wire:click.prevent="store()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded btn-block">Save
            </button>
        </div>
        <div class="d-grid gap-2">
            <button wire:click.prevent="cancel()" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded btn-block">Cancel</button>
        </div>
    </form>
</div>
