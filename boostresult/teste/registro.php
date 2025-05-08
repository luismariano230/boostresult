<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="../assets/css/form.css">

    <style>
        .input-group .form-control {
          border-right: none;
        }
        .input-group-text {
          background-color: transparent;
          border-left: none;
          cursor: pointer;
          color: #6c757d;
        }
        .input-group-text:hover {
          color: #495057;
        }
    </style>
</head>
<body>
    
    <section class="min-vh-100 d-flex align-items-center" style="background-color: #eee;">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 col-xl-10">
                
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <div class="d-flex align-items-center mb-4">
                                        <a href="../index.php">
                                            <img src="../assets/img/btnreturn.svg" alt="Descrição do SVG" class="custom-container mx-3">
                                        </a>
                                        <p class="h1 fw-bold mb-1">Cadastro</p>
                                    </div>

                                    <form class="mx-1 mx-md-4 needs-validation" action="/FriendlyPath/src/php/acess_registro.php" method="POST" novalidate>
                                        <div class="mb-4">
                                            <label class="form-label" for="nputNome">Nome</label>
                                            <input type="text" maxlength="100" name="nome" id="inputNome" class="form-control" required />
                                            <div class="invalid-feedback">Por favor, insira seu nome.</div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="inputEmail">Email</label>
                                            <input type="email" maxlength="100" name="email" id="inputEmail" class="form-control" required />
                                            <div class="invalid-feedback">Por favor, insira um email válido.</div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="passOne">Senha</label>
                                            <input type="password" maxlength="100" minlength="5" name="senha" id="passOne" class="form-control" required />
                                            <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="mostrarSenhaCheck" onclick="mostrarSenha()">
                                            <label class="form-check-label" for="mostrarSenhaCheck">Mostrar senha</label>
                                            </div>
                                            <div class="invalid-feedback">Por favor, insira uma senha válida com 5 caracteres.</div>
                                        </div>
                                        

                                        <div class="mb-4">
                                            <label class="form-label" for="passTwo">Repita a senha</label>
                                            <input type="password" maxlength="100" minlength="5" id="passTwo" class="form-control" required />
                                            <div class="invalid-feedback">As senhas não coincidem.</div>
                                        </div>

                                        <div class="d-flex justify-content-center mb-3">
                                            <button type="submit" class="btn btn-primary btn-lg" name="action">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="../assets/img/flat-2.jpg" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function mostrarSenha() {
            var senhaInput = document.getElementById('passOne');
            var senhaRept = document.getElementById('passTwo');
            
            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                senhaRept.type = "text";
            } else {
                senhaInput.type = "password";
                senhaRept.type = "password";
            }
        }
            
        (function () {
            'use strict';
            
            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    
                    var password = form.querySelector('#passOne');
                    var confirmPassword = form.querySelector('#passTwo');

                    
                    if (!form.checkValidity() || password.value !== confirmPassword.value) {
                        event.preventDefault();
                        event.stopPropagation();

                        
                        if (password.value !== confirmPassword.value) {
                            confirmPassword.setCustomValidity("As senhas não coincidem.");
                        } else {
                            confirmPassword.setCustomValidity("");
                        }
                    } else {
                        confirmPassword.setCustomValidity(""); 
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
