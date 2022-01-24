<div>
    <div class="w-full flex pb-10">

        @if($updateArticle)
            @include('livewire.articles-update')
        @endif
    </div>

    <div class="w-full flex pb-10">

        @if($createFormFlag)
            <div class="w-1/6 relative mx-1">
                @include('livewire.articles-create')
            </div>

        @endif

    </div>

    <div class="w-full flex pb-10">

        <div class="w-3/6 mx-1">
            <input wire:model.debounce.300ms="search" type="text"
                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   placeholder="Search articles...">
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="sortField"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                <option value="id">author name</option>
                <option value="title">titte</option>
                <option value="content">content</option>

            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>
        <div class="w-1/6 relative mx-1">
            <select wire:model="sortAsc"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state">
                <option value="1">Ascending</option>
                <option value="0">Descending</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>

        <div class="w-1/6 relative mx-1">
            @if($createFormFlag == false)
                <button wire:click="addCreateForm"
                        class="block appearance-none w-full bg-red-500 border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    Add Article
                </button>
            @endif

        </div>
        <div class="w-1/6 relative mx-1">
            <button wire:click="deleteArticles"
                    class="block appearance-none w-full bg-red-500 border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                Delete
            </button>
        </div>

    </div>
    @if($articles->isNotEmpty())
        <table class="table-auto w-full mb-6">
            <thead>
            <tr>
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2">author name</th>
                <th class="px-4 py-2">title</th>
                <th class="px-4 py-2">content</th>

            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td class="border px-4 py-2">
                        <input wire:model="selected" value="{{ $article->id }}" type="checkbox">
                    </td>
                    <td class="border px-4 py-2">
                        <a href="{{route('admin.user.show',$article->user->id)}}">{{$article->user->name}}</a>
                    </td>
                    <td class="border px-4 py-2">{{ $article->title }}</td>
                    <td class="border px-4 py-2">{{ $article->content }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{$article->id}})" class="bg-blue-500 hover:bg-blue-700 text-white">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $articles->links() !!}
    @else
        <p class="text-center">Whoops! No articles were found 🙁</p>
    @endif
</div>
