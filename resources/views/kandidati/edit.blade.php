<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uredi kandidata') }}
        </h2>
    </x-slot>

    <div class="py-3 flex justify-center align-start">
        <form action="{{ route('azuriraj_kandidata', ['id' => $kandidat->id]) }}" method="POST" class="w-full max-w-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="imeprezime" class="block text-gray-700 text-sm font-bold mb-2">Ime i prezime</label>
                <input type="text" name="imeprezime" id="imeprezime" value="{{ $kandidat->imeprezime }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="datumRodjenja" class="block text-gray-700 text-sm font-bold mb-2">Datum rođenja</label>
                <input type="date" name="datumRodjenja" id="datumRodjenja" value="{{ $kandidat->datumRodjenja }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="kategorijaPolaganja" class="block text-gray-700 text-sm font-bold mb-2">Kategorija polaganja</label>
                <input type="text" name="kategorijaPolaganja" id="kategorijaPolaganja" value="{{ $kandidat->kategorijaPolaganja }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ažuriraj kandidata</button>
                <a href="{{ route('kandidati') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Povratak na spisak kandidata</a>
            </div>
        </form>
    </div>
</x-app-layout>
