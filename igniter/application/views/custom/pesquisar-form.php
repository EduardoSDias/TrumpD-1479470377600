<form action="<?=site_url('item/pesquisa_item');?>" method="get">
    
    <div class="form-horizontal col-sm-8 col-sm-offset-2">
        
        <div class="form-group">
          <label for="pesquisa" class="col-sm-2 control-label">Pesquisar</label>
          <div class="col-sm-10">
            <input class="form-control" id="pesquisa" placeholder="Ex: CPF"
                   name="pesquisa">
          </div>
        </div>
        
        
        <div class="form-group">
          <label for="categoriaId" class="col-sm-2 control-label">Categoria</label>
          <div class="col-sm-10">
              <select class="form-control"  name="categoriaId" id="categoriaId">
                  <option value="">Sem categorias</option>
                <?php
                    foreach ($categoria as $cat){
                ?>
                  <option value="<?=$cat['categoriaId'] ?>"> <?=$cat['nome'] ?>  </option>
                <?php
                    }
                ?>
              </select>
          </div>
        </div>
        
        
        <input class="btn btn-default center-block" type="submit" value="Pesquisar">
        
    </div>  
    
</form>
