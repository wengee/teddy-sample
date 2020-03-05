<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2020-03-05 17:03:17 +0800
 */

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('test')
            ->setDescription('This is a test command')
            ->addOption('file', 'f', InputOption::VALUE_REQUIRED, 'config file');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = $input->getOption('file');
        $output->writeln($file);

        $output->writeln('测试');
        return 0;
    }
}
