<!DOCTYPE html>
	<html>

		<head>

			<?php
				$title = "Сalculation";
				require_once "head.php";
			?>

		</head>

		<body>

				<?php require_once "header.php"?> <!-- header -->

					<article>

						<h1>Розрахунок витрат води (В1).</h1>

							</br>

										<h2>Розрахункові (питомі середні за рік) добові витрати води л/доб., визначаємо відповідно до вимог ДБН В.2.5-64:2012 Таблиця А.1. та Таблиця А.2.</h2>

										</br>

										<form name ="form" id = "home" method = "get">

											<label for = "area">Вибіріть кліматичний район:</label></br>

												<select id = "area" form = "home" name = "area">

													<option value = "0" selected = "selected"></option>

													<option value = "1">I</option>

													<option value = "2">II</option>

													<option value = "3">III</option>

												</select></br>

											</br>

											<label for = "building">Вибіріть вид будівлі:</label></br>

												<select id = "building" form = "home" name = "building">

													<option  value = "0" selected = "selected"></option>

												</select></br>

												</br>

											<label for = "consumers">Вибіріть споживача:</label></br>

												<select id = "consumers" form = "home" name = "consumers">

													<option  value = "0"></option>

												</select></br>

												</br>

											<label for = "residents">Кількість мешканців, місце, учень, працівник, блюдо, хворий, відвідувачь:</label></br>

												<input id = "residents" form = "home" type="number" name = "residents" placeholder = "Введіть кількість жильців"></br>

												</br>

												<button id = "calculation" form = "home" type = "button" name = "calculation">Розрахувати</button>

										</form>
											<br/>
										<div id="tabularData">
											<h4>Данні з таблиць</h4>
												<p>*У вас є можливість корегувати данні</p>
											<form>
												<label for="generalWater">Загальна питома витрата води:</label>
												<input id="generalWater" type="text"/><br/>
												<label for="hotWater">Питома витрата гарячої води:</label>
												<input id="hotWater" type="text"/><br/>
												<label for="coefficient">Коефіціент максимальної добової нерівномівності:</label>
												<input id="coefficient" type="text"/><br/>
												<label for="timelosses">Тривалість водоразбору:</label>
												<input id="timelosses" type="text"/><br/>
												<input id="restart" type="button" value="Перерахувати"/>
											</form>
										</div>

										</br>

											<h3>Розрахунок</h3>

											</br>

												<h4>1.Середні (за рік) добові витрати води  за розрахунковий час споживання води,</br> м<sup>3</sup>/доб:</h4>

													<p>-загальнa:<span id = "middlingDayGeneral"> 0 </span>;</p>

													<p>-гарячої води:<span id = "middlingDayHot"> 0 </span>;</p>

													<p>-холодної води:<span id = "middlingDayCold"> 0 </span>;</p>

													</br>

												<h4>2.Максимальні добові витрати води, м<sup>3</sup>/доб:</h4>

													<p>-загальнa:<span id = "maxDayGeneral"> 0 </span>;</p>

													<p>-гарячої води:<span id = "maxDayHot"> 0 </span>;</p>

													<p>-холодної води:<span id = "maxDayCold"> 0 </span>;</p>

													</br>

												<h4>3.Середні за годину розрахункові витрати, м<sup>3</sup>/год:</h4>

													<p>-загальнa:<span id = "maxHourGeneral"> 0 </span>;</p>

													<p>-гарячої води:<span id = "maxHourHot"> 0 </span>;</p>

													<p>-холодної води:<span id = "maxHourCold"> 0 </span>;</p>

													</br>

												<h2>Розрахункові (середні за год.) витрати води і максимальні секундні витрати стоків, визначаємо відповідно до вимог ДБН В.2.5-64:2012 Таблиця А.3.</h2>

												</br>

													<h3>Вихідні дані для розрахунку витрати води по кількості приладів:</h3>

													</br>

														<form  id = "fittings" method="post">

														<label for = "kindHouse">Вибіріть тип будинку:</label>

															<select id = "kindHouse" form = "fittings" name = "kindHouse">

																<option value = "0" selected = "selected"></option>

																<option value = "1">Житлові будинки</option>

																<option value = "2">Лазні, пральні, виробничі приміщення, мастерні, гаражі</option>

																<option value = "3">Учбові заклади, загальноосвітні установи, адміністративні будівлі, НІІ</option>

																<option value = "4">Лікувальні установи, дома відпочинку, санаторії, дошкільні освітні заклади, промтоварний магазин</option>

																<option value = "5">Готелі, гуртожитки, школи-інтернати, об&#8217єкти фізкультурно і фізкультурно-дозвіллевого призначення</option>

																<option value = "6">Підприємства громадського харчування, продовольчі магазини</option>

																<option value = "7">Спортивні споруди, театри, кінотеатри, громадські туалети</option>

																<option value = "8">Максимальні секундні витрати стоків, л/с</option>

															</select></br>

															<h5>Перелік приладів:</h5>

															<div id="device">

															</div>

															<button id = "calc" form = "fittings" type = "button" name = "calc">Calculation</button>
															<button id = "clear" form = "fittings" type="reset">Clear</button><br/>

															<div id="addDevice">
															 <img id="plus" src="/img/plus.png">
															 <p id="message">*Якщо вам потрібен розрахунок приладів яких немає у списку, у вас є змога додати їх до разрахунку
															 натиснувши "+".</p>
																 <div id="subjects" class="hide">
																 	<div id="numberSubjects">
																 		<label>Введіть кількість приладів</label><br/>
																 		<input type="text" id="numberFit"/><br/>
																 	</div>
																 	<div id="consumption">
																 		<label>Введіть витрату води у л/год</label><br/>
																 		<input type="text" id="consumptionWater"/><br>
																 	</div>
																 <input type="button" id="result" value="Розрахувати"/>
																 </div>
															</div>

														</form>

														</br>

													<h3>Розрахунок<h3>

													</br>

														<h4>Середня витрата на прилад складатиме л/год:</h4>

															<p>-загальнa:<span id = "middlingHourGeneralFittings">0</span></p>

															<p>-гарячої води:<span id = "middlingHourHotFittings">0</span></p>

															<p>-холодної води:<span id = "middlingHourColdFittings">0</span></p>

															</br>

												<h2>Розрахункові максимальні витрати води (секундні та за годину), приймаємо відповідно ДБН В.2.5-64:2012 Таблиця А.5.</h2>

													</br>

													<table width="100%" border="1" cellspacing="0" cellpadding="2">
														 <caption>Розрахункові максимальні секундні та за годину витрати води за кількостю приборів:</caption>

														<tr>
															<th rowspan="2">№</th> <th>Кількість приборів</th> <th colspan="3">л/с</th>
															<th colspan="3">м<sup>3</sup>/год</th> <th colspan="3">м<sup>3</sup>/доб</th>
														</tr>

														 <tr>
															<th>шт.</th> <th>q<sup>tot</sup></th> <th>q<sup>c</sup></th> <th>q<sup>h</sup></th>
															<th>q<sub>hr</sub><sup>tot</sup></th> <th>q<sub>hr</sub><sup>c</sup></th> <th>q<sub>hr</sub><sup>h</sup></th>
															<th>Q<sub>max</sub><sup>tot</sup></th> <th>Q<sub>max</sub><sup>c</sup></th> <th>Q<sub>max</sub><sup>h</sup></th>
														 </tr>

													</table></br>

					</article>

				<?php require_once "footer.php" ?> <!-- footer -->

		</body>
