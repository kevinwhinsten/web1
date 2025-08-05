<?php foreach ($posts as $post): ?>
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">
                <a href="admin_post.php?id=<?= $post['id'] ?>" class="text-decoration-none">
                    <?= htmlspecialchars($post['title']) ?>
                </a>
            </h2>
            <small class="text-muted">🕒 Đăng lúc: <?= htmlspecialchars($post['created_at']) ?></small><br>

            <?php if (isset($post['image_path'])): ?>
                <img src="<?= isset($admin) ? '../' : '' ?><?= htmlspecialchars($post['image_path']) ?>" class="img-fluid mb-3" alt="Post Image" width="200" height="200">
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>

<!-- Nút quay lại -->
<p>
    <a href="admin_home.php" class="btn btn-primary">
        ⬅️ Quay lại trang chủ
    </a>
</p>