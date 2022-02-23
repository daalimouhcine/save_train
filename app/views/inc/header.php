<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITENAME;?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/52c3d542f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= URLROOT; ?>/style/<?= isset($_SESSION['admin_id']) ? 'admin_home' : 'style'; ?>.css">
</head>
<body>
    <?php require_once APPROOT . '/views/inc/navbar.php'; ?>



     
    