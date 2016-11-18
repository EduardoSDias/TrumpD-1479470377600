<div id="lista-item">

    <?php
        if(empty($lista)){
            echo "<h1 class=\"text-center not-list\"> Não existem itens cadastrados </h1>";            
        }
        foreach($lista as $item){   

    ?> 

           <div class="make-3D-space">
               <div class="product-card">
                   <div class="product-front">
                       <img src="<?= base_url($item["img"]);?>" class="image_item" alt="" />
                       <div class="image_overlay"></div>
                       <a href="<?= base_url('item/updateItem/'.$item['itemId'])?>"><div class="view_details">Este item é meu!</div></a>
                       <div class="stats">        	
                           <div class="stats-container">
                               <span class="product_price"><?= $item['categoria'];?></span>
                               <span class="product_name"><?= $item['nome']?></span>    
                               <p>Cadastrado em: <?= date('d/m/Y',  strtotime($item['dataCadastro'])); ?></p>                                            

                               <div class="product-options">
                                   <p><?= $item['descricao']?>
                                       <br>
                                   <span>Achado em: <?= $item['dataAchado']?></span>
                                   </p>
                               </div>                       
                           </div>                         
                       </div>
                   </div>
               </div>	
           </div> 
    <?php
        }
    ?>
    </div>
