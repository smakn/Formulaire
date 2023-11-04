
<?php
    //connection a la base de donnee
    $serveur="localhost";
    $utisateur="dev";
    $mot_de_passe="dev";
    $base_de_donne="projet";
    $connexion= mysqli_connect($serveur, $utisateur, $mot_de_passe, $base_de_donne);
    //verification de la connexion
    if ( !$connexion){
        die ("la connection a la base de donnees a echoue :" .mysqli_connect_error());
    }
    //recuperation des variables

    $sujet=$_POST['sujet']?? "bonjour";
    $nom=$_POST['nom']?? 0;
    $prenom=$_POST['Prenom']?? 0;
    $dat=$_POST['dat']?? 0;
    $lieu=$_POST['lieu']?? 0;
    $departement=$_POST['departement']?? 0;
    $region=$_POST['region']?? 0;
    $tel=$_POST['tel']?? 0;
    $e_mail=$_POST['e_mail']?? 0;
    $sujet1=$_POST['sujet1']?? 0;
    $nationalite=$_POST['nationalite']?? 0;
    $ville=$_POST['ville']?? 0;
    $region_o=$_POST['region_o']?? 0;
    $sujet2=$_POST['sujet2']?? 0;
    $profession=$_POST['profession']?? 0;
    $sujet3=$_POST['sujet3']?? 0;
    $messages=$_POST['messages']?? 0;
    
    //requette d'insertion
    $sql="INSERT INTO user(sujet, nom, prenom, dat, lieu, departement, region, tel, e_mail, sujet1, nationalite, ville,
    region_o, sujet2, profession, sujet3, messages) VALUES('$sujet', '$nom', '$prenom', '$dat',
    '$lieu', '$departement', '$region', '$tel', '$e_mail', '$sujet1', '$nationalite', '$ville',
    '$region_o', '$sujet2', '$profession', '$sujet3', '$messages')";
    //execution de la requette
    $stmt = mysqli_prepare($connexion, $sql) ;


    if ($stmt) {
       /* mysqli_stmt_bind_param($stmt, $sujet, $nom, $prenom, $dat,
        $lieu, $departement, $region, $tel, $e_mail, $sujet1, $nationalite, $ville,
        $region_o, $sujet2, $profession, $sujet3, $messages) ;*/
        if (mysqli_stmt_execute($stmt)) {
            echo "Enregistrement réussi !";
        } else {
            echo "Erreur lors de l'enregistrement : " . mysqli_error($connexion) ;
        }
        mysqli_stmt_close($stmt) ;
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($connexion) ;
    }

// validation
if (isset ($_POST['valider'])){
        // Envoi de l'e-mail
        $to = 'nteppsamuel68@gmail.com'; // Remplacez par l'adresse e-mail de destination
        $subject = 'Nouveau formulaire soumis';
        $message = "Un nouveau formulaire a été soumis :\n\n";
        $message .= "Sujet : $sujet\n";
        // Ajoutez ici d'autres champs que vous souhaitez inclure dans l'e-mail
    
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
        if (mail($to, $subject, $message, $headers)) {
            echo "Enregistrement réussi et e-mail envoyé !";
        } else {
            echo "Enregistrement réussi, mais erreur lors de l'envoi de l'e-mail : " . error_get_last()['message'];
        }
    
}
    //fermeture de la connexion
    mysqli_close($connexion);
?>

//{
    // Obliger de remplire tout les chant
    ////if (isset ($_POST['sujet']) AND isset ($_POST['name']) AND isset ($_POST['Prenom']) AND isset ($_POST['date']) AND isset ($_POST['lieu']) AND isset ($_POST['departement'])
    //AND isset ($_POST['region']) AND isset ($_POST['tel']) AND isset ($_POST['e-mail']) AND isset ($_POST['sujet1']) AND isset ($_POST['nationalite']) AND isset ($_POST['ville'])
    //AND isset ($_POST['region-o']) AND isset ($_POST['sujet2']) AND isset ($_POST['profession']) AND isset ($_POST['sujet3']) AND isset ($_POST['message']) AND isset ($_POST['img']))
    // Interdir de laisser les chant vide
    //{
      //  if (!empty ($_POST['sujet']) AND !empty ($_POST['name']) AND !empty ($_POST['Prenom']) AND !empty ($_POST['date']) AND !empty ($_POST['lieu']) AND !empty ($_POST['departement'])
   // AND !empty ($_POST['region']) AND !empty ($_POST['tel']) AND !empty ($_POST['e-mail']) AND !empty ($_POST['sujet1']) AND !empty ($_POST['nationalite']) AND !empty ($_POST['ville'])
   // AND !empty ($_POST['region-o']) AND !empty ($_POST['sujet2']) AND !empty ($_POST['profession']) AND !empty ($_POST['sujet3']) AND !empty ($_POST['message']) AND !empty ($_POST['img']))
   // }

//}

