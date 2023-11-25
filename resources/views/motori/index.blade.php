<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-5">
            {{ __('Motori') }}
        </h2>
    </x-slot>

    <div class="flex justify-center align-start py-5">
        <div class="py-3 mx-3 md:bg-white-100">
            <h1 class="text-2xl font-bold py-5 text-center">LISTA MOTORA</h1>
            <table class="table md:bg-gray-100 border-collapse border border-slate-500 h-50">
                <thead>
                    <tr>
                        <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Proizvođač</th>
                        <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Model</th>
                        <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Tip</th>
                        <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Kategorije polaganja</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($motori as $motor)
                        <tr>
                            <td class="border border-slate-700 p-3 text-center">{{$motor->proizvodjac}}</td>   
                            <td class="border border-slate-700 p-3 text-center">{{$motor->model}}</td>
                            <td class="border border-slate-700 p-3 text-center">{{$motor->tip}}</td>   
                            <td class="border border-slate-700 p-3 text-blue-500 text-center">{{$motor->kategorijaPolaganja}}</td> 
                            
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex justify-between align-start p-6">
        @foreach ($kategorije as $kategorija)
            <div class="py-3 mx-3 md:bg-white-100">
                <h1 class="text-2xl font-bold py-5 text-center">KATEGORIJA {{ $kategorija }}</h1>
                <table class="table md:bg-gray-100 border-collapse border border-slate-500 h-50">
                    <thead>
                        <tr>
                            <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Kandidati</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rezultati[$kategorija] as $rezultat)
                            <tr>
                                <td class="border border-slate-700 p-3 text-center">{{ $rezultat->imeprezime }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</x-app-layout>
