<?php 
require_once __DIR__.'/vendor/autoload.php';
require_once dirname(__FILE__) . "/integrations/discord.msg.send.php";
require_once dirname(__FILE__) . "/integrations/telegram.msg.send.php";
require_once dirname(__FILE__) . "/integrations/email.msg.send.php";
require_once dirname(__FILE__) . "/integrations/web.msg.send.php";
use GO\Scheduler;


// Create a new scheduler
$scheduler = new Scheduler();

// ... configure the scheduled jobs (see below) ...


// Let the scheduler execute jobs which are due.
$scheduler->run();


?>