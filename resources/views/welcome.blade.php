<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    </head>
    <body class="bg-gray-200 py-10">
        <div class="max-w-lg bg-white mx-auto p-5 rounded shadow">
            <form action="{{route('tags.store')}}" method="POST" class="flex mb-4">
                @csrf
                <input type="text" name="name" class="rounded-l bg-gray-200 p-4 w-full outline-none" >
                <input type="submit" value="Add" class="rouned-r px-8 bg-blue-400 text-white outline-none hover:cursor">
            </form>
            <h1 class="text-lg text-center mb-4">Tag-List</h1>
            <table>
                @forelse($tags as $tag)
                <tr>
                    <td class="border px-4 py-2">
                        <p>{{$tag->name}}</p>
                    </td>
                    <td class="border px-4 py-2" >
                        <form action="{{route('tags.destroy', ['tag' => $tag->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="px-4 rounded bg-red-500 text-white">
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td>
                            <p>No Tags Yet</p>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </body>
</html>
