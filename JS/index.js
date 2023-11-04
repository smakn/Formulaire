
    // L'image img#image
    var image = document.getElementById("image");
     
    // La fonction previewPicture
    var previewPicture  = function (e) {

        // e.files contient un objet FileList
        const [picture] = e.files
        var types = [ "image/jpg", "image/jpeg", "image/png" ];

        // "picture" est un objet File
        if (types.includes(picture.type)) {
            // On affiche l'image sur la page ...

            // L'objet FileReader
            var reader = new FileReader();

            // L'événement déclenché lorsque la lecture est complète
            reader.onload = function (e) {
                // On change l'URL de l'image (base64)
                image.src = e.target.result
            }

            // On lit le fichier "picture" uploadé
            reader.readAsDataURL(picture)

        }
    } 
