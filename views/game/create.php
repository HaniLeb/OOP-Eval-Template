<form action="/game/store" method="POST">
<label for="title">Title</label>
<input type="text" name="title" id="title" require>

<label for="min_players">Min Players</label>
<input type="number" name="min_players" id="min_players" value="1" require>

<label for="max_players">Max Players</label>
<input type="number" name="max_players" id="max_players" require>

<button type="submit">Ajouter</button>
</form>