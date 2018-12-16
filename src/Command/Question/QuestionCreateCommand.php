<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 15-12-2018
 * Time: 16:14
 */

namespace App\Command\Question;


use League\Tactician\CommandBus;
use Symfony\Component\Console\Command\Command;

class QuestionCreateCommand extends Command
{
    public function __construct(CommandBus $commandBus)
    {
        parent::__construct();
        $this->commandBus = $commandBus;
    }

    public function configure()
    {
        $this
            ->setName('question:create')
            ->setHelp('Creates a new question')
            ->addArgument('userId', InputArgument::REQUIRED, 'User full name')
            ->addArgument('email', InputArgument::REQUIRED, 'User e-mail address')
        ;
    }


}