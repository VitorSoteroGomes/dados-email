<?php


    function count_array_values($my_array, $match) 
    { 
        $count = 0; 
        
        foreach ($my_array as $key => $value) 
        { 
            if ($value == $match) 
            { 
                $count++; 
            } 
        } 
        
        return $count; 
    } 

    $servername = "127.0.0.1";
    $username = "root";
    $password = "password";
    $dbname = "dados";

    $conteudoCampo = '';

    $arquivoPalavrasChave = file_get_contents('./palavras/palavras.txt', true);
    $conteudoPalavrasArray =  explode(PHP_EOL, $arquivoPalavrasChave);
    // Conectando...
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checando conexao...
    if ($conn->connect_error) {
        die("Conexao falhou: " . $conn->connect_error);
    }

    $insertSQL = "SELECT conteudo FROM dados_email";
    $result = $conn->query($insertSQL);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $conteudoCampo = $row["conteudo"];
            $_partesConteudo = explode(" ", $conteudoCampo);

        }
    }

    $conn->close();

?>