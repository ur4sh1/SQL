<?php 
require_once 'class_consulta.php';
$c = new Tribunal("tribunal","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>SIS_Tribuna</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <h1 id="titulo">TRIBUNAL</h1>
    <table>
      <tr>
        <td>
          <h1 id="titulo">CONSULTA</h1>
        </td>
        <td>
          <h1 id="titulo">RESULTADO</h1>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>CONSULTA REQUERENTES PESSOAS FÍSICAS EM ORDEM ALFABÉTICA</h3></p>
          <p>"SELECT requerente.nome AS REQUERENTE, requerente.num AS CPF FROM REQUERENTE WHERE requerente.tipo = 'CPF' ORDER BY requerente.nome"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta1();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta1();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>CONSULTA REQUERENTES PESSOAS JURÍDICAS EM ORDEM ALFABÉTICA</h3></p>
          <p>"SELECT requerente.nome AS REQUERENTE, requerente.num AS CNPJ FROM REQUERENTE WHERE requerente.tipo = 'CNPJ' ORDER BY requerente.nome"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta5();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta5();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>
        <p><h3>CONSULTA NOME DOS JUIZES DE CADA AUDIENCIA REGISTRADA</h3></p>
        <p>"SELECT audiencia.data AS Data_Audiencia, juiz.nome AS juiz FROM 
          (audiencia INNER JOIN juiz ON audiencia.juiz = juiz.id)"</p>
        </td>
        <td>
        <table>
          <tr>
            <?php
              $dados = $c->consulta2();
              foreach($dados[0] as $k => $v){
                echo '<th>' . $k . '</th>';
              }
            ?>
          </tr>
        </thead>
          <?php
              $dados = $c->consulta2();
              if(count($dados)>0){
                  for($i=0;$i<count($dados);$i++){
                      echo"<tr>";
                      foreach($dados[$i] as $k => $v){
                          if($k != "id"){
                              echo "<td>".$v."</td>";
                          }
                      }
                    echo"</tr>";
                  }
              }
          ?>
        </table>
        </td>
      </tr>
      
      <tr>
        <td>
        <p><h3>CONSULTA NOME DOS JUIZES DE CADA PROCESSO E RESPECTIVAS MULTAS EM ORDEM CRESCENTE</h3></p>
        <p>"SELECT juiz.nome AS JUIZ, processo.nome AS Nome_do_Processo, audiencia.valor AS Valor_da_Multa FROM 
          (JUIZ INNER JOIN audiencia ON juiz.id = audiencia.juiz INNER JOIN processo ON processo.id_audiencia = audiencia.id) ORDER BY valor_da_multa"</p>
        </td>
        <td>
        <table>
          <tr>
            <?php
              $dados = $c->consulta3();
              foreach($dados[0] as $k => $v){
                echo '<th>' . $k . '</th>';
              }
            ?>
          </tr>
        </thead>
          <?php
              $dados = $c->consulta3();
              if(count($dados)>0){
                  for($i=0;$i<count($dados);$i++){
                      echo"<tr>";
                      foreach($dados[$i] as $k => $v){
                          if($k != "id"){
                              echo "<td>".$v."</td>";
                          }
                      }
                    echo"</tr>";
                  }
              }
          ?>
        </table>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>CONSULTA TODOS OS PROCESSOS REGISTRADOS, EXIBINDO NOME, REQUERENTE, REQUERIDO, JUIZ DO PROCESSO, MULTAS E DATA DA AUDIENCIA EM ORDEM CRONOLOGICA</h3></p>
          <p>"SELECT processo.nome AS PROCESSO, requerente.nome AS REQUERENTE, requerido.nome AS REQUERIDO, juiz.nome AS JUIZ, audiencia.valor AS MULTA, audiencia.data AS DATA_AUDIENCIA FROM 
        (processo INNER JOIN requerente ON processo.requerente = requerente.id 
        INNER JOIN requerido ON processo.requerido = requerido.id INNER JOIN audiencia ON processo.id_audiencia = audiencia.id INNER JOIN juiz ON audiencia.juiz = juiz.id)
        ORDER BY audiencia.data"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta4();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta4();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>CONSULTA O TOTAL DE AUDIENCIAS POR JUIZ EM ORDEM CRESCENTE</h3></p>
          <p>"SELECT juiz.nome AS Juiz, count(audiencia.juiz) AS Audiências from 
          (juiz INNER JOIN audiencia ON juiz.id = audiencia.juiz INNER JOIN processo ON processo.id_audiencia = audiencia.id) 
          GROUP BY juiz.nome 
          ORDER BY Audiências"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta6();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta6();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>CONSULTA TODOS OS PROCESSOS ENVOLVENDO A EMPRESA BANDEIRANTES E SUAS RESPECTIVAS INFORMAÇÕES REGISTRADAS</h3></p>
          <p>"SELECT processo.nome AS PROCESSO, requerente.nome AS REQUERENTE, requerido.nome AS REQUERIDO, juiz.nome AS JUIZ, audiencia.valor AS MULTA, audiencia.data AS DATA_AUDIENCIA
        FROM (PROCESSO INNER JOIN REQUERENTE ON processo.requerente = requerente.id 
        INNER JOIN REQUERIDO ON processo.requerido = requerido.id 
        INNER JOIN audiencia ON processo.id_audiencia = audiencia.id 
        INNER JOIN juiz ON audiencia.juiz = juiz.id)
        WHERE processo.nome LIKE '%Bandeirantes%'
        ORDER BY audiencia.data"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta7();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta7();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>EXIBE O TOTAL DE PROCESSOS REGISTRADOS E A SOMA DOS VALORES DAS MULTAS NO ANO DE 2020</h3></p>
          <p>"SELECT COUNT(processo.nome) AS Numero_de_Processos, SUM(audiencia.valor) AS Total
          FROM (processo INNER JOIN audiencia ON processo.id_audiencia = audiencia.id) WHERE audiencia.data LIKE '2020%'"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta8();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta8();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>CONSULTA TODOS OS PROCESSOS DO ANO DE 2021 E SUAS RESPECTIVAS MULTAS E DATAS EM ORDEM CRONOLOGICA</h3></p>
          <p>"SELECT processo.nome AS PROCESSO, audiencia.valor AS MULTA, audiencia.data AS DATA FROM 
          (processo INNER JOIN audiencia ON processo.id_audiencia = audiencia.id)
          WHERE (audiencia.data < '2022-01-01' AND audiencia.data > '2020-12-31')
          ORDER BY audiencia.data"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta9();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta9();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

      <tr>
        <td>
          <p><h3>CONSULTA TODOS OS JUIZES QUE NÃO TEM AUDIENCIAS REGISTRADAS EM ORDEM ALFABÉTICA</h3></p>
          <p>"SELECT juiz.nome AS JUIZ FROM 
          juiz WHERE juiz.nome
          NOT IN (SELECT juiz.nome FROM (audiencia INNER JOIN juiz ON audiencia.juiz = juiz.id)) ORDER BY juiz.nome"</p>
        </td>
        <td>
          <table>
            <tr>
              <?php
                $dados = $c->consulta10();
                foreach($dados[0] as $k => $v){
                  echo '<th>' . $k . '</th>';
                }
              ?>
            </tr>
          </thead>
            <?php
                $dados = $c->consulta10();
                if(count($dados)>0){
                    for($i=0;$i<count($dados);$i++){
                        echo"<tr>";
                        foreach($dados[$i] as $k => $v){
                            if($k != "id"){
                                echo "<td>".$v."</td>";
                            }
                        }
                      echo"</tr>";
                    }
                }
            ?>
          </table>
        </td>
      </tr>

    </table>
  </body>
</html>