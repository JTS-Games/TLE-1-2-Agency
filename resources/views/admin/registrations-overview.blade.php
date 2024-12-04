<x-layout title="screening">
    <div class="flex items-center justify-center py-10">
        <h1 class="text-6xl font-bold text-gray-800 text-center">Pending screenings</h1>
    </div>

    <div class="flex justify-center items-center mt-4">
        <ul class="w-1/4 space-y-5">
            @foreach($companies as $company)
                <li class="bg-green-200 rounded-3xl p-4 flex flex-col items-center text-center shadow">
                    <p class="font-bold text-lg uppercase">{{ $company->name }}</p>
                    <div class="my-3">
                        <a href="#" class="bg-pink-600 text-white py-1 px-4 rounded-full text-sm shadow-md hover:bg-pink-700">Bekijk details</a>
                    </div>
                    <div class="flex justify-center space-x-4">
                        <div>
                            <form action="{{ route('screenings.update', $company) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-600 text-white rounded-full py-1 px-4 shadow-md hover:bg-green-700 flex items-center space-x-1">
                                    <span>Verify</span>
                                </button>
                            </form>
                        </div>
                        <div>
                            <form action="{{ route('screenings.destroy', $company) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white rounded-full py-1 px-4 shadow-md hover:bg-red-700 flex items-center space-x-1">
                                    <span>Dismiss</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
s
</x-layout>
