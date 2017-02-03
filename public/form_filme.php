<div class="row">
    <label for="titulo">Título</label>
    <input class="u-full-width" type="text" name="titulo" id="titulo" value="<?php echo $filme->getTitulo(); ?>" />
</div>
<div class="row">
    <label for="sinopse">Sinopse</label>
    <textarea class="u-full-width" name="sinopse" id="sinopse"><?php echo $filme->getSinopse(); ?></textarea>
</div>
<div class="row">
    <label for="quantidade">Quantidade</label>
    <input class="u-full-width" type="number" name="quantidade" id="quantidade" value="<?php echo $filme->getQuantidade(); ?>" />
</div>
<div class="row">
    <label for="trailer">Trailer</label>
    <input class="u-full-width" type="text" name="trailer" id="trailer" value="<?php echo $filme->getTrailer(); ?>" />
</div>
