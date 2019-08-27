# showOrders
История заказов для Шопкипера

* Используется DocLister - сниппет не завязан на shk_userprofile.
* Можно вставлять в любую страницу, таким образом разруливая доступом на уровне Evolution, а не сниппета.
* Предсказуемая шаблонизация,использование prepare.
#  Пример #
```
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
				<a href="[~38~]?id=[+id+]" class="btn btn-info btn-brown"><i class="fa fa-eye"></i> Просмотр</a>
			</td>
		</tr>
	`
	&tplOne=`@CODE: 
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td class="text-left" colspan="2">Детали заказа</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-left" style="width: 50%;">
						<p><b>Номер заказа:</b> [+id+] </p>
						<p><b>Дата:</b> [+date+]</p>
					</td>
					<td class="text-left" style="width: 50%;">
						<p><b>Способ оплаты:</b> [+payment+] </p>
						<p><b>Способ доставки:</b> [+short_txt.delivery+]</p>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td class="text-left" style="width: 50%; vertical-align: top;">Доставка:</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-left">
						<p><b>Адрес:</b> [+short_txt.zip+] [+short_txt.city+] [+short_txt.street+]</p>
					</td>
				</tr>
				<tr>
					<td class="text-left">
						<p><b>Кому:</b> [+short_txt.fullname+]</p>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td class="text-left">Фото</td>
						<td class="text-left">Название товара</td>
						<td class="text-right">Цена</td>
						<td class="text-right">Количество</td>				
						<td class="text-right">Итого</td>

					</tr>
				</thead>
				<tbody>
					[+items+]
				</tbody>
				<tfoot>
					<tr>
						<td class="text-right"></td>
						<td class="text-right"></td>
						<td class="text-right"></td>
						<td class="text-right"><b>Сумма заказа</b></td>
						<td  class="text-right">[+price+] <span class="rur"></span></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="buttons clearfix">
			<div class="pull-right">
				<a href="[~51~]" class="btn btn-primary btn-brown">Вернуться</a>
			</div>
		</div>
	
	`
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
```

# Шаблоны # 

* tplListWrapper - обёртка для списка всех заказов
* tplListOrders - шаблон 1 заказа в общем списке заказов (tplListWrapper)
* tplOne - шаблон товара на странице просмотра заказа
* itemsListTpl - шаблон товаров на странице просмотра заказа
* tplOneWrapper - обёртка страницы просмотра заказа
* tplOneAdditParam - шаблон для доп. параметров товара
* noneTPL - шаблон для пустой истории заказов

# Плейсхолдеры #
Во всех обёртках можно использовать `[+dl.wrap+]` для вставки содержимого.

В шаблонах для товаров и заказов используются стандартные поля шопкипера из массива параметров заказа с соответствующими префиксами. Смотрите пример.
