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
        <h1><?= isset($post) ? $post : '' ?></h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi alias magnam fugit quidem vero quia a eaque
            veniam ipsam voluptatum! Expedita, atque delectus! Quisquam ea, architecto enim fugiat labore et.</p>
    </article>

    <a href="/">Go Back</a>
</body>

</html>
