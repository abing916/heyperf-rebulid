<?php


namespace Rebulid\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartCommand extends Command
{
    protected function configure()
    {
        $this->setName('start')->setDescription('启动服务');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $http = new \Swoole\Http\Server('0.0.0.0', 9501);

        $http->on('request', function ($request, $response) {
            $response->header("Content-Type", "text/html; charset=utf-8");
            $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
        });

        $http->start();
        return 1;
    }
}