<?php

declare(strict_types=1);

namespace Lilith\Env;

interface EnvInterface
{
    public function load(string $path): void;
    public function set(string $env, string $value): void;
    public function get(string $env): string;
    public function getAll(): array;
}
