<div class="card mb-4">
    <div class="card-header">

        <div class="row">
            <div class="col-sm-4">
                <span class="text-muted">
                    ID #<?= $task->getId(); ?> <?= $task->isCompleted() ? '<span class="badge badge-success">Completed</span>' : ''; ?>
                </span>
            </div>
            <div class="col-sm-8 text-right">
                <span class="text-muted">
                    <i class="fa fa-user" aria-hidden="true"></i> <?= $task->getUserName(); ?> &nbsp;
                    <i class="fa fa-envelope" aria-hidden="true"></i> <a
                            href="mailto:<?= $task->getEmail(); ?>"><?= $task->getEmail(); ?></a>
                </span>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <img class="img-thumbnail" src="upload/<?= $task->getImgUrl() ? $task->getImgUrl() : 'noimage.png'; ?>">
            </div>
            <div class="col-sm-12 col-md-8 mt-sm-2 mt-md-0">
                <p class="card-text"><?= $task->getTask(); ?></p>
            </div>
        </div>


        <?php if (Auth::isAdmin()): ?>
            <a href="./?controller=task&action=edit&id=<?= $task->getId(); ?>"
               class="btn btn-primary btn-sm float-right"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Task</a>
        <?php endif; ?>
    </div>
</div>