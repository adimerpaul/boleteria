 $(function(){

  $('#foto').change(function(e) {
      addImage(e); 
     });
  $('#pass2,#pass1').keyup(function(e){
   
   $('#boton').prop("disabled", $('#pass1').val()!=$('#pass2').val());
   
  });


 });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
     
      if (!file.type.match(imageType))
       return;
    
  
      var reader = new FileReader();
      reader.onload = function(e) {
          var result=e.target.result;
          $('#imgfoto').attr("src",result);
      };
      reader.readAsDataURL(file);
     }

