<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-5">
            {{ __('Statistika') }}
        </h2>
    </x-slot>

    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
    class="alert max-w-xl mx-auto mt-2 text-center" :class="{ 'bg-green-100 border border-green-400 text-green-700': '{{ session('success') }}', 'bg-red-100 border border-red-400 text-red-700': '{{ session('error') }}' }" role="alert">
        <span class="block sm:inline">{{ session('success') ?: session('error') }}</span>
         <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" x-on:click="show = false">
            </span>
    </div>


<section class="mb-32 text-center lg:text-left">
  <style>
    @media (min-width: 992px) {
      .rotate-lg-6 {
        transform: rotate(6deg);
      }
    }

    .fancy-border-radius {
      border-radius: 53% 47% 52% 48% / 36% 41% 59% 64%;
    }
  </style>

  <div class="container mx-auto text-center lg:text-left xl:px-32">
    <div class="grid items-center ">
      <div class="mb-12 lg:mb-0">
        <div class="relative z-[1] block rounded-lg bg-[hsla(0,0%,100%,0.55)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:shadow-black/20 md:px-12 lg:-mr-14 backdrop-blur-[30px]">        
          <div class="grid gap-x-6 md:grid-cols-3">
            <div class="mb-12 md:mb-0">
              <h2 class="text-dark mb-4 text-3xl font-bold">Najstariji kadnidat</h2>
              <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
              {{$najstarijiKandidat->imeprezime}},
              {{$najstarijiKandidat->datumRodjenja}}
              </h5>
            </div>

            <div class="mb-12 md:mb-0">
              <h2 class="text-dark mb-4 text-3xl font-bold">Najmađi kandidat</h2>
              <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
              {{$najmladjiKandidat->imeprezime}},
              {{$najmladjiKandidat->datumRodjenja}}
              </h5>
            </div>

            <div class="mb-12 md:mb-0">
              <h2 class="text-dark mb-4 text-3xl font-bold">Kategorija sa najviše kandidata</h2>
              <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
              Kategorija <b>{{$najcescaKategorija->kategorijaPolaganja}}</b>,
              {{$najcescaKategorija->brojPolaganja}} kandidata
              </h5>
            </div>

            <div class="mb-12 md:mb-0 mt-2">
              <h2 class="text-dark mb-4 text-3xl font-bold">Kategorija sa najmanje kandidata</h2>
              <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
              Kategorija <b>{{$minKategorija->kategorijaPolaganja}}</b>,
              {{$minKategorija->brojPolaganja}} kandidata
              </h5>
              </h5>
            </div>

            <div class="mb-12 md:mb-0 mt-2">
              <h2 class="text-dark mb-4 text-3xl font-bold">Najmanje korišten motor</h2>
              <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
                {{$proizvodjac_min}},
                {{$model_min}}
              </h5>
            </div>

            <div class="mb-12 md:mb-0 mt-2">
              <h2 class="text-dark mb-4 text-3xl font-bold">Najviše korišten motor</h2>
              <h5 class="mb-0 text-lg font-medium text-neutral-500 dark:text-neutral-300">
                {{$proizvodjac}},
                {{$model}}
              </h5>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </div>
</section>


    
</x-app-layout>