<?php if(empty($list)): ?>
    <p>The list of users is empty</p>
<?php else: ?>
    <?php foreach($list as $data): ?>
        <div>
            <p><?php echo $data['name'] . ' ' . $data['surname'] . ' ' . $data['age'] . ' ' . $data['id']; ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
