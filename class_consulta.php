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

        $res = array();
        $cmd = $this->pdo->query("SELECT requerente.nome AS REQUERENTE, requerente.num AS CPF FROM REQUERENTE WHERE requerente.tipo = 'CPF'");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function consulta2(){

        $res1 = array();
        $cmd1 = $this->pdo->query("SELECT juiz.nome AS juiz, audiencia.data AS Data_das_Audiências FROM ( audiencia INNER JOIN juiz ON audiencia.juiz = juiz.id)");
        $res1 = $cmd1->fetchAll(PDO::FETCH_ASSOC);
        return $res1;
    }

    public function consulta3(){

        $res2 = array();
        $cmd2 = $this->pdo->query("SELECT juiz.nome AS JUIZ, processo.nome AS Nome_do_Processo, audiencia.valor AS Valor_da_Multa FROM (JUIZ INNER JOIN audiencia ON juiz.id = audiencia.juiz INNER JOIN processo ON processo.id_audiencia = audiencia.id)");
        $res2 = $cmd2->fetchAll(PDO::FETCH_ASSOC);
        return $res2;
    }

    public function consulta4(){

        $res3 = array();
        $cmd3 = $this->pdo->query("SELECT processo.nome AS PROCESSO, requerente.nome AS REQUERENTE, requerido.nome AS REQUERIDO, juiz.nome AS JUIZ, audiencia.data AS DATA_AUDIENCIA FROM 
        (PROCESSO INNER JOIN REQUERENTE ON processo.requerente = requerente.id 
        INNER JOIN REQUERIDO ON processo.requerido = requerido.id INNER JOIN audiencia ON processo.id_audiencia = audiencia.id INNER JOIN juiz ON audiencia.juiz = juiz.id)
        ORDER BY DATA_AUDIENCIA");
        $res3 = $cmd3->fetchAll(PDO::FETCH_ASSOC);
        return $res3;
    }

    public function consulta5(){

        $res4 = array();
        $cmd4 = $this->pdo->query("SELECT requerente.nome AS REQUERENTE, requerente.num AS CNPJ FROM REQUERENTE WHERE requerente.tipo = 'CNPJ'");
        $res4 = $cmd4->fetchAll(PDO::FETCH_ASSOC);
        return $res4;
    }

    public function consulta6(){

        $res5 = array();
        $cmd5 = $this->pdo->query("select juiz.nome AS Juiz, count(audiencia.juiz) AS Audiências from 
        (juiz Inner join audiencia ON juiz.id = audiencia.juiz INNER JOIN processo ON processo.id_audiencia = audiencia.id)
         group by juiz.nome 
         order by Audiências");
        $res5 = $cmd5->fetchAll(PDO::FETCH_ASSOC);
        return $res5;
    }

}

?>