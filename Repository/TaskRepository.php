<?php

class TaskRepository
{
    /**
     * @var PDO
     */
    private $dbConnection;

    /**
     * TaskRepository constructor.
     */
    public function __construct()
    {
        $this->dbConnection = Database::getInstance()->getConnection();
    }

    /**
     * Find task by id
     * @param int $id
     * @return Task
     */
    public function findById($id)
    {
        $query = 'SELECT * FROM tasks WHERE id = :id';
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject('Task');
    }

    /**
     * List all tasks
     * @param int $page
     * @param int $limit
     * @param string $sort
     * @return Task []
     */
    public function findAll($page = 1, $sort = 'id', $limit = TASKS_PER_PAGE)
    {
        $offset = ($page - 1) * $limit;

        $sorts = ['id', 'email', 'user_name', 'completed'];
        if (!in_array($sort, $sorts)) $sort = 'id';

        $query = 'SELECT * FROM tasks ORDER BY ' . $sort . ' DESC LIMIT :offset, :limit';
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Task');
    }

    /**
     * Get total tasks
     * @return int
     */
    public function getTotal()
    {
        $stmt = $this->dbConnection->query('SELECT COUNT(*) FROM tasks');
        return $stmt->fetchColumn();
    }

    /**
     * Inserts or updates task
     * @param Task $task
     * @return bool
     */
    public function save(Task $task)
    {
        if ($task->getId()) {
            // updating
            $query = 'UPDATE tasks SET user_name = :user_name, email = :email, 
                      task = :task, img_url = :img_url, completed = :completed WHERE id = :id';
        } else {
            // inserting
            $query = 'INSERT INTO tasks (id, user_name, email, task, img_url, completed)
                      VALUES (:id, :user_name, :email, :task, :img_url, :completed)';
        }
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindValue(':id', $task->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':user_name', $task->getUserName(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $task->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':task', $task->getTask(), PDO::PARAM_STR);
        $stmt->bindValue(':img_url', $task->getImgUrl(), PDO::PARAM_STR);
        $stmt->bindValue(':completed', $task->isCompleted(), PDO::PARAM_BOOL);

        return $stmt->execute();
    }

}