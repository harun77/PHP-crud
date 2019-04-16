<?php require('db.php') ?>
<?php 
    $id = $_GET['id'];
    $sql = 'DELETE FROM company WHERE ID=:id';    
    $statement = $connection->prepare($sql);
    if($statement->execute([':id' => $id])){
        header("Location: /test");
    }
?>