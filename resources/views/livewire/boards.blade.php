<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Boards
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if (Auth::user() !== null)
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="route" class="block text-gray-700 text-sm font-bold mb-2">Адрес:</label>
                            <input type="text" class="form-input rounded-md shadow-sm block mt-1 w-full" id="route" wire:model="route" placeholder="b">
                            @error('route') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Название:</label>
                            <input type="text" class="form-input rounded-md shadow-sm block mt-1 w-full" id="name" wire:model="name" placeholder="/b/ - random">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="bump_limit" class="block text-gray-700 text-sm font-bold mb-2">Бамплимит:</label>
                            <input type="number" class="form-input rounded-md shadow-sm block mt-1 w-full" id="bump_limit" wire:model="bump_limit" placeholder="{{ env('DEFAULT_BUMPLIMIT') }}">
                            @error('bump_limit') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="thread_limit" class="block text-gray-700 text-sm font-bold mb-2">Лимит тредов:</label>
                            <input type="number" class="form-input rounded-md shadow-sm block mt-1 w-full" id="bump_limit" wire:model="thread_limit" placeholder="{{ env('DEFAULT_THREADLIMIT') }}">
                            @error('thread_limit') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Описание:</label>
                            <textarea class="form-input rounded-md shadow-sm block mt-1 w-full" id="description" wire:model="description" placeholder="Описание"></textarea>
                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="hidden" class="block text-gray-700 text-sm font-bold mb-2">Скрытая:
                                <input type="checkbox" class="form-checkbox" id="hidden" wire:model="hidden">
                            </label>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="store()" type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Отправить
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            @foreach($boards as $board)
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <a href="{{ route('board', ['route' => $board->route]) }}">{{ $board->name }}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
