<div class="w-full">
    <form class="bg-white">
    <input type="hidden" wire:model="article_id">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="articleTitle">Title:</label>
        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="categoryName" placeholder="Enter title" wire:model="title">

    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="articleContent">Content:</label>
        <textarea class="form-control" id="articleContent" wire:model="content" placeholder="Enter Content"></textarea>

    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
    </div>
</form>
</div>
