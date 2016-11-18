<?=form_open_multipart('item/insereItem'); ?>
    
    <div class="form-horizontal col-sm-8 col-sm-offset-2">
        
        <div class="form-group">
          <label for="item" class="col-sm-2 control-label">Item Perdido</label>
          <div class="col-sm-10">
            <input class="form-control" id="item" placeholder="Ex: Iphone 5s"
                   value="<?= set_value('nome')?>" name="nome" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="descricao" class="col-sm-2 control-label">Descrição</label>
          <div class="col-sm-10">
              <textarea class="form-control" id="descricao" placeholder="Ex: Branco, com tela trincada, capa rosa"
                        value="<?= set_value('descricao')?>" name="descricao" required></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label for="categoriaId" class="col-sm-2 control-label">Categoria</label>
          <div class="col-sm-10">
              <select class="form-control"  name="categoriaId" id="categoriaId" required >
                <?php
                    foreach ($lista as $cat){
                ?>
                  <option value="<?=$cat['categoriaId'] ?>"> <?=$cat['nome'] ?>  </option>
                <?php
                    }
                ?>
              </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="dataAchado" class="col-sm-2 control-label">Data em que achou o item</label>
          <div class="col-sm-10">
              <input type="date" class="form-control" name="dataAchado" id="dataAchado" required>
          </div>
        </div>
                
        
        <div class="form-group">
          <label for="userfile" class="col-sm-2 control-label">Foto do item</label>
          <div class="col-sm-10">         
              <input type="file" class="form-control" name="userfile" id="userfile" size="20" accept="image/*">
          </div>
        </div>
        
        <input class="btn btn-default center-block" type="submit" value="Cadastrar">
        
    </div>  
    
</form>
