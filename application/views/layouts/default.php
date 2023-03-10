<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<?php if (empty($_SESSION)): ?>
    <a  href="/account/login">Login</a>
    <a  href="/account/register">Registration</a>
<?php else: ?>
    <a  href="/account/logout">Logout</a>
    <a  href="/">List</a>
<?php endif; ?>

<?php // var_dump($_SESSION); ?>

<?php echo $content; ?>


    <script src="../../../public/scripts/jquery.js"></script>
    <script src="../../../public/scripts/jqueryCustome.js"></script>

    <script src="../../../public/scripts/form.js"></script>

</body>
</html>