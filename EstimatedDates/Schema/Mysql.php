<?php

namespace Kanboard\Plugin\EstimatedDates\Schema;

use PDO;

const VERSION = 3;

function version_3(PDO $pdo)
{
    $pdo->exec("ALTER TABLE `tasks` ADD COLUMN `date_planned_start` INT DEFAULT '0'");
    $pdo->exec("ALTER TABLE `tasks` ADD COLUMN `date_planned_due` INT DEFAULT '0'");
    $pdo->exec("ALTER TABLE `tasks` ADD COLUMN `date_first_response` INT DEFAULT '0'");
    $pdo->exec("ALTER TABLE `tasks` ADD COLUMN `date_request` INT DEFAULT '0'");
}
