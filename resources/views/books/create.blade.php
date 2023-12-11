<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a new book') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('books.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        <div>
                            <label for="author">Author</label>
                            <select id="author" name="author" required>
                                @foreach($authors as $author)
                                    <option
                                        value="{{ $author->id }}">{{ucfirst($author->first_name)." ".ucfirst($author->last_name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="title">Title</label>
                            <input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus/>
                        </div>
                        <div>
                            <label for="release_date">Release Date</label>
                            <input id="release_date" name="release_date" type="date" class="mt-1 block w-full" required autofocus/>
                        </div>
                        <div>
                            <label for="description">Description</label>
                            <input id="description" name="description" type="text" class="mt-1 block w-full" required autofocus/>
                        </div>
                        <div>
                            <label for="isbn">ISBN</label>
                            <input id="isbn" name="isbn" type="text" class="mt-1 block w-full" required autofocus/>
                        </div>
                        <div>
                            <label for="format">Format</label>
                            <input id="format" name="format" type="text" class="mt-1 block w-full" required autofocus/>
                        </div>
                        <div>
                            <label for="number_of_pages">Number Of Pages</label>
                            <input id="number_of_pages" name="number_of_pages" type="number" class="mt-1 block w-full" required autofocus/>
                        </div>
                        <div class="flex items-center gap-4">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
