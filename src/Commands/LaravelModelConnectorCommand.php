<?php

namespace Yanntyb\LaravelModelConnector\Commands;

use Illuminate\Console\Command;

class LaravelModelConnectorCommand extends Command
{
    public $signature = 'laravel-model-connector';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
