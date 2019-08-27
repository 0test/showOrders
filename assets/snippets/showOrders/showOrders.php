<?php 

$uid = $modx->getLoginUserID();
if(!$uid){return false;}
include_once (MODX_BASE_PATH . 'assets/snippets/DocLister/lib/DLTemplate.class.php');

$params = array(
	'controller' => 'onetable',
	'idType' => 'documents',
	'table' => 'manager_shopkeeper',
	'ignoreEmpty' => '1',
	'sortDir' => 'id ASC',
	'dateSource' => 'date',
	'dateFormat' => '%d.%m.%Y %H:%M',
	'showParent' => '0',
	'idField' => 'id',
	'noneWrapOuter' => 0,
	'noneTPL' => $noneTPL,
	'itemsListTpl' => $itemsListTpl,
	'tplOneAdditParam' => $tplOneAdditParam,
	'prepare' => array(function($data, $modx, $_DocLister, $_extDocLister){
		$all = array('','Новый','Принят к оплате','Отправлен','Выполнен','Отменен','Оплата получена');
		$DLTemplate = DLTemplate::getInstance($modx);
		$data['status'] = $all[$data['status']];
		$data['short_txt'] = unserialize($data['short_txt']);
		$data['content'] = unserialize($data['content']);
		$addit  = unserialize($data['addit']);		
		foreach ($data['content'] as $key => $value){
			$arr['item']['id'] = $value[0];
			$arr['item']['count'] = $value[1];
			$arr['item']['price'] = $value[2];
			$arr['item']['name'] = $value[3];
			$arr['item']['mainphoto'] = $value['tv']['mainphoto'];
			$arr['item']['total'] = $arr['item']['count'] * $arr['item']['price'];
			$arr['item']['addit'] = '';
			foreach($addit[$key] as $i => $one_param){
				$arr['item']['addit'] .= $DLTemplate->parseChunk($_DocLister->getCFGDef('tplOneAdditParam'),array('value'=>$one_param[0]),true);
			}
			$data['items'] .= $DLTemplate->parseChunk($_DocLister->getCFGDef('itemsListTpl'),$arr,true);
		}
		return $data;
	}),
);

if($_GET['id']){
	//показать 1 заказ
	$order_id = (int)$_GET['id'];
	$params['tpl'] = $tplOne;
	$params['ownerTPL'] = $tplOneWrapper;
	$params['display'] = 1;
	$params['addWhereList'] = 'c.userid = ' . $uid . ' AND c.id = ' . $order_id;
	
}
else{

	//показать все заказы
	$params['tpl'] = $tplListOrders;
	$params['ownerTPL'] = $tplListWrapper;
	$params['display'] = 'all';
	$params['addWhereList'] = 'c.userid = ' . $uid;

}

$out = $modx->runSnippet('DocLister', $params);
return $out;