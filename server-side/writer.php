<?php
if (isset($_POST["stato"]) && !empty($_POST["stato"])) {
    $stato = $_POST["stato"];
}else{
    echo "Errore parametri non impostati!";
    exit();
}

if (isset($_POST["key"]) && !empty($_POST["key"])) {
    $key = $_POST["key"];
}else{
    echo "Errore parametri non impostati!";
    exit();
}

if (isset($_POST["nome"]) && !empty($_POST["nome"])) {
    $nome = $_POST["nome"];
}else{
    echo "Errore parametri non impostati!";
    exit();
}

/*Password per l'autenticazione del client*/
$keyCorretta['Campus'] = "";
$keyCorretta['Arata'] = "";

if($key!=$keyCorretta[$nome]){
   echo "Errore Password non valida!";
   exit();
}

if(strlen($stato)>100){
   echo "Errore Stringa troppo lunga!";
   exit();
}

if (!preg_match("/^[01]*$/", $stato)) {
    echo "Errore Stringa non valida!";
    exit();
}

$myfile = fopen("stato".$nome.".txt", "w") or die("Errore Impossibile aprire il file!");
fwrite($myfile, $stato);
fclose($myfile);
echo "ok";

?>
