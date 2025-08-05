<a href="add_author.php">add_name</a> <a href="edit_author.php">edit_name</a> <a href="delete_author.php">delete_name</a><br>
<select>
    <?php foreach($authors as $author): ?>
    <option><?=htmlspecialchars($author['name'])?></option>
    <?php endforeach;?>
</select>
