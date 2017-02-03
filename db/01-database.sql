SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cliente` (
  `cpf` VARCHAR(11) NOT NULL,
  `nome_cliente` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(45) NULL,
  `data_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `saldo_devedor` DECIMAL(15,2) NOT NULL DEFAULT 0,
  `situacao_debito` VARCHAR(100) NOT NULL DEFAULT 'Em dia',
  UNIQUE INDEX `nome_UNIQUE` (`nome_cliente` ASC),
  UNIQUE INDEX `endereco_UNIQUE` (`endereco` ASC),
  PRIMARY KEY (`cpf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `filme` (
  `codigo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `quantidade` INT UNSIGNED NOT NULL DEFAULT 0,
  `sinopse` TEXT NULL,
  `trailer` VARCHAR(255) NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  UNIQUE INDEX `titulo_UNIQUE` (`titulo` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `cliente`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `cliente` (`cpf`, `nome_cliente`, `endereco`, `data_cadastro`, `saldo_devedor`, `situacao_debito`) VALUES ('00100200398', 'Fulano', 'Rua Tabajara, 123', NULL, 0, 'Em dia');
INSERT INTO `cliente` (`cpf`, `nome_cliente`, `endereco`, `data_cadastro`, `saldo_devedor`, `situacao_debito`) VALUES ('00900800701', 'Beltrano', 'Rua Belgica, 321', NULL, 10, 'Em atraso');
INSERT INTO `cliente` (`cpf`, `nome_cliente`, `endereco`, `data_cadastro`, `saldo_devedor`, `situacao_debito`) VALUES ('12345678901', 'Ciclano', 'Av Maria Bonita, 1100', NULL, 0, 'Em dia');

COMMIT;


-- -----------------------------------------------------
-- Data for table `filme`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `filme` (`codigo`, `titulo`, `quantidade`, `sinopse`, `trailer`) VALUES (NULL, 'Alien vs. Predador', 3, 'Os equipamentos de satélite do milionário Charles Bishop Weyland (Lance Henriksen) detectam uma fonte de calor em um ponto remoto na Antártida. Recruta uma equipe composta de seguranças, técnicos e cientistas de diversas partes do mundo para explorar a estrutura semelhante a uma pirâmde. Navegam pela Plataforma de gelo Ross até o ponto de detecção, a 600 metros de profundidade na ilha Bouvetøya, numa antiga estação baleeira. Descobrem um túnel através do gelo que vai na direção exata da estrutura.', 'https://www.youtube.com/watch?v=jC1ngKr6QA8');
INSERT INTO `filme` (`codigo`, `titulo`, `quantidade`, `sinopse`, `trailer`) VALUES (NULL, 'Efeito Borboleta', 1, 'Evan Treborn frequentemente sofre apagões, muitas das vezes, em momentos de alto estresse. Na juventude (interpretado por Logan Lerman) e na adolescência (interpretado por John Patrick Amedori), Evan sofreu graves traumas sexuais e psicológicos. Esses traumas incluem ser forçado pelo vizinho George Miller (Eric Stoltz) (pai de Kayleigh e Tommy) a participar de pornografia infantil; quase sendo estrangulado até a morte pelo seu pai Jason Treborn (Callum Keith Rennie), que então foi morto por guardas em sua frente; assassinar uma mãe e sua filha recém-nascida enquanto brincava com dinamite com seus amigos; e ver o seu cão ser queimado vivo por Tommy.', 'https://www.youtube.com/watch?v=B8_dgqfPXFg');
INSERT INTO `filme` (`codigo`, `titulo`, `quantidade`, `sinopse`, `trailer`) VALUES (NULL, 'A Ilha', 2, 'O filme retrata, no ano 2019 um grande complexo muito regrado nos Estados Unidos. Todos os seus moradores vivem lá na desculpa dos administradores de serem os únicos que sobreviveram a um ataque de um vírus mortal que atacou toda a Terra. O único lugar no planeta onde esse vírus não chega é um lugar paradisíaco chamado de A Ilha, e as vezes um morador ganha a \"loteria\" e vai para esse local como prêmio. É quando o ingênuo Lincoln Six-Echo (Ewan McGregor), após se despedir de um amigo que foi mandado para a ilha, segue um estranho espécime (uma borboleta) e descobre a parte secreta do complexo. Lá ele vê uma cena chocante: os médicos do complexo matam o seu amigo tirando partes do seu corpo.', 'https://www.youtube.com/watch?v=yuLjZujKNmE');

COMMIT;

