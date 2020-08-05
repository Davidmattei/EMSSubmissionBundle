<?php

declare(strict_types=1);

namespace EMS\SubmissionBundle\Tests\Functional;

use EMS\SubmissionBundle\Tests\Functional\App\Kernel;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractFunctionalTest extends WebTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected static function getKernelClass()
    {
        return Kernel::class;
    }
}
