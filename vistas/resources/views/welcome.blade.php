<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::post('/', function () {
    // Lógica simple de login sin BD
    $num_control = request('num_control');
    $password = request('password');

    if ($num_control === "12345" && $password === "admin") {
        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Usuario o contraseña incorrectos');
});
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Instituto Tecnológico de Oaxaca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* RESET BÁSICO */
        * {
            margin: 0;
            padding: 0;
            box_sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #333;
        }

        /* FONDO E IMAGEN */
        .bg-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            
           
            background-image: url('{{ asset('images/imgFondo.jpg') }}');
            
            background-size: cover;
            background-position: center;
        }

        /* CAPA OSCURA DIAGONAL */
        .overlay-diagonal {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(105deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.85) 25%, transparent 25.1%);
            pointer-events: none;
        }

        /* TARJETA DE LOGIN */
        .login-card {
            position: absolute;
            right: 10%;
            width: 400px;
            padding: 40px 30px;
            text-align: center;
            border-radius: 20px;
            background: linear-gradient(to bottom, rgba(203, 159, 130, 0.73), rgba(60, 30, 10, 0.9));
            backdrop-filter: blur(5px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.5);
            color: white;
        }

        /* LOGO */
        .logo img {
            width: 150px;
            margin-bottom: 10px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.5));
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        /* INPUTS */
        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 0.9rem;
            margin-left: 5px;
        }

        .input-group input {
            width: 90%;
            padding: 12px 15px;
            background: transparent;
            border: 2px solid white;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            outline: none;
            transition: 0.3s;
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-group input:focus {
            background: rgba(255,255,255,0.1);
            box-shadow: 0 0 10px rgba(255,255,255,0.2);
        }

        /* BOTÓN INGRESAR */
        .btn-ingresar {
            width: 80%;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background-color: #d35400;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            transition: background 0.3s;
        }

        .btn-ingresar:hover {
            background-color: #e67e22;
        }

        /* ENLACES FOOTER */
        .footer-links a {
            display: block;
            color: #ddd;
            text-decoration: none;
            font-size: 0.85rem;
            margin-bottom: 8px;
            text-decoration: underline;
        }

        .footer-links a:hover {
            color: white;
        }

        /* BOTONES SOCIALES */
        .social-buttons {
            position: absolute;
            bottom: 30px;
            left: 50px;
            display: flex;
            gap: 15px;
            z-index: 10;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.4);
            transition: transform 0.2s;
        }

        .social-btn.fb { background-color: #e67e22; }
        .social-btn.go { background-color: #d35400; }

        .social-btn:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .overlay-diagonal {
                background: rgba(0,0,0,0.6);
            }
            .login-card {
                right: auto;
                width: 90%;
            }
            .social-buttons {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="bg-container"></div>

    <div class="overlay-diagonal"></div>

    <div class="social-buttons">
        <div class="social-btn fb"><i class="fab fa-facebook-f"></i></div>
        <div class="social-btn go"><i class="fab fa-google"></i></div>
    </div>

    <div class="login-card">
        <div class="logo">
            <img src="{{ asset('images/logito.png') }}" alt="Logo ITO">
        </div>

        <h2>BIENVENIDO</h2>

        <form action="{{ url('/') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="num_control">Usuario</label>
                <input type="text" id="num_control" name="num_control" placeholder="Numero de control" required>
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Value" required>
            </div>

            <button type="submit" class="btn-ingresar">Ingresar</button>

            @if(session('error'))
    <p style="color: #ffcccb; font-size: 0.9rem; margin-bottom: 10px;">
        {{ session('error') }}
    </p>
@endif
        </form>

        <div class="footer-links">
            <a href="#">Registrarse</a>
            <a href="#">Recuperar contraseña</a>
        </div>
    </div>

</body>
</html>