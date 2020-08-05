<?php

declare(strict_types=1);

namespace EMS\SubmissionBundle\Tests\Functional\Command;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use EMS\SubmissionBundle\Entity\FormSubmission;
use EMS\SubmissionBundle\Request\DatabaseRequest;
use EMS\SubmissionBundle\Tests\Functional\AbstractFunctionalTest;
use EMS\SubmissionBundle\Tests\Functional\fixtures\database\FormSubmissionFixtures;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

final class MailStatsCommandTest extends AbstractFunctionalTest
{
    use FixturesTrait;

//select count(*) from form_submission where (process_try_counter = 3  or created < NOW() - INTERVAL '4 hours') and process_id is null and instance='contact_forms_portail_live';
//    /** @var Application */
//    private $application;

    protected function setUp(): void
    {
        parent::setUp();


//        /** @var ManagerRegistry $managerRegistry */
//        $managerRegistry = $this->container->get('doctrine');
//        $this->manager = $managerRegistry->getManager();
    }

    public function testExecute(): void
    {
        $this->loadFixtures([FormSubmissionFixtures::class]);

        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('emss:mail:stats');
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('EMS Submission: mail stats', $output);
    }
}