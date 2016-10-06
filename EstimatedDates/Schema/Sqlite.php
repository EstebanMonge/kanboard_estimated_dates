<?php

namespace Kanboard\Plugin\EstimatedDates\Schema;

use PDO;

const VERSION = 3;

function version_3(PDO $pdo)
{
    $pdo->exec("ALTER TABLE tasks ADD COLUMN date_planned_start INTEGER DEFAULT '0'");
    $pdo->exec("ALTER TABLE tasks ADD COLUMN date_planned_due INTEGER DEFAULT '0'");
    $pdo->exec("ALTER TABLE tasks ADD COLUMN date_first_reponse INTEGER DEFAULT '0'");
    $pdo->exec("ALTER TABLE tasks ADD COLUMN date_request INTEGER DEFAULT '0'");
}
