                  <div class="card-header">
                    <h3 class="card-title">Dados Cadastrais</h3>
                  </div>                  
                  <div class="card-body">
                    <!-- <h3 class="card-title">Cadastrais</h3> -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-label">CPF</label>
                          <input type="text" class="form-control" id="cpf" name="cpf" autofocus placeholder="Informe o CPF..." value="<?php echo $cliente->cpf; ?>">
                        </div>
                      </div>
                      <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                          <label class="form-label">RG</label>
                          <input type="text" class="form-control" id="identidade" name="identidade" placeholder="Informe o RG..." value="<?php echo $cliente->identidade; ?>">
                        </div>
                      </div>
                      <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                          <label class="form-label">Título de Eleitor</label>
                          <input type="email" class="form-control" maxlength="14" id="titulo" name="titulo" placeholder="Título de eleitor..." value="<?php echo $cliente->titulo; ?>">
                        </div>
                      </div>
                      <div class="col-sm-3 col-md-3">
                        <div class="form-group">
                          <label class="form-label">Zona</label>
                          <input type="text" class="form-control" maxlength="3" id="zona" name="zona" placeholder="Zona eleitoral..." value="<?php echo $cliente->zona; ?>">
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group">
                          <label class="form-label">Seção</label>
                          <input type="text" class="form-control" id="secao" name="secao" placeholder="Seção eleitoral..." value="<?php echo $cliente->secao; ?>">
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
                      <div class="col-sm-6 col-md-3">
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
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="form-label">E-mail</label>
                          <select class="form-control custom-select">
                            <option value="">Germany</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label class="form-label">About Me</label>
                          <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
You doubt I'll bother, reading into it
I'll probably won't, left to my own devices
But that's the difference in our opinions.</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
                  </div>
