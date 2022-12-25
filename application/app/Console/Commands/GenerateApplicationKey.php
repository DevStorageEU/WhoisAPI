<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateApplicationKey extends Command
{
    const SUCCESS = 0;
    const FAILURE = 1;
    const INVALID = 2;
    protected $name = 'generate:key';
    protected $description = 'generate random key for application encryption';

    public function run(InputInterface $input, OutputInterface $output): int
    {
        $key = Str::random(32);
        $output->write('Your key: ' . $key . PHP_EOL);

        return self::SUCCESS;
    }
}
