<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2020-03-05 14:41:15 +0800
 */

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('test');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('测试');
        return 0;
    }
}
