

<div class="row">
	<div class="col c2">
		<h3>Актеры</h3>
		<?if(!empty($data["actors"])):?>
			<ul>
				<?foreach($data["actors"] as $actor):?>
					<li>
						<a href="?ch=actor&id=<?=$actor["ID"]?>">
							<?=$actor["FIRSTNAME"] . " " . $actor["LASTNAME"]?>
						</a>
					</li>
				<?endforeach;?>
			</ul>
		<?endif;?>
	</div>
	<div class="col c2">
		<h3>Фильмы</h3>
		<?if(!empty($data["films"])):?>
			<ul>
				<?foreach($data["films"] as $film):?>
					<li>
						<a href="?ch=film&id=<?=$film["ID"]?>">
							<?=$film["NAME"] . " (" . $film["YEAR"] . ")"?>
						</a>
					</li>
				<?endforeach;?>
			</ul>
		<?endif;?>
	</div>
</div>
<div class="row">
	<pre>
	<?var_dump($data)?>
	</pre>
</div>