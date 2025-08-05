
<div class="card mb-4">
    <div class="card-body">
        <h2 class="card-title"><?= htmlspecialchars($post['title']) ?></h2>
        <p class="text-muted">Module: <?= htmlspecialchars($post['modulename']) ?> by <?= htmlspecialchars($post['name']) ?></p>
        <p>🕒 <?= htmlspecialchars($post['created_at']) ?></p>
        <p class="card-text"><?= htmlspecialchars($post['content']) ?></p>

        <?php if (isset($post['image_path'])): ?>
            <img src="<?= htmlspecialchars($post['image_path']) ?>" class="img-fluid mb-3" alt="Post Image" width="200" height="200">
        <?php endif; ?>
    </div>
</div>

<!-- Comment Form -->
<h3>Leave a Comment</h3>
<form action="post.php?id=<?= $post['id'] ?>" method="post" class="mb-4">
    <div class="form-group">
        <label for="comment_content">Comment:</label>
        <textarea name="comment_content" id="comment_content" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" name="submit_comment" class="btn btn-primary">Submit Comment</button>
</form>

<?php foreach ($comments as $comment): ?>
    <div class="comment mb-2">
        <p><strong><?= htmlspecialchars($comment['name']) ?>:</strong> <?= htmlspecialchars($comment['comment_content']) ?></p>
        <p class="text-muted">🕒 <?= htmlspecialchars($comment['created_at']) ?></p>
        <a href='delete_comment.php?id=<?= $comment['id'] ?>&postid=<?= $comment['post_id'] ?>' class="btn btn-danger btn-sm">Delete Comment</a>
    </div>
<?php endforeach; ?>