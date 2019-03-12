$(document).ready(function(){
//Editor CKeditor    
   ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } ); 
}); 

//Rest of the code 
$(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
        if(this.checked){
            $('.checkBoxes').each(function(){
               this.checked = true; 
            });
        }else{
            $('.checkBoxes').each(function(){
               this.checked = false; 
            });
        }
        
    });
});



