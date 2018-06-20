<?php

	include "db.php";

	$stmt = $pdo->prepare("SELECT * from imovel where disponivel = true;");

	$stmt -> execute();

	$data = $stmt->fetchAll();
?>
<div class="card card-block" style="color:black;margin:2em auto 4em auto">

            <?php


            $aux2 = 0;

            if ($data) {

                ?>


                <div class="row equal" style="height: ;">

                    <?php

                    while ($aux2 < $stmt->rowcount()) {

                                $id_imovel[$aux2] = $data[$aux2]["id_imovel"];
                                $id_responsavel[$aux2] = $data[$aux2]["id_responsavel"];
                                $n_quartos[$aux2] = $data[$aux2]["n_quartos"];
                                $area[$aux2] = $data[$aux2]["area"];
                    ?>
			    <div class="col-12 col-sm-12  col-md-6 col-lg-4">
						<div class="card" style="width: 18rem; margin-top: 3rem;">
						  <img class="card-img-top" src="a.jpg" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Casa bonita</h5>
						    <p class="card-text">Casa muito bonita localizada em um vangloriado barro por um preco incrivel !</p>
						  </div>
						  <ul class="list-group list-group-flush">
						    <li class="list-group-item"><b>id respo:</b> <?php echo $id_responsavel[$aux2] ?></li>
						    <li class="list-group-item"><b>Quartos:</b> <?php echo $n_quartos[$aux2] ?></li>
						    <li class="list-group-item"><b>Area:</b> <?php echo $area[$aux2] ?></li>
						    <li class="list-group-item"><b>Bairro:</b> Propolis</li>
						    <li class="list-group-item"><b>Preco:</b> R$ 12</li>
						  </ul>
						  <div class="card-body">
						    <a href="#" class="card-link">Card link</a>
						    <a href="#" class="card-link">Another link</a>
						  </div>
						</div>
			    </div>


                        <?php
						$aux2++;
						}
						?>
                <?php

            }

            ?>

        </div>

</div>
