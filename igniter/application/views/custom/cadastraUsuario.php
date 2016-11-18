<?=form_open_multipart('usuario/insereUsuario'); ?>
    
    <div class="form-horizontal col-sm-8 col-sm-offset-2">
        
        <div class="form-group">
          <label for="nome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input class="form-control" id="nome" placeholder="Ex: Machado de Assis Silva"
                   name="nome" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="machado@ig.com.br"
                     name="email" required>
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
        <input class="btn btn-default center-block" type="submit" value="Cadastrar">
        
    </div>  
    
</form>
