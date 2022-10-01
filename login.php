<?php $message = $_GET["message"] ?? ''; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>login</title>
    <style>
        label {
            width: 150px;
            display: inline-block;
        }
    </style>
</head>

<body>

<div class="container w-50 mt-5">
    <form class="mt-5 bg-light p-5" method="POST" action="./router/loginRouter.php">
        <?php if ($message) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <div class="row">
                <div class="col">
                    <input type="test" class="form-control" name="email" id="exampleInputEmail1"
                           aria-describedby="emailHelp"/>

                </div>
                <label for="">@ofppt-edu.ma</label>
            </div>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"/>
        </div>
        <div class="mb-3 form-check">
            <input type="radio" class="form-check-input" checked name="type" value="formateur" id="exampleCheck1"/>formateur
            <br>
            <input type="radio" class="form-check-input" name="type" id="exampleCheck1" value="staigaire"/>staigaire
            <br>
        </div>
        <button type="submit" class="btn btn-primary">login</button>
    </form>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

</body>

</html>