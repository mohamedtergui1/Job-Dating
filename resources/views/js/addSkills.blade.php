<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () { 
     
        var tags = [];
     
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
                    console.log(response);
                }
            });

         });
                 
          
        

       
    });
</script>
