<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kandidati') }}
        </h2>
    </x-slot>
    
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
    class="alert max-w-xl mx-auto mt-2 text-center" :class="{ 'bg-green-100 border border-green-400 text-green-700': '{{ session('success') }}', 'bg-red-100 border border-red-400 text-red-700': '{{ session('error') }}' }" role="alert">
        <span class="block sm:inline">{{ session('success') ?: session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" x-on:click="show = false"></span>
    </div>

    <h1 class="text-2xl font-bold py-5 text-center">SPISAK KANDIDATA</h1>
    <div class="flex justify-center items-center my-5">
        <a href="{{ route('dodaj_kandidata') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Dodaj kandidata</a>
    </div>
    
    <div class="py-3 flex flex-col items-center md:bg-white-100 overflow-auto">
        <table class="table-auto overflow-scroll md:bg-gray-100 border-collapse border border-slate-500">
            <thead>
                <tr>
                    <th class="border border-slate-600 p-3 text-center">Ime i prezime</th>
                    <th class="border border-slate-600 p-3 text-center">Datum rođenja</th>
                    <th class="border border-slate-600 p-3 text-center">Kategorija polaganja</th>
                    <th class="border border-slate-600 p-3 text-center">Dodijeljen instruktor</th>
                    <th class="border border-slate-600 p-3 text-center">Akcije</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidati as $kandidat)
                    <tr class="border border-slate-700">
                        <td class="border border-slate-700 p-3 text-center">{{$kandidat->imeprezime}}</td>   
                        <td class="border border-slate-700 p-3 text-center">{{$kandidat->datumRodjenja}}</td>  
                        <td class="border border-slate-700 p-3 text-center">{{$kandidat->kategorijaPolaganja}}</td>
                        <td class="border border-slate-700 p-3 text-center">
                            @if ($kandidat->instruktor_ime_prezime)
                                {{ $kandidat->instruktor_ime_prezime }}
                            @else
                                NIJE DODIJELJEN INSTRUKTOR
                            @endif
                        </td>  
                        <td class="border border-slate-700 p-3 text-center">
                            <a href="{{ route('izmjeni_kandidata', ['id' => $kandidat->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Uredi</a>
                            <form action="{{ route('izbrisi_kandidata', ['id' => $kandidat->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Obriši</button>
                            </form>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-center items-center my-4">
        {{ $kandidati->links() }}
    </div>
</x-app-layout>
