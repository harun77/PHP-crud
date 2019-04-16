<?php require('header.php') ?>
<?php require('db.php') ?>
<?php
    $sql = 'SELECT * FROM company';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $people = $statement->fetchAll(PDO::FETCH_OBJ);
?>


<div class="container mt-5">
<div class="card">
    <div class="card-header">
        <h1>All Peoples</h1>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
            <?php foreach($people as $entry): ?>
            <tr>
                <td><?php echo $entry->ID ?></td>
                <td><?php echo $entry->Name ?></td>
                <td><?php echo $entry->Email ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $entry->ID ?>" class="btn btn-info">Edit</a>
                    <a href="delete.php?id=<?php echo $entry->ID ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<!-- checkbox -->
<script>
    var flag = false;
    function f(cb){
        flag = cb.checked;
        if(flag){
            document.getElementById('xtra').style.display = "block";
        } else {
            document.getElementById('xtra').style.display = "none";
        }
    }
</script>
<input type="checkbox" id="cb" name="cb" onclick="f(this)">

<div id="xtra" style="display: none">
<form>
    <div class="form-group">
        <label for="formGroupExampleInput">Example label</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" required>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Another label</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
</form>
</div>
<!-- end -->

</div>

<?php require('footer.php') ?>