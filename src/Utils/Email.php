<?php declare(strict_types=1);

namespace App\Utils;


class Email
{
    private static $instance = null;
    private $email;


    private function __construct(string $email)
    {
        $this->ensureIsValidEmail($email);

        $this->email = $email;
    }

    public static function getInstance(string $email)
    {
        if (self::$instance == null) {
            self::$instance = new Email($email);
        }

        return self::$instance;
    }

    public function fromString(string $email): self
    {
        return new self($email);
    }

    public function __toString(): string
    {
        return $this->email;
    }

    private function ensureIsValidEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }
}
