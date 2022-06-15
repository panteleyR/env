<?php

declare(strict_types=1);

namespace Lilith\Env;

class Env implements EnvInterface
{
    protected array $data = [];

//    public function __construct()
//    {
//
//    }

    public function load(string $path): void
    {
        $envFile = file_get_contents($path);
        $envFile = str_replace(["\r\n", "\r"], "\n", $envFile);
        $envData = explode('\\n', $envFile);

        foreach ($envData as $envStr) {
            [$env, $value] = explode('=', $envStr);
            $this->set(trim($env), trim($value, '\', '));
        }
    }

    public function set(string $env, string $value): void
    {
        $this->data[$env] = $value;
    }

    public function get(string $env): string
    {
        return $this->data[$env];
    }

    public function getAll(): array
    {
        return $this->data;
    }
}
