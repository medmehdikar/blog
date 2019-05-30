<?php 

function get_posts()
{

    global $db;

    $req = $db->query("
        SELECT posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admin.name
        FROM posts
        JOIN admin
        ON posts.writter = admin.email
        WHERE posts.id='{$_GET['id']}'
        AND posts.posted = '1'
    ");

    $results = $req->fetchObject();
    return $results;

}

//commentaire à stocker dans la BDD

function comment($name, $email, $comment){

    global $db; 

    //tableau initialisé $c
    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $_GET["id"]
    );

    $sql = "INSERT INTO comments(name,email,comment,post_id,date)
            VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c); 
}

//Aficher les commentaires

function get_comment(){

    global $db; 
    $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' 
                       ORDER BY date DESC ");
    $results = [];
    
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;
                    
}