<form>
    <input type="hidden" wire:model="article_id">
    <div class="form-group mb-3">
        <label for="articleTitle">Title:</label>
        <input type="text" class="form-control" id="categoryName" placeholder="Enter title" wire:model="title">

    </div>
    <div class="form-group mb-3">
        <label for="articleContent">Content:</label>
        <textarea class="form-control" id="ArticleContent" wire:model="content" placeholder="Enter Content"></textarea>

    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
    </div>
</form>
