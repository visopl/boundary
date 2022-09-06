<?php 

declare(strict_types=1); 

namespace Visopl\Boundary; 

final class Boundary 
{
    private string $head; 
    private string $body; 

    public function __construct(string $head, string $body)
    {
        $this->head = $head; 
        $this->body = $body; 
    }

    public function getHead(): string 
    {
        return $this->head; 
    }

    public function getBody(): string 
    {
        return $this->body; 
    }
}