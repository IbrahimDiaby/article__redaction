<?php

    function my_buttons(){
        $btns = array(
            'superscript' => 'superscript',
            'subscript' => 'subscript',
            'heading' => 'h1',
            'h2' => 'h2',
            'h3' => 'h3',
            'h4' => 'h4',
            'h5' => 'h5',
            'h6' => 'h6',
            'paragraph' => 'p',
            'bold' => 'b',
            'italic' => 'i',
            'underline' => 'u',
            'strikethrough' => 'strikethrough',
            'text-height' => 'taille',
            'fill-drip' => 'couleur',
            'list-ul' => 'ul',
            'list-ol' => 'ol',
            'link' => 'lien',
            'unlink' => 'unlink',
            'image' => 'image',
            'redo' => 'redo',
            'undo' => 'undo',
            'indent' => 'indent',
            'outdent' => 'outdent',
            'align-left' => 'left',
            'align-center' => 'center',
            'align-right' => 'right',
            'align-justify' => 'justify',
            'cut' => 'cut',
            'paste' => 'paste',
            'quote-left' => 'blockquote',
            'code' =>'pre',
            'NewParagraph' => 'newParagraph',
            'HorizontalLine' => 'ligne',
            'BackgroudColor' => 'BackgroudColor'
        );
        foreach($btns as $fa => $btn ){
            echo '<i class="fas fa-' . $fa. '" ><input type="button" title=' .$btn . ' id="btn_' . $btn .'" onClick="formatText(\''. $btn .'\')" value="' . ucwords($btn) .'" /></i>'; // Avec La valeur des ecritures
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Redaction d'article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
</head>
<body onload="init()">
    <header></header>
    <section>
        <div class="container">
            <div class="navbar navbar-default">
                <?php
                    my_buttons();
                ?>
            </div>
            <div class="redac-form">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="forms" name="forms" enctype="multipart/form-data">
                <?php
                    if($_POST){
                        require('database.php');
                        $db = Database::connect();
                        
                        if(!empty($_POST['article'])){
                            $today = date("D M j Y");
                            $req = $db->prepare("INSERT INTO articles(subjects, contain, articles_heure) VALUES(?,?,?) ");
                            $req->execute(array($_POST['subject'], $_POST['article'], $today));
                            $reqComments = $db->prepare("INSERT INTO commentaires(author, subjects, comments, comments_heure) VALUES(?, ?, ?, ?) ");
                            $reqComments->execute(array('Admin', $_POST['subject'], 'Vous pouvez laisser vos impressions sur cet article.', $today));
                            $_SESSION['status'] = 'Success';
                            $_SESSION['message'] = "Article rédigé avec succès";
                        }
                    
                        else{
                            $_SESSION['status'] = 'Failure';
                            $_SESSION['message'] = "Erreur. Veuillez reprendre la redaction de votre article";
                        }
                }
                ?>
                <label for="subject">Sujet : </label>
                <input type="subject" name="subject" id="subject" >
                <textarea name="article" id="personal" placeholder="Redigez maintenant...!"></textarea>
                <div name="file_content" id="file_content" contenteditable="true"></div>
                <input type ="button" value="Envoyer" id="Submit_button" onClick="GotoSubmit();" />
            </form>
            </div>
            
        </div>
    </section>
    <footer></footer>
</body>
</html>