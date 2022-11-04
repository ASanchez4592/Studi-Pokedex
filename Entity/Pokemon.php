<?php

class Pokemon
{
    private $id;
    private $number;
    private $name;
    private $description;
    private $type1;
    private $type2;


    // CONSTRUCTOR ----------------------------------------------------
    public function __construct(array $data) {
        $this->hydrate($data);

    }

    // HYDRATATION ----------------------------------------------------
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // GETTER/SETTER ---------------------------------------------------
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        if (is_string($description) && strlen($description) > 5 && strlen($description) < 1000) {
            $this->description = $description;
        }

        return $this;
    }


    public function getType1()
    {
        return $this->type1;
    }

    public function setType1($type1)
    {
        $this->type1 = $type1;

        return $this;
    }


    public function getType2()
    {
        return $this->type2;
    }

    public function setType2($type2)
    {
        $this->type2 = $type2;

        return $this;
    }
}