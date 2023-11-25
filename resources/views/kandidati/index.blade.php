<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kandidati') }}
        </h2>
    </x-slot>

    <h1 class="text-2xl font-bold py-5 text-center">SPISAK KANDIDATA</h1>
    <div class="flex justify-center items-center my-5">
        <a href="{{ route('dodaj_kandidata') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Dodaj kandidata</a>
    </div>
    <div class="py-3 flex justify-center align-start md:bg-white-100">
        <table class="table md:bg-gray-100 border-collapse border border-slate-500 h-50">
            <thead>
                <tr>
                    <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Ime i prezime</th>
                    <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Datum rođenja</th>
                    <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Kategorija polaganja</th>
                    <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Akcije</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidati as $kandidat)
                <tr>
                    <td class="border border-slate-700 p-3 text-center">{{$kandidat->imeprezime}}</td>   
                    <td class="border border-slate-700 p-3 text-center">{{$kandidat->datumRodjenja}}</td>  
                    <td class="border border-slate-700 p-3 text-blue-500 text-center">{{$kandidat->kategorijaPolaganja}}</td>  
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
</x-app-layout>
