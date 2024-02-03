<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $(document).ready(function () {
       
        $("#search").on('input', function(e) {
            e.preventDefault();

           
            var search_string = $(this).val().trim();

           
            $.ajax({
                type: "GET",
                url: "/search", 
                data: {search_string: search_string},
                dataType: "json",
                success: function (response) {
                    
                    $("#placeResult").html("")
             
                        appenRespose(response);
                 
                
                },
                error: function (error) {
                    $("#placeResult").html(`
                            <div class=" felx justify-center  " >
                                <p class=" text-center text-2xl text-red-700 p-10 " >
                                    no result found  for  !! <b> ${search_string} </b> 
                                </p>
                            </div>
                    `)
                  
                   
                   
                }
            });
        });
    });

    function appenRespose(data){
        data.forEach(r => {
          
                   
               
                      $("#placeResult").append(

                              `
                              <a href="http://127.0.0.1:8000/annonces?${r.id}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                              
                              style="
                            background-image: url('http://127.0.0.1:8000/uploads/ennonces/${r.image}');
                            background-size: cover; 
                            background-size: cover;
                            background-position: center center;
                            background-repeat: no-repeat;
                          "
                          

                              >
                          <div>
                              <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                  </svg>
                              </div>

                              <h2 class="mt-6 text-xl font-semibold  text-white">${r.title}</h2>
                              <h2 class="mt-6 text-xl font-semibold  text-white">${r.entreprise.name}</h2>

                              <p class="mt-4  text-white text-sm leading-relaxed">
                                  ${r.description}
                              </p>
                          </div>
                          
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                          </svg>
                      </a>

                              `

                      );
                      setTimeout(() => {
                         console.log("wiki")
                    }, 100);
               
                  });  
    }




</script>
