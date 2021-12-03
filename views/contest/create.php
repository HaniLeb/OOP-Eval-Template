<form action="/contest/store" method="POST">

<label for="start_date">Start Date</label>
<input type="date" name="start_date" id="start_date" require>

<label for="game_id">Game N°</label>
<select name="game_id" id="game_id">

<?php foreach($this->games as $game): ?>
<option value="<?php echo $game->getId(); ?>"><?php echo $game->getTitle(); ?></option>
<?php endforeach; ?>

</select>

<button type="submit">Ajouter</button>
</form>