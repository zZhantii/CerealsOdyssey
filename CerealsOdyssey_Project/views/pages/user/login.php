<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cereals Odyssey | Log In</title>
</head>

<body id="login">
    <div class="container d-flex align-items-center login">
        <form class="row p-3 rounded-3 bg-white" method="POST" action="?controller=user&action=logUser">
            <div class="my-4 col-12 d-flex justify-content-center">
                <img src="<?= url_base ?>public/img/logo.png" height="60" width="60" alt="logo">
            </div>
            <div class="mb-3 col-12">
                <h3 class="mb-2">Log In</h3>
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">We'll never share your password with anyone else.</div>
            </div>

            <div class="mb-3 col-12 form-check">
                <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary buttonMain">Submit</button>
        </form>
    </div>
</body>

</html>