<table>
	<tr>
		<th>Название фильма</th>
		<td>
			<?php if($data[0]["FilmName"]){
				echo $data[0]["FilmName"];
			} else {
				echo "[нет данных]";
			}
			?>
		</td>
	</tr>
	<tr>
		<th>Год выпуска</th>
		<td>
			<?php if($data[0]["YEAR"]){
				echo $data[0]["YEAR"];
			} else {
				echo "[нет данных]";
			}
			?>
		</td>
	</tr>
	<tr>
		<th>Формат</th>
		<td>
			<?php if($data[0]["FORMAT"]){
				echo $data[0]["FORMAT"];
			} else {
				echo "[нет данных]";
			}
			?>
		</td>
	</tr>
	<tr>
		<th>Список актеров </th>
		<td>
			<?php if($data[0]["ACTORS"]){
				echo "<ul>";
				foreach(explode("|",$data[0]["ACTORS"]) as $actor) {
					echo "<li>$actor</li>";
				}
				echo "</ul>";
			} else {
				echo "[нет данных]";
			}
			?>
		</td>
	</tr>
</table>
