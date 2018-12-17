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
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

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
            ->addArgument('user', InputArgument::REQUIRED, 'User')
            ->addArgument('title', InputArgument::REQUIRED, 'Questions title')
            ->addArgument('body', InputArgument::REQUIRED, 'Questions body')
            ->addArgument('tags', InputArgument::OPTIONAL, 'Questions tags')
        ;
    }
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        parent::initialize($input, $output);
        $this->style = new SymfonyStyle($input, $output);

        $this->user = $input->getArgument('user');
        $this->title = new Email($input->getArgument('title')

        );
    }



}