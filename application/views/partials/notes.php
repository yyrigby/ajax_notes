<?php
	foreach($notes as $note)
	{ ?>
		<div class='note_box'>
			<div class='box_content'>
				<h3><?= $note['title'] ?></h3>
				<form class="edit" action="notes/submit" method="post">			
					<textarea name="description" class="note" id="<?= $note['id'] ?>" placeholder="Enter description here..."><?= $note['description'] ?></textarea>
					<input type="hidden" name="id" value="<?= $note['id'] ?>">
					<input class="update_button" type="submit" value="update">
				</form>
			</div>
			<form class="delete" action="notes/submit" method="post">			
				<input type="hidden" name="id" value="<?= $note['id'] ?>">
				<input class='delete_button' type="submit" value="delete">
			</form>
		</div>
<?php
	} ?>








