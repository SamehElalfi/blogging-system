<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="/app.css">

</head>

<body>
    <article>
        <h2><?= $post->title ?></h2>
        <datetime><?= gmdate('d M Y', $post->date) ?></datetime>
        <?= $post->body ?>
    </article>

    <a href="/">Go Back</a>
</body>

</html>
