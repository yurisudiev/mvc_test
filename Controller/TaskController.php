<?php

/**
 * Class TaskController
 */
class TaskController
{
    /**
     * Shows Add task form
     */
    public function addAction()
    {
        $task = new Task();
        $view = new View('addtask.php');
        $view->render(['task' => $task]);
    }

    /**
     * Add task form processing
     */
    public function addPostAction()
    {
        $user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $task_text = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING);
        $img_url = '';

        if (isset($_FILES['img']['tmp_name']) && $_FILES['img']['tmp_name']) {
            $img_url = UploadImg::upload('img');
        }

        if ($user_name && $email && $task_text && $img_url !== false) {
            $task = new Task();
            $task->setUserName($user_name)
                ->setEmail($email)
                ->setTask($task_text)
                ->setImgUrl($img_url);

            $tr = new TaskRepository();
            $tr->save($task);

            header('Location: ./');
        } else {
            $task = new Task();
            $view = new View('addtask.php');
            $view->render(['task' => $task, 'error' => true]);
        }
    }

    /**
     * Show Edit task form
     */
    public function editAction()
    {
        if (!Auth::isAdmin()) die ('Permission denied');

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $tr = new TaskRepository();
        $task = $tr->findById($id);
        if ($task) {
            $view = new View('edittask.php');
            $view->render(['task' => $task]);
        } else {
            header('Location: ./');
        }
    }

    /**
     * Edit task form processing
     */
    public function editPostAction()
    {
        if (!Auth::isAdmin()) die ('Permission denied');

        $success = $error = false;
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $task_text = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING);
        $completed = filter_input(INPUT_POST, 'completed', FILTER_VALIDATE_BOOLEAN);

        $tr = new TaskRepository();
        $task = $tr->findById($id);
        if ($task && $task_text) {
            $task->setTask($task_text)
                ->setCompleted($completed);
            if ($tr->save($task)) $success = true;
            else $error = true;
        } else {
            $error = true;
        }

        $view = new View('edittask.php');
        $view->render([
            'task' => $task,
            'error' => $error,
            'success' => $success
        ]);
    }
}