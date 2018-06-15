<?php
include 'header.php';
?>

    <h2>Add Task</h2>
    <hr>

<?php if (isset($error) && $error): ?>
    <div class="alert alert-warning" role="alert">
        <strong>Error adding task.</strong>
    </div>
<?php endif; ?>

    <form action="./?controller=task&action=addPost" enctype="multipart/form-data" method="post" id="addForm">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="user_name" class="form-control" id="inputName" placeholder="Your Name"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail"
                       placeholder="Email Address" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputTask" class="col-sm-2 col-form-label">Task</label>
            <div class="col-sm-10">
                        <textarea name="task" class="form-control" id="inputTask" required
                                  placeholder="Task Description"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputImg" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" name="img" class="form-control" id="inputImg">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button class="btn btn-primary" id="previewButton"><i class="fa fa-eye" aria-hidden="true"></i>
                    Preview Task
                </button>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add
                    Task
                </button>
            </div>
        </div>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Task Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-8 text-right">
                                    <span class="text-muted">
                                        <i class="fa fa-user" aria-hidden="true"></i> <span id="taskUser"></span>&nbsp;
                                        <i class="fa fa-envelope" aria-hidden="true"></i> <span id="taskEmail"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <img class="img-thumbnail" src="upload/noimage.png" id="taskImg">
                                </div>
                                <div class="col-sm-12 col-md-8 mt-sm-2 mt-md-0">
                                    <p class="card-text" id="taskText"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function readURL(input) {
                var url = input.value;
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#taskImg').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#taskImg').attr('src', 'upload/noimage.png');
                }
            }

            $("#inputImg").change(function () {
                readURL(this);
            });

            $('#previewButton').on('click', function (event) {
                event.preventDefault();
                $('#taskUser').text($('#inputName').val());
                $('#taskEmail').text($('#inputEmail').val());
                $('#taskText').text($('#inputTask').val());

                $('#exampleModal').modal('show');
            })
        });
    </script>
<?php
include 'footer.php';