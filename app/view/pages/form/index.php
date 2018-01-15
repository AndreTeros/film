<form action="/?c=film\add" method="POST">
	<table id="addfilm">
		<tr>
			<th>Название фильма</th>
			<td>
				<input class="full" type="text" required name="FILMNAME">
			</td>
		</tr>
		<tr>
			<th>Год выпуска</th>
			<td>
				<input class="full" type="text" required name="YEAR">
			</td>
		</tr>
		<tr>
			<th>Формат</th>
			<td>
				<select  name="FORMAT">
					<option value="VHS">VHS</option>
					<option value="DVD">DVD</option>
					<option value="Blu-Ray">Blu-Ray</option>
				</select>
			</td>
		</tr>
		<tr id="actorrow">
			<th rowspan="2">Список актеров(имя, фамилия)</th>
			<td>
				<input class="half" name="NAME[]" type="text"><input name="SURNAME[]" class="half" type="text">
			</td>

		</tr>
		<tr>
			<td>
				<div id="addfields">еще</div>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="добавить"></td>
		</tr>
	</table>
</form>

<script src="js/add.js"></script>