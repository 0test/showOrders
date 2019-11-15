//<?php
/**
 * showOrders
 *
 * История заказов
 *
 * @category    plugin
 * @version     1.5
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @package     evo
 * @reportissues https://github.com/0test
 * @author      A Ka https://vk.com/remote_adm
 * @link 		https://github.com/0test/showOrders/blob/master/README.md
 * @lastupdate  08-01-2019
 */
include MODX_BASE_PATH.'assets/snippets/showOrders/showOrders.php';


/*
EXAMPLE:


	[!showOrders?
	&tplListOrders=`@CODE:
	<tr>
		<td class="text-left">[+id+]</td>
		<td class="text-left">[+status+]</td>
		<td class="text-right">[+price+] <span class="rur"></span></td>
		<td class="text-left">[+short_txt.delivery+]</td>
		<td class="text-left">[+short_txt.payment+]</td>
		<td class="text-left">[+date+]</td>
		<td class="text-right">
			<a href="[~38~]?id=[+id+]" class="btn btn-info btn-brown"><i class="fa fa-eye"></i></a>
		</td>
	</tr>
	`
	&tplOne=`historyOneOrder`
	&tplListWrapper=`@CODE:
	<table class="table table-bordered table-hover table-history">
		<thead>
			<tr>
				<td class="text-left">№</td>
				<td class="text-left">Статус</td>
				<td class="text-right">Сумма</td>
				<td class="text-left">Доставка</td>
				<td class="text-left">Оплата</td>
				<td class="text-left">Дата</td>
				<td></td>
			</tr>
		</thead>
		<tbody>[+dl.wrap+]</tbody>
	</table>
	`
	&itemsListTpl=`@CODE:
	<tr>
		<td><img style="width:100px;" src="[+item.mainphoto+]" alt=""></td>
		<td class="text-left">
			<a href="[~[+item.id+]~]" class="itemname">[+item.name+] </a>
			<div class="shk_additdata">[+item.addit+]</div>
		</td>
		<td class="text-right">[+item.price+] <span class="rur"></span></td>
		<td class="text-right">[+item.count+] шт.</td>
		<td class="text-right">[+item.total+] <span class="rur"></span></td>
	</tr>		
	`
	&tplOneWrapper=`@CODE: [+dl.wrap+]`
	&tplOneAdditParam=`@CODE: <span class="addit">[+value+]</span>`
	&noneTPL=`@CODE: <div class="alert alert-warning">В истории нет заказов</div>`
	!]

*/