<?php require_once APPROOT . '/views/inc/header.php';?>
    <h1><?= $data['title']?></h1>
    <ul>
        <?php foreach($data['posts'] as $post) : ?>
            <li><?= $post->email;?> </li>
        <?php endforeach; ?>
    </ul>
<?php require_once APPROOT . '/views/inc/footer.php';?>