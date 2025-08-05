<form action="update_Post.php" method="post">
    <label for="title">Title</label>
    <input type="text" required name="title" value="<?php echo htmlspecialchars($post['content']); ?>" required />
    <br>

    <div class="contain"style="margin-bottom: 10px; display: flex; align-items: flex-start;">
    <label for="content">edit</label>
    <textarea name="content" placeholder="Type something..." required cols="50" rows="6"><?php echo htmlspecialchars($post['content']); ?></textarea>
    </div>
    <input type="hidden" value="<?php echo htmlspecialchars($post['id']) ?>" name="id">
    <button type="submit">Submit</button>
    
</form>

