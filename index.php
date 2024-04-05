<html>
<head>
<title>Exemplo PHP</title>
</head>
<body>

<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

$servername = "54.234.153.24";
$username = "root";
$password = "Senha123";
$database = "meubanco";

$link = new mysqli($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$produtoID = rand(1, 999);
$nomeProduto = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$descricaoProduto = "Descricao " . $nomeProduto; 
$precoProduto = rand(10, 100); 
$categoriaProduto = "Categoria " . strtoupper(substr(bin2hex(random_bytes(2)), 1)); 
$host_name = gethostname();

$query = "INSERT INTO produtos (ProdutoID, Nome, Descricao, Preco, Categoria, Host) VALUES ('$produtoID', '$nomeProduto', '$descricaoProduto', '$precoProduto', '$categoriaProduto', '$host_name')";

if ($link->query($query) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $link->error;
}

?>
</body>
</html>

