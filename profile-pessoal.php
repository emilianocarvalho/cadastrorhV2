                  <div class="card-header">
                    <h3 class="card-title">Perfil do Servidor</h3>
                  </div>
                  <div class="card-body">
                    <!-- <h3 class="card-title">Perfil do Servidor</h3> -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-label">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome" autofocus placeholder="Nome do servidor..." value="<?php echo $cliente->nome; ?>">
                        </div>
                      </div>
                      <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                          <label class="form-label">Pai</label>
                          <input type="text" class="form-control" id="pai" name="pai" placeholder="Nome do pai..." value="<?php echo $cliente->pai; ?>">
                        </div>
                      </div>
                      <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                          <label class="form-label">Mãe</label>
                          <input type="email" class="form-control" id="mae" name="mae" placeholder="Nome da mãe..." value="<?php echo $cliente->mae; ?>">
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                          <label class="form-label">CEP</label>
                          <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP..." value="<?php echo $cliente->cep; ?>">
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group">
                          <label class="form-label">Rua</label>
                          <input type="text" class="form-control" id="rua" name="rua" placeholder="Nome da rua..." value="<?php echo $cliente->rua; ?>">
                        </div>
                      </div>
                      <div class="col-sm-2 col-md-2">
                        <div class="form-group">
                          <label class="form-label">Nº</label>
                          <input type="text" class="form-control" id="numero" name="numero" maxlength="12" placeholder="Last Name" value="<?php echo $cliente->numero; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                          <label class="form-label">Complemento</label>
                          <input type="text" class="form-control" id="complemento" name="complemento" placeholder="complemento..." value="<?php echo $cliente->complemento; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                          <label class="form-label">Bairro</label>
                          <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Nome do bairro..." value="<?php echo $cliente->bairro; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                          <label class="form-label">Cidade</label>
                          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade..." value="<?php echo $cliente->cidade; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label class="form-label">CEP</label>
                          <input type="text" class="form-control" id="cep" name="ceo" placeholder="CEP..." value="<?php echo $cliente->cep; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label class="form-label">Tipo sangue</label>
                          <input type="text" class="form-control" id="tipo_sangue" name="tipo_sangue" placeholder="Tipo sangue..." value="<?php echo $cliente->tipo_sangue; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-9">
                        <div class="form-group">
                          <label class="form-label">E-mail</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="E-mail..." value="<?php echo $cliente->email; ?>">
                        </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                        <div class="form-group">
                          <label class="form-label">Matrícula</label>
                          <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula..." value="<?php echo $cliente->matricula; ?>">
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
                  </div>
