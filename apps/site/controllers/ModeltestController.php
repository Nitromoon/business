<?php

namespace Business\Site\Controllers;

use Business\Common\Models\Test;

class ModeltestController extends ControllerBase
{
    public function indexAction()
    {
        echo __CLASS__;
        exit;
    }

    public function saveAction()
    {
        $test = new Test();
        $response = $test->save(array('value' => '30', 'name' => 'item_3'));
        if($response) {
            echo 'Success!';
        } else {
            echo 'Error;';
        }
        exit;
    }

    public function readAction()
    {
        $tests = Test::find();
        /** @var \Business\Common\Models\Test $test */

        foreach($tests as $test) {
            echo $test->getName().':'.$test->getValue().'<br/>';
        }
        exit;
    }
}
