<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class FormatHelper extends Helper{
  public function getName($id, $table){
  	$record = TableRegistry::get($table);
  	$query = $record->find()->where(['id' => $id]);
  	return $query->first()->name;


  }
}
