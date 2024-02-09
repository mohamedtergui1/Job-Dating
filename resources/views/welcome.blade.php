<x-homelayout> 
    <x-search/>
    @if(session('success'))
   
    <div id="alert-3" class=" lg:m-10 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
          {{ session('success') }}        
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
  @endif

  @if ($errors->any())

  <div id="alert-2" class="lg:m-10   flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
       @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
  @endif         


    <div id="placeResult" class="  grid grid-cols-1 lg:grid-cols-2 w-full gap-6  lg:gap-8">
                     
        @foreach ($annonces as $annonce)
           <div>
        
        <a  href="{{ route("annonces.show",$annonce->id) }}" class="scale-100 p-6  bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
            
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
        <div  class="flex p-2 lg:justify-between " > 
          <div class="  flex gap-3 " >
                 @foreach ($annonce->skills as $i=> $skill)
                 @if ($i>1) 
                 <span class="bg-white rounded-lg shadow py-1 px-2 " >..</span>
                 @break
                 @endif
                     <span class="bg-gray-200 rounded-sm shadow py-1 px-2 " >{{$skill->name}}</span>
                 @endforeach
                  
          </div>
          <form action="{{route("postuler")}}" method="post" >
              @csrf
              <input type="hidden" name="annonce_ids[]" value="{{$annonce->id}}"  >
          <button class="bg-blue-600 text-white px-2 py-1 rounded-md" >
              postuler
          </button>
              </form>
      </div>
    </div> 
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
            {{-- {{ $annonces->links() }} --}}
        </div>
@endif
<script src="{{asset('js/search.js')}}"></script>
</x-homelayout>