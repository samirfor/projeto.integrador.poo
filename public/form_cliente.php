<div class="row">
    <label for="nomeCliente">Nome</label>
    <input class="u-full-width" type="text" name="nomeCliente" id="nomeCliente" value="<?php echo $cliente->getNomeCliente(); ?>" />
</div>
<div class="row">
    <label for="cpf">CPF</label>
    <input class="u-full-width" type="text" minlength="11" maxlength="11" name="cpf" id="cpf" value="<?php echo $cliente->getCpf(); ?>" />
</div>
<div class="row">
    <label for="endereco">Endereço</label>
    <input class="u-full-width" type="text" name="endereco" id="endereco" value="<?php echo $cliente->getEndereco(); ?>" />
</div>
<div class="row">
    <label for="dataCadastro">Data do Cadastro</label>
    <input class="u-full-width" type="date" name="dataCadastro" id="dataCadastro" value="<?php echo date("Y-m-d", strtotime($cliente->getDataCadastro())); ?>" />
</div>
<div class="row">
    <label for="saldoDevedor">Saldo Devedor (R$)</label>
    <input class="u-full-width" type="number" min="0" step="0.1" name="saldoDevedor" id="saldoDevedor" value="<?php echo $cliente->getSaldoDevedor(); ?>" />
</div>

<div class="row">
    <label for="situacaoDebito">Situação do Débito</label>
    <select class="u-full-width" id="situacaoDebito" name="situacaoDebito" readonly>
      <option value="Em dia">Em dia</option>
      <option value="Em atraso">Em atraso</option>
    </select>
</div>
