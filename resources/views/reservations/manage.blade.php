<x-layout>


    <table class="w-full table-auto rounded-sm">
        <tbody>

            <tr class="">
                <th>Title</th>
                <th>Edit</th>

                <th>Delete</th>

            </tr>
            @unless ($listings->isEmpty())
                @foreach ($listings as $listing)
                    <tr style="height: 10px" class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                            <a href="/listings/{{ $listing->id }}"> {{ $listing->title }} </a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                            <a href="/listings/{{ $listing->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>Edit</a>

                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                            <form method="POST" action="/listings/{{ $listing->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Listings Found</p>
                    </td>
                </tr>
            @endunless

        </tbody>
    </table>
</x-layout>
