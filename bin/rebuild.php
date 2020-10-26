<?php

use App\Bar;
use Symfony\Component\Console\Application;
use Rebulid\Command\StartCommand;

 require __DIR__.'/../vendor/autoload.php';
 $commands = require __DIR__."/../config/autoload/commands.php";
 $application = new Application();
 foreach ($commands as $command) {
     $application->add(new $command);
 }
 $application->run();