
  $(document).ready(function () { 
 
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  
     
        var tags = [];

 
$(".oldSkill").each(function(i, e) {
     
    tags.push($(e).val());  
});

 
$(".skills").each(function(i, e) {
    
    var value = $(e).val();  

     
    if (tags.indexOf(value) !== -1) {
        
        $(e).removeClass("hover:bg-purple-800").addClass("hover:bg-green-800");
        $(e).removeClass("bg-purple-700").addClass("bg-green-700");
    } else {
         
        $(e).addClass("hover:bg-purple-800").removeClass("hover:bg-green-800");
        $(e).addClass("bg-purple-700").removeClass("bg-green-700");
    }
});

console.log(tags);

            $(".skills").click(function () {

            if(tags.indexOf($(this).val()) === -1){
            obj = $(this).val();  
            
            $(this).removeClass("hover:bg-purple-800");
            $(this).addClass("hover:bg-green-800");
            $(this).removeClass("bg-purple-700");
            $(this).addClass("bg-green-700");
            tags.push(obj);
           
            }else {
            var index = tags.indexOf($(this).val());
           
            tags.splice(index, 1); 
            
            $(this).addClass("hover:bg-purple-800");
            $(this).removeClass("hover:bg-green-800");
            $(this).addClass("bg-purple-700");
            $(this).removeClass("bg-green-700");
            
            }
            });

         $("#form").on('submit',function (e) { 
            e.preventDefault();
          
            var formData = new FormData(this); 
            tags.forEach(tag => {
                formData.append("skill_ids[]", tag);
            });
            $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/addskills",
                data: formData,
                processData: false,   
                contentType: false,   
                success: function (response) {
                   
                    

                    swal(response.message, "You clicked the button!", "success");
                    
            
                    
                     
                }
            });

         });
                 
          
        

       
    });
 
