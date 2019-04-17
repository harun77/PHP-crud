<?php require('header.php') ?>
<?php require('db.php') ?>
<?php 
    $message = '';
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['url']) && isset($_POST['phone'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $url = $_POST['url'];
        $phone = $_POST['phone'];

        $sql = 'INSERT INTO company(Name, Email, URL, Phone) VALUES(:name, :email, :url, :phone)';
        $statement = $connection->prepare($sql);
        if($statement->execute([':name' => $name, ':email' => $email, ':url' => $url, ':phone' => $phone])){
            $message = 'Data inserted successfully';
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
            <h1>Create</h1>
        </div>

        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message ?>
                </div> 
            <?php endif; ?>
            <form method="post" id="registration">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter url">
                </div>
                <div class="form-group">
                    <label for="phone">Phone no.</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Create a people</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jQuery validation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="./validation-rule.js"></script>

<?php require('footer.php') ?>