$(document).ready(function(){
//Editor CKeditor    
   ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } ); 
//Rest of the code
    
    
});



