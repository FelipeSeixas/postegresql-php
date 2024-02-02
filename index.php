<?php
$servidor = "localhost";
$porta = 5432;
$bancoDeDados = "test_v1";
$usuario = "postgres";


$stringDeConexao = "host=$servidor port=$porta dbname=$bancoDeDados user=$usuario";
$conexao = pg_connect($stringDeConexao);

if (!$conexao) {
    die("Não foi possível se conectar ao banco de dados.");
}else{
    echo "Conectou com sucesso!";
}

//$query = 'select * from cliente';
$query_v1 = '
    select * 
    from cliente
    where numero = 1
';

//PostgreSQL
$query_v2 = '
    select version()
';
//where numero = 1

$query_v33 = '
    select *
    from agencia
    where banco_numero = 247 and numero = 2
';

$query_v3 = '
    select banco_numero
    from banco
    where banco_numero = 247 and numero = 2
';

$query_v4 = '
    insert into banco (numero, nome)
    values (848484, \'Banco de Natal-RN\') 
';

$query_v5 = '
    select *
    from banco
    where numero = 848484 
';

$query_v6 = '
    update banco
    set numero = 8585
    where numero = 848484
';

$query_v8 = '
    select *
    from banco
    where numero = 8585
';

$query_v7 = '
    select *
    from banco
    where numero = 868686
';

$query_v9 = '
    update banco
    set nome = \'Banco Lagoa da Cotia\'
    where numero = 8585
';

$query_delete = '
    delete from banco
    where numero = 8585
';

$result = pg_query($conexao, $query_v8) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($conexao);

?>