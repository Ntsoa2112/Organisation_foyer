<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/my_style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">S'inscrire</h2>
                        <form method="POST" class="register-form" id="register-form" action="/register">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nom" required />
                            </div>
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="fname" placeholder="Prénom" required/>
                            </div>
                            <div class="form-group">
                                <label for="aname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="aname" id="aname" placeholder="Appelation" required/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" required/>
                            </div>

                            <span class="form-group" id="notif_email">

                            </span>

                            <div class="form-group">
                                <label for="promotion"><i class="zmdi zmdi-calendar"></i></label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "4" name="promotion" placeholder="Promotion YYYY" required>
                            </div>

                            <div class="">
                                <div id="appe" class="input-group">
                                    <div id="select" class="select">
                                        <select class="browser-default custom-select" id="categorie" name="foyer" required>
                                            <option value="">Foyer</option>
                                            @foreach ($foyers as $foyer)
                                                <option value="{{ $foyer->id }}">{{ $foyer->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><br>

                            <div class="">
                                <div id="appe" class="input-group">
                                    <div id="select" class="select">
                                        <select class="browser-default custom-select" id="categorie" name="referant" required>
                                            <option value="">Référant</option>
                                            @foreach ($referants as $referant)
                                                <option value="{{ $referant->id }}">{{ $referant->appelation }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" minlength=8 id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" minlength=8 id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <span class="form-group" id="notif">

                            </span>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Enregistrer" required/>
                            </div>

                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Créer un compte</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Se connecter</h2>
                        <form method="POST" class="register-form" id="login-form" action="/login">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email_log" placeholder="Email"/>
                            </div>
                            <span class="form-group" id="notif_email_log">

                            </span>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" minlength=7 name="pass" id="your_pass" placeholder="Password" disabled/>
                            </div>
                            <span class="form-group" id="notif_pass_log">

                            </span>

                            <div class="form-group form-button">
                                <input type="submit" disabled name="signin" id="signin" class="form-submit" value="Valider"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
