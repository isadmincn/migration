<?php
declare(strict_types=1);

namespace isadmin\migration;

use isadmin\migration\Command\Migrate\Breakpoint as MigrateBreakpoint;
use isadmin\migration\Command\Migrate\Create as MigrateCreate;
use isadmin\migration\Command\Migrate\Run as MigrateRun;
use isadmin\migration\Command\Migrate\Rollback as MigrateRollback;
use isadmin\migration\Command\Migrate\Status as MigrateStatus;
use isadmin\migration\Command\Migrate\Test as MigrateTest;
use isadmin\migration\Command\Seed\Create as SeedCreate;
use isadmin\migration\Command\Seed\Run as SeedRun;

class Service extends \think\Service
{
    public function register()
    {
        $this->commands([
            MigrateCreate::getDefaultName()      => MigrateCreate::class,
            MigrateRun::getDefaultName()         => MigrateRun::class,
            MigrateRollback::getDefaultName()    => MigrateRollback::class,
            MigrateStatus::getDefaultName()      => MigrateStatus::class,
            MigrateBreakpoint::getDefaultName()  => MigrateBreakpoint::class,
            MigrateTest::getDefaultName()        => MigrateTest::class,
            SeedCreate::getDefaultName()         => SeedCreate::class,
            SeedRun::getDefaultName()            => SeedRun::class,
            // ListAliases::getDefaultName() => ListAliases::class,
        ]);
    }
}
