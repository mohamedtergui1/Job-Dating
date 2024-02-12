 
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
                    
                    if(response.status==="1")
                    appenRespose(response.annonces, response._token)
                        else $("#placeResult").html(`
                        <div class=" felx justify-center  " >
                            <p class=" text-center text-2xl text-red-700 p-10 " >
                                no result found  for  !! <b> ${search_string} </b> 
                            </p>
                        </div>
                    `)
                 
                
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





     
     const dark  = "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
     const white = "py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none   bg-white rounded-lg border border-gray-200     hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4  focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600   dark:hover:text-white dark:hover:bg-gray-700"
    $("#all").click(function(e) {
        getWithAjax("./allannonces") 
      $(this).removeClass(dark);
      $(this).addClass(white);

      
      $("#match").removeClass(white );
        $("#match").addClass(dark);
          
      });
  
   
        
      
      $("#match").click(function (e) { 
         
        getWithAjax("./matchannonces")
        $(this).removeClass(dark);
        $(this).addClass(white);
     
      $("#all").removeClass(white);
     $("#all").addClass(dark);
        
      });
  
      function getWithAjax(url){
        $.ajax({
              url:url,
              method: "GET",
              datatype: 'json',
              success: function(response) {
                    if(response.status==="1")
                   appenRespose(response.annonces, response._token)
              },
              error: function(xhr, status, error) {
                  console.error(error);
              }
          });
      }
   


      function appenRespose(data,token){
        $("#placeResult").html("")
       
      
            data.forEach(r => {
                let skillsHTML = '';  
                
                for (let i = 0; i < r.skills.length; i++) {
                    const skill = r.skills[i];
                    if (i <= 1) {
                        skillsHTML += `<span class="bg-gray-200 rounded-sm shadow py-1 px-2">${skill.name}</span>`;
                    } else {
                        skillsHTML += `<span class="bg-gray-200 rounded-sm shadow py-1 px-2">..</span>`;
                        break;
                    }
                }
                
                       
                   
                          $("#placeResult").append(
    
                            `
                            <div>
                            
                            <a  href="http://127.0.0.1:8000/annonces/${r.id}" class="scale-100 p-6  bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                                
                                style="
                                background-image: url('http://127.0.0.1:8000/uploads/ennonces/${r.image}');
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
                    
                                    <h2 class="mt-6 text-xl font-semibold text-gray-100 dark:text-gray-100 text-shadow">${r.title}</h2>
                                    <h2 class="mt-6 text-xl font-semibold text-gray-100 dark:text-gray-100 text-shadow">${r.entreprise.name}</h2>
                                    
                                    <p class="mt-4 text-gray-100 dark:text-gray-400 text-sm leading-relaxed text-shadow">
                                            ${r.description}
                                    </p>
                                 
                                </div>
                               
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                           
                    
                            </a>
                            <div  class="flex p-2 lg:justify-between " > 
                              <div class="  flex gap-3 " >
                              ${skillsHTML}
                                      
                              </div>
                              <form action="/postuler" method="post" >
                              <input type="hidden" name="_token" value="${token}" autocomplete="off">
                                  <input type="hidden" name="annonce_ids[]" value="${r.id}"  >
                              <button class="bg-blue-600 text-white px-2 py-1 rounded-md" >
                                  postuler
                              </button>
                                  </form>
                          </div>
                        </div> 
                            
                            `
    
                          );
                 
                   
                      });  
    
    
    
        }



    
    

    });

  


 