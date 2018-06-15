<?php

/**
 * Class DefaultController
 */
class DefaultController
{
    /**
     * Default action. Shows all tasks
     */
    public function defaultAction()
    {
        $page = (int)filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
        $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
        $page = ($page < 1) ? 1 : $page;
        $sort = (!$sort) ? 'id' : $sort;

        $tr = new TaskRepository();
        $tasks = $tr->findAll($page, $sort);
        $totalTasks = $tr->getTotal();

        $view = new View('default.php');

        $view->render([
            'tasks' => $tasks,
            'pages' => ceil($totalTasks / TASKS_PER_PAGE),
            'page' => $page,
            'sort' => $sort
        ]);
    }
}