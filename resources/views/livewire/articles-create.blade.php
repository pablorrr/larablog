<div class="w-full">
    <form class="bg-white">
        <div class="mb-4">
            <label class="block" for="articleTitle">Title:</label>
            <input type="text" class="shadow w-full py-2 px-3 text-gray-700 leading-tight" id="articleTitle"
                   placeholder="Enter title" wire:model="title">

        </div>
        <div class="mb-4">
            <label class="block mb-2" for="articleContent">Content:</label>
            <textarea class="form-control" id="articleContent" wire:model="content"
                      placeholder="Enter Content"></textarea>

        </div>
        <div class="d-grid gap-2">
            <button wire:click.prevent="store()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded btn-block">Save
            </button>
        </div>
    </form>
</div>
