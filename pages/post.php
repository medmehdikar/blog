<?php

$post = get_posts();
if($post == false){
    header("Location:index.php?page=error");
}else{
    ?>
        </div>
        <div class="parallax-container">
            <div class="parallax">
                <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>"/>
            </div>
        </div>
        <div class="container">

            <h2><?= $post->title ?></h2>
            <h6>Par <?= $post->name ?> le <?= date("d/m/Y à H:i", strtotime($post->date)) ?></h6>
            <p><?= nl2br($post->content); ?></p>
    <?php
}
?>
        <?php

            if(isset($_POST['submit'])){
                $name = htmlspecialchars(trim($_POST['name']));
                $email = htmlspecialchars(trim($_POST['email']));
                $comment = htmlspecialchars(trim($_POST['comment']));
                $errors = [];

                if (empty($name) || empty($email) || empty($comment)) {
                    $errors['empty'] = "Tous les champs n'ont pas été remplis";
                } else {
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $errors['email'] = "L'adresse email n'est pas valide";
                    }
                }

                

                if(!empty($errors)){
            ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                            foreach($errors as $error){
                                echo $error."<br/>";
                            }
                        ?>
                    </div>
                </div>
            <?php
            
                }else{
                    comment($name,$email,$comment);
                    ?>

                    <script>
                        window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>")
                    </script>

                    <?php
                }
                
            }

        ?>


        <hr>
        <h4>Commentaires : </h4>
        <?php

            $responses = get_comment();
            if($responses != false){
                foreach($responses as $response){
                    ?>
    
                        <blockquote>
                            <strong><?= $response->name ?> le <?= date('d/m/Y', strtotime($response->date)) ?></strong>
                            <p><?= nl2br($response->comment)?></p>
                        </blockquote>
    
                    <?php
                }
            }else{
                echo 'Aucun commentaire publié - Soyez le premier';
            }

        ?>
        <h4>Commenter : </h4>

        <form action="" method="post">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" name="name" id="name">
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="email" name="email" id="email">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <textarea name="comment" id="comment" class="materialize-textarea" cols="30" rows="10"></textarea>
                    <label for="comment">Commentaires</label>
                </div>
                <div class="col s12">
                    <button type="submit" name="submit" class="btn waves-effect">Commenter ce post</button>
                </div>
            </div>
        </form>