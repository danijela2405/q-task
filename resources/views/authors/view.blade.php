<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Author').": " }}{{ucfirst($author->first_name)." ".ucfirst($author->last_name)}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <span>ID: </span>{{$author->id}}<br>
                    <span>Name: </span>{{ucfirst($author->first_name)." ".ucfirst($author->last_name)}}<br>
                    <span>Birthday: </span>{{date('d.m.Y.',strtotime($author->birthday)) }}<br>
                    <span>Gender: </span>{{$author->gender}}<br>
                    <span>Place Of Birth: </span>{{ucfirst($author->place_of_birth)}}<br><br>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Author's Books</h2><br>

                    <table class="table-auto border-separate border-spacing-2 border border-slate-400">
                        <thead>
                        <tr  class="table-header">
                            <th class="border border-slate-300">ID</th>
                            <th class="border border-slate-300">Title</th>
                            <th class="border border-slate-300">Release Date</th>
                            <th class="border border-slate-300">Description</th>
                            <th class="border border-slate-300">ISBN</th>
                            <th class="border border-slate-300">Format</th>
                            <th class="border border-slate-300">Number Of Pages</th>
                            <th class="border border-slate-300">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($author->books as $book)
                            <tr class="table-row" style="border: 1px;">
                                <td class="border border-slate-300">
                                    {{$book->id}}
                                </td>
                                <td class="border border-slate-300">
                                    {{ucfirst($book->title)}}
                                </td>
                                <td class="border border-slate-300">
                                    {{date('d.m.Y.',strtotime($book->release_date)) }}
                                </td>
                                <td class="border border-slate-300">
                                    {{$book->description}}
                                </td>
                                <td class="border border-slate-300">
                                    {{($book->isbn)}}
                                </td>
                                <td class="border border-slate-300">
                                    {{$book->format}}
                                </td>
                                <td class="border border-slate-300">
                                    {{$book->number_of_pages}}
                                </td>
                                <td class="border border-slate-300">
                                        <form method="POST" action="/books/{{$book->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <br>
                                            <div class="form-group">
                                                <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Delete">
                                            </div>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
