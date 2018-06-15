<?php
include 'header.php';
?>
    <div class="row">
        <div class="col-sm-8">
            <h2>Current Tasks</h2>
        </div>
        <div class="col-sm-4 text-right">
            <?php if ($tasks): ?>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort Tasks
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./?sort=id">Id</a>
                        <a class="dropdown-item" href="./?sort=user_name">User Name</a>
                        <a class="dropdown-item" href="./?sort=email">Email</a>
                        <a class="dropdown-item" href="./?sort=completed">Status</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <hr>

<?php if ($tasks): ?>

    <?php foreach ($tasks as $task): ?>
        <?php include 'task.php'; ?>
    <?php endforeach; ?>

    <?php include 'pagination.php'; ?>

<?php else: ?>

    <div class="alert alert-danger">
        No Tasks found! You can <a href="./?controller=task&action=add">Add</a> one.
    </div>

<?php endif; ?>
<?php
include 'footer.php';