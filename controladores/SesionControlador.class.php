<?php 
    require "../utils/autoload.php";

    class SesionControlador {
        public static function IniciarSesion($context){
            if(self::autenticar($context['post']['usuario'],$context['post']['password']) === "true"){
                SessionCreate("autenticado",true);
                SessionCreate("nombreUsuario", $u -> Nombre);
                header("Location: /");

            }
            render("login",["error" => true]);
        }

        public static function CerrarSesion($context){
            session_destroy();
            header("Location:/login");
        }

        private static function autenticar($nombreUsuario,$password){
            $parametros = [
                "usuario" => $nombreUsuario,
                "password" => $password
            ];

            $resultado = HttpRequest(API_AUTH_URL,"post",$parametros);
            return $resultado['Resultado'];
            
        
            
        }

       
    }

