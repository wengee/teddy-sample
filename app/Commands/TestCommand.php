<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2022-08-20 17:15:37 +0800
 */

namespace App\Commands;

use Teddy\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'test';

    protected $description = 'This is a test command';

    protected function handle(): void
    {
        $this->warn('This is a test command');
    }
}
