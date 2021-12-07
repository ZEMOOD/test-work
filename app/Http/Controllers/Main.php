<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Asciisd\Zoho\Facades\ZohoManager;

class Main extends Controller
{
    
    public function __invoke()
    {
        // CREATE DEAL
        $deals = ZohoManager::useModule('Deals');
        $record = $deals->getRecordInstance();

        $record->setFieldValue('Deal_Name', 'LAST DEAL4');
        $record->setFieldValue('Account_Name', 'SOME USER');
        $record->setFieldValue('Closing_Date', '2021-12-24');
        $record->setFieldValue('Stage', 'Needs Analysis');
        $record->setFieldValue('Pipeline', '---');

        $deal_inserted = $record->create()->getData();
        $deal_inserted_id = $deal_inserted->getEntityId();
        // [END] CREATE DEAL

        // CREATE TASK
        $tasks = ZohoManager::useModule('Tasks');
        $record = $tasks->getRecordInstance();

        $record->setFieldValue('Subject', 'RELATED TASK4');
        $record->setFieldValue('$se_module', 'Deals');
        $record->setFieldValue('What_Id', $deal_inserted_id);

        $record->create();
        echo "COMPLEATE...";
        // [END] CREATE TASK

    }
}