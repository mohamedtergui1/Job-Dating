<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Entreprise') }}
        </h2>
    </x-slot>
    <div class="flex justify-center" >
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Entreprise
                    </h3>
                    
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('annonces.update',$annonce->id) }}"  method="post">
                     
                            @csrf
                            @method ("PUT")
                              <div>
                                  <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">title</label>
                                  <input type="text" value="{{$annonce->title}}" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name" required>
                              </div>
          
                              <div>
          
          
                                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your description</label>
                                  <textarea id="description"   name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{$annonce->description}}</textarea>
                                  
                            
                              </div>
          
          
                              <div>
                                 
                              <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                              <select name="entreprise_id"  id="entreprise_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              <option value="{{$entreprise->id}}" selected > {{$entreprise->name}}</option>
                              @foreach($entreprises  as $entreprise )
          
                              <option value="{{ $entreprise->id}}" >{{ $entreprise->name}} </option>
                              
                              @endforeach
                              </select>
          
                              </div>
                              
                              
                              <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                             
                          
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>

