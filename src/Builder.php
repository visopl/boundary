<?php 

declare(strict_types=1); 

namespace Visopl\Boundary; 

class Builder 
{
    private string $identifier; 
    private bool $unique;  
    private array $parts = []; 

    public function __construct(string $identifier = 'WebFormBoundary', bool $unique = true)
    {
        $this->identifier = $identifier; 
        $this->unique = $unique; 
    }

    public function setIdentifier(string $identifier): self 
    {
        $this->identifier = $identifier; 
        return $this; 
    }

    public function getIdentifier(): string 
    {
        return $this->identifier;
    }

    public function setUnique(bool $unique): self 
    {
        $this->unique = $unique; 
        return $this; 
    }

    public function getUnique(): bool 
    {
        return $this->unique; 
    }

    public function addPart(Part $part): self 
    {
        $this->parts[] = $part; 
        return $this; 
    }

    public function build(string $eol = "\r\n"): Boundary 
    {
        if (empty($this->parts)) {
            throw new \RuntimeException('No parts defined.');
        }

        $head = '---' . $this->identifier; 

        if ($this->unique) {
            $head .= '-' . uniqid();
        }

        $body = ''; 

        foreach ($this->parts as $part) {
            $body .= '--' . $head . $eol; 
            $body .= 'Content-Disposition: ' . $part->getDisposition(); 

            if (($name = $part->getName()) !== null) {
                $body .= '; name="' . $name . '"'; 
            }

            if (($filename = $part->getFilename()) !== null) {
                $body .= '; filename="' . $filename . '"';
            }

            $body .= $eol; 

            if (($type = $part->getType()) !== null) {
                $body .= 'Content-Type: ' . $type . $eol;
            }

            $body .= $eol . $part->getData() . $eol; 
        }

        $body .= '--' . $head . '--' . $eol;

        return new Boundary($head, $body); 
    }
}