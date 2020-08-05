<?php

declare(strict_types=1);

namespace EMS\SubmissionBundle\Tests\Functional\fixtures\database;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use EMS\SubmissionBundle\Entity\FormSubmission;
use EMS\SubmissionBundle\Request\DatabaseRequest;

final class FormSubmissionFixtures extends Fixture implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $databaseRequest = new DatabaseRequest([
            'form_name' => 'test_form',
            'instance' => 'preview_test',
            'locale' => 'nl',
            'data' => ['firstName' => 'test', 'lastName' => 'test'],
            'files' => []
        ]);
        $formSubmission1 = new FormSubmission($databaseRequest);
        $formSubmission2 = new FormSubmission($databaseRequest);
        $formSubmission3 = new FormSubmission($databaseRequest);

        $manager->persist($formSubmission1);
        $manager->persist($formSubmission2);
        $manager->persist($formSubmission3);
        $manager->flush();
    }


}