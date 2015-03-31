<?php

app::uses('Appcontroller', 'Controller');

class TestController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('ph', 'ganon');
    }

    public function ph() {
        ini_set("max_execution_time", -1);
       
        $a = shell_exec("phantomjs phantomjs/script.js 110847");
        print_r($a);
        exit;
    }

    public function ganon() {


        require '../Vendor/Ganon/ganon.php';
        $a = file_get_dom('https://www.thelotter.com/lottery-results/usa-megamillions/?DrawNumber=110847');
       
         foreach ($a('span[class="results-ball-regular results-ball icon"]') as $element) {
           $data[]=$element->getPlainText();
        }

         foreach ($a('span[class="results-number icon"]') as $element) {
           $datapb[]=$element->getPlainText();
        }
        print_r($data);
        print_r($datapb);
    }

}

?>