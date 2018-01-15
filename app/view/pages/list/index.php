
<?php if(!empty($data)): ?>
	<table>
		<tr>
			<th>#</th>
			<th>Название фильма</th>
			<th></th>
		</tr>
		<?php foreach($data as $k => $aFilm): ?>
			<tr>
				<td><?=$k+1?></td>
				<td><a href="/?c=film\detail&id=<?=$aFilm["ID"]?>"><?=$aFilm["NAME"]?></a></td>
				<td><a href="/?c=film\delete&id=<?=$aFilm["ID"]?>">удалить</a></td>
			</tr>
		<?php endforeach;?>
	</table>


<?php else: ?>
	<p>В базе данных нет фильмов</p>
<?php endif; ?>

