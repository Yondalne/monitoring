<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
	<title>Kaydan Monitoring | Espace de gestion </title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="{{env('APP_AUTHOR')}}">
	<meta name="robots" content="index, follow">
	<meta name="format-detection" content="telephone=no">

	<meta name="keywords" content="Kaydan Monitoring">
	<meta name="description" content="{{env('APP_DESC')}}">

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/adcrm/images/favicon.png')}}">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link href="{{asset('assets/front/style.css?v=0')}}" rel="stylesheet">

    <style>
        :root {
          --primary: #FF8000;
          --secondary: #009A44;
          --neutral: #F5F5F5;
          --primary-light: #FFA64D;
          --primary-dark: #CC6600;
          --secondary-light: #00C957;
          --secondary-dark: #006B2E;
          --accent-1: #0072C6;
          --accent-2: #8B4513;
          --text-dark: #333333;
          --text-light: #FFFFFF;
          --background-light: #FFFFFF;
          --background-dark: #1A1A1A;
          --success: #28A745;
          --warning: #FFC107;
          --danger: #DC3545;
          --info: #17A2B8;
          --border-light: #E0E0E0;
          --border-dark: #666666;
        }

        body {
          background-color: var(--neutral) !important;
        }

        .bg_Kaydan Monitoring_light_brown {
          background-color: var(--neutral) !important;
        }

        .text_primary_Kaydan Monitoring_brown_2 {
          color: var(--primary) !important;
        }

        .btn_Kaydan Monitoring_brown {
          background-color: var(--primary) !important;
          border-color: var(--primary) !important;
          color: var(--text-light) !important;
        }

        .btn_Kaydan Monitoring_brown:hover {
          background-color: var(--primary-dark) !important;
          border-color: var(--primary-dark) !important;
        }

        .login-form {
          background-color: var(--background-light);
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          padding: 30px;
        }

        .title {
          color: var(--secondary);
        }

        .form-control {
          border-color: var(--border-light);
        }

        .form-control:focus {
          border-color: var(--primary);
          box-shadow: 0 0 0 0.2rem rgba(255, 128, 0, 0.25);
        }

        .btn-link {
          color: var(--accent-1);
        }

        .btn-link:hover {
          color: var(--primary-dark);
        }

        .invalid-feedback {
          color: var(--danger);
        }

        .login_bg {
          position: relative;
        }

        .login_bg::after {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background: linear-gradient(135deg, rgba(255, 128, 0, 0.7), rgba(0, 154, 68, 0.7));
          z-index: 1;
        }
    </style>
</head>

<body class="vh-100 bg_Kaydan Monitoring_light_brown">
    <div class="authincation h-100">
        <div class="container-fluid h-100 p-0">
            <div class="row g-0 h-100">
				<div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<a href="#">
							<img src="{{asset('assets/front/logo.png')}}" style="width: 250px; height: auto" alt="Logo" class="logo_box">
						</a>
						<div class="text-center">
							<h3 class="title">Espace de gestion</h3>
							<p>Veuillez entrer vos informations pour vous connecter</p>
						</div>
						<form method="POST" action="{{ route('login') }}"> @csrf
							<div class="mb-4">
								<label class="mb-1 text-dark">E-mail</label>
								<input type="email" class="form-control form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Mot de passe</label>
                                <input id="dz-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="show-pass eye">
									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>
								</span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="form-row d-flex justify-content-between mt-4 mb-2">
								<div class="mb-4">
									<div class="form-check custom-checkbox mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<label class="form-check-label" for="remember">Se souvenir de moi</label>
									</div>
								</div>
                                @if (Route::has('password.request'))
                                    <div class="mb-4">
                                        <a href="{{ route('password.request') }}" class="btn-link text_primary_Kaydan Monitoring_brown_2">Mot de passe oublié</a>
                                    </div>
                                @endif

							</div>
							<div class="text-center mb-4">
								<button type="submit" class="btn btn_Kaydan Monitoring_brown btn-block">Connexion</button>
							</div>
						</form>
					</div>
				</div>
                <div class="col-xl-6 col-sm-6">
					<div class="pages-left h-100">
						<div class="login_bg" style="background: url({{asset('assets/front/bg_login2.jpg')}}) no-repeat top center; background-size: cover; background-position: center">
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
