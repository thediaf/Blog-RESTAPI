<?php
namespace App\Entity;

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

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
    
}