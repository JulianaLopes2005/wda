<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-image: url('fundo.png');
            background-size: cover;
            background-repeat: no-repeat;
        }    

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fecae1;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-style: italic;
        }
        
        .login-container label {
            display: block;
            margin-bottom: 8px;
            font-style: italic;
           
        }
        
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <br><br><br><br><br><br>
    <div class="login-container">
        <h2>Login</h2>
        <form class="needs-validation" action="confirmlogin.php" method="POST" novalidate>
            <div class="mb-3">
                <label for="username" class="form-label">Usuário:</label>
                <input type="text" class="form-control" id="username" name="username" required>
                <div class="valid-feedback">
                    Preenchido!
                </div>
                <div class="invalid-feedback">
                    Insira o nome de usuário!
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="valid-feedback">
                    Preenchido!
                </div>
                <div class="invalid-feedback">
                    Insira a senha corretamente!
                </div>
            </div>

            <button type="submit" class="btn btn-primary"
                style="width: 25%;
                background-color: #ff81ff;
                color: #000000;
                border: none;
                border-radius: 7px;">
                Entrar
            </button>
        </form>
    </div>

    <script>
        (() => {
            'use strict';

            const forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
