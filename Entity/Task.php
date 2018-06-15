<?php

/**
 * Class Task
 */
class Task
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $user_name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $task;

    /**
     * @var string
     */
    private $img_url = '';

    /**
     * @var bool
     */
    private $completed = false;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getImgUrl()
    {
        return $this->img_url;
    }

    /**
     * @param $img_url
     * @return $this
     */
    public function setImgUrl($img_url)
    {
        $this->img_url = $img_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param $task
     * @return $this
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param $user_name
     * @return $this
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * @param $completed
     * @return $this
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;

        return $this;
    }
}