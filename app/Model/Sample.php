<?php 
App::uses('AppModel', 'Model');
class Sample extends AppModel {
  public $useDbConfig = 'htmldom';
 // public $source = 'https://www.thelotter.com/lottery-results/usa-megamillions'; // URL or path of contents if override db config
}

?>