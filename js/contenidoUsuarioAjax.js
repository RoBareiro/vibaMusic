$(document).ready(function() {
    
            $('#perfil').click(function(){ 
               $("#central").load('modificarPerfil.php'); 
               /* $.ajax({
                    type: "POST",
                    url: "modificarPerfil.php",
                    success: function(a) {
                        $('#central').html(a);  
                    }
                });*/
            });
            
            $('#playlist').click(function(){
                $("#central").load('playlists.php'); 
                /*$.ajax({
                    type: "POST",
                    url: "inc/products.php",
                    /
                    success: function(a) {
                        $('#central').html(a);  
                    }
                });*/
            });
            
            $('#siguiendo').click(function(){ 
                 $("#central").load('siguiendo.php');
                 /*$.ajax({
                    type: "POST",
                    url: "inc/gallery.php",
                    success: function(a) {
                        $('#central').html(a);  
                    }
                });*/       
            });
            
        });