<x-homelayout> 
    <x-search/>
    <div id="placeResult" class="  grid grid-cols-1 md:grid-cols-2 w-full gap-6  lg:gap-8">
                     
        @foreach ($annonces as $annonce)
            
        
        <a href="{{ route("annonces.show",$annonce->id) }}" class="scale-100 p-6  bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
            
            style="
            background-image: url('{{asset('uploads/ennonces/'. $annonce->image)}}');
            background-size: cover; 
         
            background-position: center center;
            background-repeat: no-repeat;
          "
          
            >
            
            <div   >
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                </div>

                <h2 class="mt-6 text-xl font-semibold text-gray-100 dark:text-gray-100 text-shadow">{{$annonce->title}}</h2>
                <h2 class="mt-6 text-xl font-semibold text-gray-100 dark:text-gray-100 text-shadow">{{$annonce->entreprise->name}}</h2>
                
                <p class="mt-4 text-gray-100 dark:text-gray-400 text-sm leading-relaxed text-shadow">
                    {{$annonce->description}}
                </p>
                
            </div>
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </a>
        @endforeach
     
    </div>
    @if (count($annonces) == 0)
    <div class="flex p-5 pb-10 justify-center">
         <p class=" text-red-700 font-bold text-center text-3xl " >
            its empty
         </p>
    </div>
    @else
        <div class="flex p-5 pb-10 justify-end">
            {{ $annonces->links() }}
        </div>
@endif
    @include('js.annonces_js')
</x-homelayout>