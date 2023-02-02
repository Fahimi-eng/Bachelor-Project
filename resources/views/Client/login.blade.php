<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="/Bootstrap/css/bootstrap.css">
    <script src="/Bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/Client/css/login.css">
    <title>ورود</title>
</head>
<body dir="rtl">
<form action="{{ route('login.store') }}" method="post" class="login-form border d-flex flex-column justify-content-evenly rounded h-50 w-25">
    @csrf
    @method('POST')
    <p class="login-text">
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-lock fa-stack-1x text-dark"></i>
          </span>
    </p>
    <input name="username" type="text" class="login-username" autofocus="true" required="true" placeholder="نام کاربری" />
    <input name="password" type="password" class="login-password" required="true" placeholder="رمز عبور" />
    <button type="submit" name="Login" class="login-submit rounded px-5 py-2">ورود</button>
</form>

<div class="underlay-photo"></div>
<div class="underlay-black"></div>
</body>
</html>
