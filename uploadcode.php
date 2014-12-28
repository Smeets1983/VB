<?php
        //Als er geen bestand wordt ge-upload error weergeven
        if(!empty($_FILES["foto"])) {	
        if ($_FILES["foto"]["error"] > 0)  {  
            echo "Error: " . $_FILES["foto"]["error"] . "<br>";  
        }
    }

        if (isset($_FILES["foto"])) {
        //Waar worden de fotoś gepplaatst?
        $foto = $_FILES["foto"]["name"];	
        $padnaam = "images/" . $foto;	//Map images bestaat al
        
        if (file_exists($padnaam)) {      
        echo $foto . "";    
        }    
        
        //verplaats bestand naar de uploadmap
        else {      
        move_uploaded_file($_FILES["foto"]["tmp_name"],$padnaam);      
        echo "Stored in: " . $padnaam; 
    }
}
?>