<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-5">
            {{ __('Instruktori') }}
        </h2>
    </x-slot>

    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
    class="alert max-w-xl mx-auto mt-2 text-center" :class="{ 'bg-green-100 border border-green-400 text-green-700': '{{ session('success') }}', 'bg-red-100 border border-red-400 text-red-700': '{{ session('error') }}' }" role="alert">
        <span class="block sm:inline">{{ session('success') ?: session('error') }}</span>
         <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" x-on:click="show = false">
            </span>
    </div>

    <h1 class="text-2xl font-bold py-5 text-center">SPISAK INSTRUKTORA</h1>
    <div class="py-3 flex justify-center align-start md:bg-white-100">
        <table class="table md:bg-gray-100 border-collapse border border-slate-500 h-50">
            <thead>
                <tr>
                    <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">ID</th>
                    <th class="border border-slate-600 p-3 md:bg-gray-300 text-center">Ime i prezime</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instruktori as $instruktor)
                <tr>
                    <td class="border border-slate-700 p-3 text-center">{{$instruktor->id}}</td>   
                    <td class="border border-slate-700 p-3 text-center">{{$instruktor->ime_prezime}}</td>    
                </tr>
                @endforeach 
            </tbody>
        </table>       
    </div>

    <div class="flex justify-center align-start py-5">
        <div class="py-3 mx-3 md:bg-white-100">
            <h1 class="text-2xl font-bold py-5 text-center">DODJELA INSTRUKTORA</h1>
            <form action="{{ route('dodjela.kandidata') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="instruktor_id" class="block text-gray-700 text-sm font-bold mb-2">Instruktor:</label>
                    <select name="instruktor_id" id="instruktor_id" class="form-select">
                        @foreach ($instruktori as $instruktor)
                            <option value="{{ $instruktor->id }}">{{ $instruktor->ime_prezime }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kandidat_id" class="block text-gray-700 text-sm font-bold mb-2">Kandidat:</label>
                    <select name="kandidat_id" id="kandidat_id" class="form-select">
                        @foreach ($kandidati as $kandidat)
                            <option value="{{ $kandidat->id }}">{{ $kandidat->imeprezime }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-8">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Dodjeli Instruktora</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>