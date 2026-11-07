<?php

namespace App\Support;

class ErrorContainer
{
    private array $errors = [];

    public function add(string $message, string $field = null): void
    {
        $this->errors[] = [
            'field' => $field,
            'message' => $message,
        ];
    }

    public function addMany(array $errors): void
    {
        foreach ($errors as $error) {
            $this->add(
                $error['message'],
                $error['field'] ?? null
            );
        }
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function all(): array
    {
        return $this->errors;
    }

    public function clear(): void
    {
        $this->errors = [];
    }
}