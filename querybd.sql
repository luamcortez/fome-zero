CREATE SCHEMA fz DEFAULT CHARACTER SET latin1 ;
-- -----------------------------------------------------
-- Schema fz
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS fz DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema myturn_asd
-- -----------------------------------------------------
USE fz ;
-- -----------------------------------------------------
-- Table fz.mesa
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS fz.mesa (
  idmesa INT NOT NULL AUTO_INCREMENT,
  mesa VARCHAR(45) NULL,
  PRIMARY KEY (`idmesa`));
-- -----------------------------------------------------
-- Table fz.cliente
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS fz.cliente (
  cpf VARCHAR(45) NOT NULL,
  nome VARCHAR(45) NULL,
  PRIMARY KEY (`cpf`));
-- -----------------------------------------------------
-- Table fz.pedido
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS fz.pedido (
  idpedido INT NOT NULL AUTO_INCREMENT,
  data DATETIME NULL,
  obs VARCHAR(45) NULL,
  mesa_idmesa INT NOT NULL,
  cliente_cpf VARCHAR(45) NOT NULL,
  atendido VARCHAR(1) NULL,
  PRIMARY KEY (`idpedido`),
  INDEX fk_pedido_mesa_idx (`mesa_idmesa` ASC),
  INDEX fk_pedido_cliente1_idx (`cliente_cpf` ASC),
  CONSTRAINT fk_pedido_mesa
    FOREIGN KEY (`mesa_idmesa`)
    REFERENCES fz.mesa (`idmesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_pedido_cliente1
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES fz.cliente (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table fz.tipo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS fz.tipo (
  idtipo INT NOT NULL AUTO_INCREMENT,
  categoria VARCHAR(45) NULL,
  PRIMARY KEY (`idtipo`));
-- -----------------------------------------------------
-- Table fz.produto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS fz.produto (
  idproduto INT NOT NULL AUTO_INCREMENT,
  desconto VARCHAR(45) NULL,
  valor VARCHAR(45) NULL,
  tipo VARCHAR(45) NULL,
  tipo_idtipo INT NOT NULL,
  PRIMARY KEY (`idproduto`),
  INDEX fk_produto_tipo1_idx (`tipo_idtipo` ASC),
  CONSTRAINT fk_produto_tipo1
    FOREIGN KEY (`tipo_idtipo`)
    REFERENCES fz.tipo (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table fz.aux_pedido
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS fz.aux_pedido (
  produto_idproduto INT NOT NULL,
  pedido_idpedido INT NOT NULL,
  PRIMARY KEY (`produto_idproduto`, `pedido_idpedido`),
  INDEX fk_produto_has_pedido_pedido1_idx (`pedido_idpedido` ASC),
  INDEX fk_produto_has_pedido_produto1_idx (`produto_idproduto` ASC),
  CONSTRAINT fk_produto_has_pedido_produto1
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES fz.produto (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_produto_has_pedido_pedido1
    FOREIGN KEY (`pedido_idpedido`)
    REFERENCES fz.pedido (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table fz.login
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS fz.login (
  id INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(45) NULL,
  senha VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
  
  
  
  ALTER TABLE fz.produto 
ADD COLUMN url_img VARCHAR(255) NOT NULL AFTER tipo_idtipo;