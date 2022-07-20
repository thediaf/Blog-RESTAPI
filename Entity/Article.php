<?php
namespace App\Entity;

use DateTime;

class Article
{
    protected $id;
    protected $title;
    protected $content;
    protected $category;
    protected $createdAt;
    protected $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title)
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content)
    {
        $this->content = $content;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(?int $category)
    {
        $this->category = $category;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
    
}