<?php
include 'header.php';
?>
    <h2>Edit Task #<?= $task->getId(); ?></h2>
    <hr>

<?php if (isset($error) && $error): ?>
    <div class="alert alert-warning" role="alert">
        <strong>Error saving task</strong>
    </div>
<?php endif; ?>

<?php if (isset($success) && $success): ?>
    <div class="alert alert-success" role="alert">
        <strong>Task successfully saved</strong>
    </div>
<?php endif; ?>

    <form action="./?controller=task&action=editPost" method="post">
        <input type="hidden" name="id" value="<?= $task->getId(); ?>">
        <div class="form-group row">
            <div class="col-sm-12">
                        <textarea rows="5" name="task" class="form-control" id="inputTask" required
                                  placeholder="Task Description"><?= $task->getTask(); ?></textarea>
            </div>
        </div>
        <div class="form-check row">
            <div class="col-sm-12">
                <input type="checkbox" name="completed" class="form-check-input"
                       id="inputCompleted" <?= $task->isCompleted() ? 'checked' : ''; ?>>
                <label for="inputCompleted" class="form-check-label">Task is completed</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save
                    Task
                </button>
            </div>
        </div>
    </form>

<?php
include 'footer.php';