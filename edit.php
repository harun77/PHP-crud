<?php require('header.php') ?>
<?php require('db.php') ?>
<?php 
    $id = $_GET['id'];
    $sql = 'SELECT * FROM company WHERE ID=:id';
    $statement = $connection->prepare($sql);
    $statement->execute([':id' => $id]);
    $people = $statement->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['name']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = 'UPDATE company SET Name=:name, Email=:email WHERE ID=:id';
        $statement = $connection->prepare($sql);
        if($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])){
            header("Location: /test");
        }
    }
?>

<style>
    input.error{
        border: 1px red solid;
    }
    label.error{
        color: red;
    }
</style>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit</h1>
        </div>

        <div class="card-body">
            <form method="post" id="registration">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo $people->Name ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $people->Email ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery validation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="./validation-rule.js"></script>

<?php require('footer.php') ?>