<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <link rel="stylesheet" href="estilo.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
    </head>

    <header class="cabeca">
        <h1 class="titulo">Confirme as Informações do Cadastro</h1>
    </header>

    <body class="corpo">
        <?php

        function valida_nome()
        {
            $nome = $_POST["nome"];

            if (strlen($nome)<=5) 
            {
                echo "Preencha corretamente o seu nome";
            } 

            elseif (preg_replace('/[^0-9]/is', '', $nome)) 
            {
                echo "O nome não pode conter números";
            }
            
            else 
            {
                echo "Nome validado: " . $nome;
            }
        } 

        function valida_senha()
        {
            $senha = $_POST["senha"];

            if (strlen($senha)<8) 
            {
                echo "A senha deve conter pelo menos 8 caracteres";
            }

            elseif (strlen($senha)>16) 
            {
                echo "A senha deve conter no máximo 16 caracteres";
            }

            else 
            {
                echo "Senha validada: " . $senha;
            }
        }

        function valida_email()
        {
            $email = $_POST["email"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                echo "E-mail inválido";
            }

            else 
            {
                echo "E-mail validado: ". $email;
            }
        }

        function valida_cpf()
        {
            $cpf = $_POST["cpf"];

            $cpf = preg_replace('/[^0-9]/is', '', $cpf);

            if (strlen($cpf) != 11) 
            {
                echo "CPF inválido";
            }

            elseif (preg_match('/(\d)\1{10}/', $cpf)) 
            {
                echo "O CPF não pode ter números repetitivos";
            }

            else
            {
                for ($tratamento = 9; $tratamento < 11; $tratamento++) 
                {
                    for ($resultado = 0, $calculo = 0; $calculo < $tratamento; $calculo++) 
                    {
                        $resultado += $cpf[$calculo] * (($tratamento + 1) - $calculo);
                    }
                    $resultado = ((10 * $resultado) % 11) % 10;
                }

                if ($cpf[$calculo] != $resultado) 
                {
                    echo "CPF desconhecido";
                }
                else                 
                {
                    echo "aprovado: ". $cpf;
                }
            }
        
        }

        function valida_ddd()
        {
            $ddd = $_POST["ddd"];
            $ddd = preg_replace('/[^0-9]/is', '', $ddd);

            if (strlen($ddd)==2) 
            {
                echo "DDD aceito: ". $ddd;
            }

            else 
            {
                echo "DDD inválido";
            }
        }

        function valida_telefone()
        {
            $telefone = $_POST["telefone"];
            $telefone = preg_replace('/[^0-9]/is', '', $telefone);

            if (strlen($telefone)!=9) 
            {
                echo "Número de telefone inválido";
            }
            else 
            {
                echo "Número de telefone cadastrado: ". $telefone;
            }
        }

        function valida_data()
        {
            $data = $_POST["data"];
            $nascimento = new DateTime($data);

            $resultado = $nascimento ->diff((new DateTime(date('y-m-d'))));
            echo $resultado ->format('Idade: %y anos');
        }

        function retorna()
        {
            echo valida_nome(). "<br>";
            echo valida_cpf(). "<br>";
            echo valida_telefone(). "<br>";
            echo valida_senha(). "<br>";
            echo valida_ddd(). "<br>";
            echo valida_email(). "<br>";
            echo valida_data(). "<br>";
        }
        return retorna();
        ?>
        <div id="bloco">

        </div>

    </body>
</html>