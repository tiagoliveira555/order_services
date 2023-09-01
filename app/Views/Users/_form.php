<div class="form-group">
  <label class="form-control-label">Nome completo</label>
  <input type="text" name="name" placeholder="Insira o nome completo" class="form-control" value="<?php echo esc($user->name); ?>">
</div>
<div class="form-group">
  <label class="form-control-label">E-mail</label>
  <input type="email" name="email" placeholder="Insira o e-mail de acesso" class="form-control" value="<?php echo esc($user->email); ?>">
</div>
<div class="form-group">
  <label class="form-control-label">Senha</label>
  <input type="password" name="password" placeholder="Senha de acesso" class="form-control">
</div>
<div class="form-group">
  <label class="form-control-label">Confirmação da senha</label>
  <input type="password" name="password_confirmation" placeholder="Confirme a senha de acesso" class="form-control">
</div>
<div class="custom-control custom-checkbox">
  <input type="hidden" name="active" value="0">
  <input type="checkbox" name="active" value="1" class="custom-control-input" id="active" <?php if ($user->active) { ?>checked<?php } ?> >
  <label class="custom-control-label" for="active">Usuário ativo</label>
</div>