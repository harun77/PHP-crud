<?php require('header.php') ?>
<?php require('db.php') ?>
<?php 
    $message = '';
    if(isset($_POST['name']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = 'INSERT INTO company(Name, Email) VALUES(:name, :email)';
        $statement = $connection->prepare($sql);
        if($statement->execute([':name' => $name, ':email' => $email])){
            $message = 'Data inserted successfully';
            header("Location: /test");
        }
    }
?>
<div class="container mt-5">
<div class="card">
    <div class="card-header">
        <h1>Create</h1>
    </div>

    <div class="card-body">
        <?php if(!empty($message)): ?>
            <div class="alert alert-success">
                <?php echo $message ?>
            </div> 
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Create a people</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php require('footer.php') ?>