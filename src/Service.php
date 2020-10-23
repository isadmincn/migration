<?php
declare(strict_types=1);

namespace isadmin\migration;

use isadmin\migration\command\migrate\Breakpoint as MigrateBreakpoint;
use isadmin\migration\command\migrate\Create as MigrateCreate;
use isadmin\migration\command\migrate\Run as MigrateRun;
use isadmin\migration\command\migrate\Rollback as MigrateRollback;
use isadmin\migration\command\migrate\Status as MigrateStatus;
use isadmin\migration\command\migrate\Test as MigrateTest;
use isadmin\migration\command\seed\Create as SeedCreate;
use isadmin\migration\command\seed\Run as SeedRun;
use isadmin\migration\command\ListAliases;

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
            ListAliases::getDefaultName()        => ListAliases::class,
        ]);
    }
}
