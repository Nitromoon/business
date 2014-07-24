<?php

namespace Business\Common\Models;

/**
 * Class Test
 * @package Business\Common\Models
 *
 * @Source('test')
 *
 */
class Test extends \Phalcon\Mvc\Model
{
    /**
     * @Primary
     * @Identity
     * @Column(column='id', type="integer", nullable=false)
     */
    protected $id;

    /**
     * @Column(column='value', type="integer",  nullable=true)
     */
    protected $value;

    /**
     * @Column(column='name', type="string", length=50, nullable=true)
     */
    protected $name;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}