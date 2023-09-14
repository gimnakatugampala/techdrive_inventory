<?php require_once '../includes/auth_header.php' ?>


<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="../assets/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <form id="loginForm">
                            <div class="form-login">
                                <label>Username</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your Username address" id="email" name="email">
                                    <img src="../assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password"
                                        id="password" name="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <a class="btn btn-login" id="loginBtn">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <img src="../assets/img/login.jpg" alt="img" id="loginBtn">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <?php require_once '../includes/auth_footer.php' ?>

    