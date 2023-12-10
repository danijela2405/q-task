<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <table class="table-auto border-separate border-spacing-2 border border-slate-400">
                        <thead>
                        <tr  class="table-header">
                            <th class="border border-slate-300">ID</th>
                            <th class="border border-slate-300">Name</th>
                            <th class="border border-slate-300">Birthday</th>
                            <th class="border border-slate-300">Gender</th>
                            <th class="border border-slate-300">Place Of Birth</th>
                            <th class="border border-slate-300">Books count</th>
                            <th class="border border-slate-300">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr class="table-row" style="border: 1px;">
                                <td class="border border-slate-300">
                                    {{$author->id}}
                                </td>
                                <td class="border border-slate-300">
                                    {{ucfirst($author->first_name)." ".ucfirst($author->last_name)}}
                                </td>
                                <td class="border border-slate-300">
                                    {{date('d.m.Y.',strtotime($author->birthday)) }}
                                </td>
                                <td class="border border-slate-300">
                                    {{$author->gender}}
                                </td>
                                <td class="border border-slate-300">
                                    {{ucfirst($author->place_of_birth)}}
                                </td>
                                <td class="border border-slate-300">
                                    {{$author->books_count}}
                                </td>
                                <td class="border border-slate-300">
                                    <a href="/authors/{{$author->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Details</a>
                                    @if($author->books_count ==0)
                                        <form method="POST" action="/authors/{{$author->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <br>
                                            <div class="form-group">
                                                <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Delete">
                                            </div>
                                        </form>
                                    @endif
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
