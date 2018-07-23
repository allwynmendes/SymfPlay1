<?php

namespace TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TodoList
 *
 * @ORM\Table(name="todo_list")
 * @ORM\Entity(repositoryClass="TodoBundle\Repository\TodoListRepository")
 */
class TodoList
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="todo", type="string", length=255)
     */
    private $todo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="flag", type="boolean")
     */
    private $flag;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set todo
     *
     * @param string $todo
     *
     * @return TodoList
     */
    public function setTodo($todo)
    {
        $this->todo = $todo;

        return $this;
    }

    /**
     * Get todo
     *
     * @return string
     */
    public function getTodo()
    {
        return $this->todo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return TodoList
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set flag
     *
     * @param boolean $flag
     *
     * @return TodoList
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return bool
     */
    public function getFlag()
    {
        return $this->flag;
    }
}

