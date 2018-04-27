<!DOCTYPE html>
<html lang="vn">
<head>
    <title>iShop::Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
</head>
<body>
<!-- START OF HEADER -->
<header class="header">
    <div class="container clearfix">
        <div class="header__left">
            <a href="" class="header__left_logo">
                <i class="fab fa-skyatlas fa-lg"></i>
            </a>
        </div>
        <div class="header__right">
            <nav class="header__right_menu">
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/users">User</a></li>
                    <li><a href="/shops">Shop</a></li>
                    <li><a href="/categories">Category</a></li>
                    <li><a href="/products">Product</a></li>
                    <li><a href="/suppliers">Supplier</a></li>
                    <li><a href="/transactions">Transaction</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END OF HEADER -->

<!-- START OF CONTENT -->
<section class="body">
    <div class="container">
        <div class="form_content">
            <p class="form_title">New User</p>
            <form action="" method="">
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" value="" placeholder="">
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label>Confirm password:</label>
                    <input type="password" name="confirmation_password">
                </div>
                <div>
                    <label>Profile's photo:</label>
                    <input type="file" name="photo">
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="btnAdd"><i class="fas fa-user-plus"></i> Add new user</button>
                </div>
            </form>
        </div>
        <div class="list_content">
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>No</span>
                </div>
                <div class="list_content_row_col">
                    <span>ID</span>
                </div>
                <div class="list_content_row_col">
                    <span>Name</span>
                </div>
                <div class="list_content_row_col">
                    <span>Email</span>
                </div>
                <div class="list_content_row_col">
                    <span>Edit</span>
                </div>
            </div>
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>1</span>
                </div>
                <div class="list_content_row_col">
                    <span>10000</span>
                </div>
                <div class="list_content_row_col">
                    <span>Ngo Dinh Cuong</span>
                </div>
                <div class="list_content_row_col">
                    <span>cuong.ngo@asiantech.vn</span>
                </div>
                <div class="list_content_row_col">
                    <a href="" class="btn btnUpdate"><i class="far fa-edit"></i></a>
                    <a href="" class="btn btnDelete"><i class="far fa-trash-alt"></i></a>
                    <a href="" class="btn btnReset"><i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF CONTENT -->

<!-- START OF FOOTER -->
<footer class="footer">
    <div class="container clearfix">
        <div class="footer__left">
            Designed by me
        </div>
        <div class="footer__right">
            <ul>
                <li><a href="">About us</a></li>
                <li><a href="">Contact us</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- END OF FOOTER -->
</body>
</html>
