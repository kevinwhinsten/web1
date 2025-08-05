<form action="../admin_power/delete_author.php" method="post">
    <label for="author_id">Chọn user để xóa:</label>
<?php
include '../include/DatabaseConnection.php';
$stmt = $pdo->query("SELECT * FROM author");
$authors = $stmt->fetchAll();
?>
<select name="author_id" id="author_id" required>
<?php foreach ($authors as $author): ?>
    <option value="<?= htmlspecialchars($author['id']) ?>">
        <?= htmlspecialchars($author['name']) ?>
    </option>
<?php endforeach; ?>
    </select>
    <button type="submit">🗑️ delete user</button>
    <a href="manage_user_module.php" class="btn btn-secondary">⬅️ Quay lại</a>
</form>