<x-homelayout>
    <div>
        <button>
         
        </button>
        


  
  <!-- Main modal -->
  <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Static modal
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="flex justify-start flex-wrap gap-3 p-6" >
               @foreach ($skills as $skill)
               <button  type="button" value="{{$skill->id}}" class=" skills  focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">{{$skill->name}}</button>
               @endforeach
             
            </div>
              <!-- Modal footer -->
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <form id="form">
                    @csrf
                    <input type="hidden" name="user_id"  value="{{Auth::user()->id}}">
                  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                </form>
                  <button data-modal-hide="static-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
              </div>
          </div>
      </div>
  </div>
   
<div class="flex justify-around  " >
  <div  class="flex flex-col lg:w-1/2 m-1 p-3 shadow  gap-5">
    <div class="flex justify-end m-2" >
        <a href="{{route('userprofile.edit')}}">
             <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M17 10v1.1l1 .5.8-.8 1.4 1.4-.8.8.5 1H21v2h-1.1l-.5 1 .8.8-1.4 1.4-.8-.8a4 4 0 0 1-1 .5V20h-2v-1.1a4 4 0 0 1-1-.5l-.8.8-1.4-1.4.8-.8a4 4 0 0 1-.5-1H11v-2h1.1l.5-1-.8-.8 1.4-1.4.8.8a4 4 0 0 1 1-.5V10h2Zm.4 3.6c.4.4.6.8.6 1.4a2 2 0 0 1-3.4 1.4A2 2 0 0 1 16 13c.5 0 1 .2 1.4.6ZM5 8a4 4 0 1 1 8 .7 7 7 0 0 0-3.3 3.2A4 4 0 0 1 5 8Zm4.3 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h6.1a7 7 0 0 1-1.8-7Z" clip-rule="evenodd"/>
          </svg> 
        </a>
      
          
    </div>
    
    <div  class="flex justify-start gap-1" >
        <p>Full Name :</p>
        <p>{{$user->name}}</p>
    </div>
    
    <div   class="flex justify-start gap-1" >
        <p>Email :</p>
    <p>{{$user->email}}</p>
     </div>
</div>

 
<div class="lg:w-1/2 m-1 shadow p-3 " >
    <div  class="flex justify-end" >
<button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
   
   
    @if(count($user->skills))
    EDIT SKILLS 
    @else 
    ADD SKILLS
   
   
    @endif
  </button>
</div>
  <div class="flex justify-start flex-wrap gap-3 p-6" >
    @foreach ($user->skills as $skill)
    <button  type="button" value="{{$skill->id}}" class=" oldSkill    focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">{{$skill->name}}</button>
    @endforeach
   
 </div>
</div>
</div>


    </div>
    <div id="placeResult" class="  grid grid-cols-1 md:grid-cols-2 w-full gap-6 mt-10 lg:gap-8">
                     
        @foreach ($user->annonces as $annonce)
            
        
        <div  class="scale-100 p-6  bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
            
            style="
            background-image: url('{{asset('uploads/ennonces/'.$annonce->image)}}');
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
            
             <div  class="flex pt-1 justify-between " > 
                <div class="  flex gap-3 " >
                       @foreach ($annonce->skills as $i=> $skill)
                       @if ($i>1) 
                       <span class="bg-white rounded-lg shadow py-1 px-2 " >..</span>
                       @break
                       @endif
                           <span class="bg-gray-200 rounded-sm shadow py-1 px-2 " >{{$skill->name}}</span>
                       @endforeach
                        
                </div>
                
            </div>
            </div>
            <a href="{{ route("annonces.show",$annonce->id) }}" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </a>
        </div>
        @endforeach
     
    </div>
    <script src="{{asset('js/addSkills.js')}}"></script>
    
</x-homelayout>
