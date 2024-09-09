<?php

namespace App\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:test')]
class KafkaSenderCommand extends Command
{

//    public function __construct($name = null)
//    {
//        parent::__construct($name);
//        $this->em = app(EntityManagerInterface::class);
//        $this->admitadRepo = $this->em->getRepository(AdmitadModel::class);
//        $logger = app(LoggerInterface::class)->withName(Loggers::ADMITAD);
//    }

    protected function configure(): void
    {
        $this
            ->setDescription('Создание/Обновление XML файла, со списком заказов и их статусов для автосверки адмитада.')
            ->addOption(
                'period',
                'p',
                InputOption::VALUE_REQUIRED,
                'Количество месяцев смещения периода от текущей даты',
                1
            );
    }

    /**
     * @example ./symfony-console.php admitad-build-xml
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        echo 'sd';
        return Command::SUCCESS;
    }
}