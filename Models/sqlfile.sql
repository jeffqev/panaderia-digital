INSERT INTO cajero(VNDCEDULA, VNDNOMBRE, VNDAPELLIDO, VNDUSUARIO, VNDCONTRA, VNDCORREO, VNDESTADO) VALUES (1724482094,'Jefferson','Diaz','jeffqev','12345','jeff.qev@gmail.com',1)
INSERT INTO receta(RECID, RECNOMBRE, RECCOSTO, RECESTADO, RECPRECIO) VALUES (1,'Pan de migas',0,1,0)
ALTER TABLE receta ADD UNIQUE (RECNOMBRE);