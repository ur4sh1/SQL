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

    <table>
      <tr>
        <td>
          <h2>CONSULTA</h2>
        </td>
        <td>
          <h2>RESULTADO</h2>
        </td>
      </tr>

      <tr>
        <td>
          <p>"SELECT requerente.nome AS REQUERENTE, requerente.num AS CPF FROM REQUERENTE WHERE requerente.tipo = 'CPF'"</p>
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
          <p>"SELECT requerente.nome AS REQUERENTE, requerente.num AS CNPJ FROM REQUERENTE WHERE requerente.tipo = 'CNPJ'"</p>
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
        <p>"SELECT audiencia.data AS Data_Audiencia, juiz.nome AS juiz FROM 
          ( audiencia INNER JOIN juiz ON audiencia.juiz = juiz.id)"</p>
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
        <p>"SELECT juiz.nome AS JUIZ, processo.nome AS Nome_do_Processo, audiencia.valor AS Valor_da_Multa FROM 
          (JUIZ INNER JOIN audiencia ON juiz.id = audiencia.juiz INNER JOIN processo ON processo.id_audiencia = audiencia.id)"</p>
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
          <p>"SELECT processo.nome AS PROCESSO, requerente.nome AS REQUERENTE, requerido.nome AS REQUERIDO, audiencia.data
          FROM (processo INNER JOIN REQUERENTE ON processo.requerente = requerente.id
          INNER JOIN requerido ON processo.requerido = requerido.id
          INNER JOIN audiencia ON processo.id_audiencia = audiencia.id)
          ORDER BY DATA_AUDIENCIA"</p>
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
    </table>
  </body>
</html>