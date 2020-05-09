<?php

Class Tribunal {

    private $pdo;
    public function __construct($dbname, $host, $user, $senha){

            try {
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            } catch (PDOException $e) {
                echo "Erro com o banco de dados: ".$e->getMessage();
                exit();
            }catch (Exception $e) {
                echo "Erro generico: ".$e->getMessage();
                exit();
            }
    }

    public function consulta1(){

        $res1 = array();
        $cmd1 = $this->pdo->query("SELECT requerente.nome AS REQUERENTE, requerente.num AS CPF FROM REQUERENTE WHERE requerente.tipo = 'CPF' ORDER BY requerente.nome");
        $res1 = $cmd1->fetchAll(PDO::FETCH_ASSOC);
        return $res1;
    }

    public function consulta2(){

        $res2 = array();
        $cmd2 = $this->pdo->query("SELECT juiz.nome AS JUIZ, audiencia.data AS Data_das_Audiências FROM ( audiencia INNER JOIN juiz ON audiencia.juiz = juiz.id)");
        $res2 = $cmd2->fetchAll(PDO::FETCH_ASSOC);
        return $res2;
    }

    public function consulta3(){

        $res3 = array();
        $cmd3 = $this->pdo->query("SELECT juiz.nome AS JUIZ, processo.nome AS Nome_do_Processo, audiencia.valor AS Valor_da_Multa FROM (JUIZ INNER JOIN audiencia ON juiz.id = audiencia.juiz INNER JOIN processo ON processo.id_audiencia = audiencia.id) ORDER BY valor_da_multa");
        $res3 = $cmd3->fetchAll(PDO::FETCH_ASSOC);
        return $res3;
    }

    public function consulta4(){

        $res4 = array();
        $cmd4 = $this->pdo->query("SELECT processo.nome AS PROCESSO, requerente.nome AS REQUERENTE, requerido.nome AS REQUERIDO, juiz.nome AS JUIZ, audiencia.valor AS MULTA, audiencia.data AS DATA_AUDIENCIA FROM 
        (PROCESSO INNER JOIN REQUERENTE ON processo.requerente = requerente.id 
        INNER JOIN REQUERIDO ON processo.requerido = requerido.id INNER JOIN audiencia ON processo.id_audiencia = audiencia.id INNER JOIN juiz ON audiencia.juiz = juiz.id)
        ORDER BY audiencia.data");
        $res4 = $cmd4->fetchAll(PDO::FETCH_ASSOC);
        return $res4;
    }

    public function consulta5(){

        $res5 = array();
        $cmd5 = $this->pdo->query("SELECT requerente.nome AS REQUERENTE, requerente.num AS CNPJ FROM REQUERENTE WHERE requerente.tipo = 'CNPJ' ORDER BY requerente.nome");
        $res5 = $cmd5->fetchAll(PDO::FETCH_ASSOC);
        return $res5;
    }

    public function consulta6(){

        $res6 = array();
        $cmd6 = $this->pdo->query("select juiz.nome AS Juiz, count(audiencia.juiz) AS Audiências from 
        (juiz Inner join audiencia ON juiz.id = audiencia.juiz INNER JOIN processo ON processo.id_audiencia = audiencia.id)
         group by juiz.nome 
         order by Audiências");
        $res6 = $cmd6->fetchAll(PDO::FETCH_ASSOC);
        return $res6;
    }

    public function consulta7(){

        $res7 = array();
        $cmd7 = $this->pdo->query("SELECT processo.nome AS PROCESSO, requerente.nome AS REQUERENTE, requerido.nome AS REQUERIDO, juiz.nome AS JUIZ, audiencia.valor AS MULTA, audiencia.data AS DATA_AUDIENCIA
        FROM (PROCESSO INNER JOIN REQUERENTE ON processo.requerente = requerente.id 
        INNER JOIN REQUERIDO ON processo.requerido = requerido.id 
        INNER JOIN audiencia ON processo.id_audiencia = audiencia.id 
        INNER JOIN juiz ON audiencia.juiz = juiz.id)
        WHERE processo.nome LIKE '%Bandeirantes%'
        ORDER BY audiencia.data");
        $res7 = $cmd7->fetchAll(PDO::FETCH_ASSOC);
        return $res7;
    }

    public function consulta8(){

        $res8 = array();
        $cmd8 = $this->pdo->query("SELECT COUNT(processo.nome) AS Numero_de_Processos, SUM(audiencia.valor) AS Total
        FROM (processo INNER JOIN audiencia ON processo.id_audiencia = audiencia.id) WHERE audiencia.data LIKE '2020%'");
        $res8 = $cmd8->fetchAll(PDO::FETCH_ASSOC);
        return $res8;
    }

    public function consulta9(){

        $res9 = array();
        $cmd9 = $this->pdo->query("SELECT processo.nome AS PROCESSO, audiencia.valor AS MULTA, audiencia.data AS DATA FROM 
        (processo INNER JOIN audiencia ON processo.id_audiencia = audiencia.id)
        WHERE (audiencia.data < '2022-01-01' AND audiencia.data > '2020-12-31')
        ORDER BY audiencia.data");
        $res9 = $cmd9->fetchAll(PDO::FETCH_ASSOC);
        return $res9;
    }

    public function consulta10(){

        $res10 = array();
        $cmd10 = $this->pdo->query("SELECT juiz.nome AS JUIZ FROM 
        juiz WHERE juiz.nome
        NOT IN (SELECT juiz.nome FROM (audiencia INNER JOIN juiz ON audiencia.juiz = juiz.id)) ORDER BY juiz.nome");
        $res10 = $cmd10->fetchAll(PDO::FETCH_ASSOC);
        return $res10;
    }

}

?>