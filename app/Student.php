<?php
namespace App;

class Student
{
    public int $id;
    public string $name;
    public string $address;
    public string $email;
    public int $phone;
    public mixed $image;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->name = $item['name'];
        $this->address = $item['address'];
        $this->email = $item['email'];
        $this->phone = $item['phone'];
        $this->image = $item['image'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): mixed
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getEmail(): mixed
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getPhone(): mixed
    {
        return $this->phone;
    }
}