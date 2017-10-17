-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Horas (
IdDia NVARCHAR(255) PRIMARY KEY,
HoraEntrada NVARCHAR(255),
HoraSaida NVARCHAR(255),
HoraAcumulada NVARCHAR(255),
HoraDevida NVARCHAR(255),
Dia NVARCHAR(255)
)

CREATE TABLE Endereço (
Rua NVARCHAR(255),
Bairro NVARCHAR(255),
Estado NVARCHAR(255),
IdEndereco NVARCHAR(255) PRIMARY KEY,
Municipio NVARCHAR(255),
TelefoneResidencial NVARCHAR(255)
)

CREATE TABLE Projeto (
IdProjeto NVARCHAR(255) PRIMARY KEY,
Fase NVARCHAR(255),
DtInicio NVARCHAR(255),
DtFim NVARCHAR(255),
DtProrrogada NVARCHAR(255),
NomeProjeto NVARCHAR(255)
)

CREATE TABLE Empregado (
Nome NVARCHAR(255),
IdEmpregado NVARCHAR(255),
Sobrenome NVARCHAR(255),
CPF NVARCHAR(255),
TelefoneCel NVARCHAR(255),
Senha NVARCHAR(255),
Fk_IdEquipe NVARCHAR(255),
Cargo NVARCHAR(255),
Login NVARCHAR(255),
IdEndereco NVARCHAR(255),
IdProjeto NVARCHAR(255),
-- Erro: nome do campo duplicado nesta tabela!
IdProjeto NVARCHAR(255),
IdEquipe NVARCHAR(255),
PRIMARY KEY(IdEmpregado,Fk_IdEquipe),
FOREIGN KEY(IdEndereco) REFERENCES Endereço (IdEndereco),
FOREIGN KEY(IdProjeto) REFERENCES Projeto (IdProjeto)
)

CREATE TABLE Equipe (
IdProjeto NVARCHAR(255),
IdEquipe NVARCHAR(255),
-- Erro: nome do campo duplicado nesta tabela!
IdProjeto NVARCHAR(255),
PRIMARY KEY(IdProjeto,IdEquipe),
FOREIGN KEY(IdProjeto) REFERENCES Projeto (IdProjeto)
)

CREATE TABLE Gerencia (
IdEmpregado NVARCHAR(255),
possui_IdEmpregado NVARCHAR(255),
Fk_IdEquipe NVARCHAR(255),
possui_Fk_IdEquipe NVARCHAR(255)
)

CREATE TABLE Acumula (
IdDia NVARCHAR(255),
IdEmpregado NVARCHAR(255),
Fk_IdEquipe NVARCHAR(255),
FOREIGN KEY(IdDia) REFERENCES Horas (IdDia),
FOREIGN KEY(Fk_IdEquipe,,) REFERENCES Empregado (IdEmpregado,Fk_IdEquipe)
)

ALTER TABLE Empregado ADD FOREIGN KEY(IdEquipe,,) REFERENCES Equipe (IdProjeto,IdEquipe)
