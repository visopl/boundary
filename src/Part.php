<?php 

declare(strict_types=1); 

namespace Visopl\Boundary; 

class Part 
{
    private string $disposition; 
    private string $data; 
    private ?string $name = null; 
    private ?string $filename = null; 
    private ?string $type = null;

    public function setDisposition(string $disposition): self 
    {
        $this->disposition = $disposition; 
        return $this; 
    }

    public function getDisposition(): string 
    {
        return $this->disposition; 
    }

    public function setData(string $data): self 
    {
        $this->data = $data; 
        return $this; 
    }

    public function getData(): string 
    {
        return $this->data; 
    }

    public function setName(?string $name): self 
    {
        $this->name = $name; 
        return $this; 
    }

    public function getName(): ?string 
    {
        return $this->name; 
    }

    public function setFilename(?string $filename): self 
    {
        $this->filename = $filename; 
        return $this; 
    }

    public function getFilename(): ?string 
    {
        return $this->filename; 
    }

    public function setType(?string $type): self 
    {
        $this->type = $type; 
        return $this; 
    } 

    public function getType(): ?string 
    {
        return $this->type; 
    }
}