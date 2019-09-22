<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pizza Recipe</title>
    <link rel="shortcut icon" href="img/pizza.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/84e83c34ec.js"></script>
    <style>
        html,
        body {
            background: #8360c3;
            background: -webkit-linear-gradient(to right, #2ebf91, #8360c3);
            background: linear-gradient(to right, #2ebf91, #8360c3);
        }

        .brand {
            background: red !important;
        }

        .brand-text {
            color: red !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .pizza {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -40px;
        }
    </style>
</head>

<body>
    <nav class="black z-depth-0">
        <div class="container"><a href="index.php" class="brand-logo brand-text">Pizza</a></div>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li><a href="add.php" class="btn brand z-depth-0">Add A Pizza</a></li>
        </ul>
    </nav>