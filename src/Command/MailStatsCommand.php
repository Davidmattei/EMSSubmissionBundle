<?php

declare(strict_types=1);

namespace EMS\SubmissionBundle\Command;

use EMS\SubmissionBundle\Repository\FormSubmissionRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Twig\Environment;

final class MailStatsCommand extends Command
{
    protected static $defaultName = 'emss:mail:stats';

    /** @var \Swift_Mailer */
    private $mailer;
    /** @var FormSubmissionRepository */
    private $repository;
    /** @var Environment */
    private $twig;

    public function __construct(\Swift_Mailer $mailer, FormSubmissionRepository $repository, Environment $twig)
    {
        parent::__construct();

        $this->mailer = $mailer;
        $this->repository = $repository;
        $this->twig = $twig;
    }

    protected function configure()
    {
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $style = new SymfonyStyle($input, $output);
        $style->title('EMS Submission: mail stats');

        $test = $this->repository->findAll();





        return 1;
    }
}