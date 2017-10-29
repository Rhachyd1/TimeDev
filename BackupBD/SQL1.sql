-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Endereço (
Rua NVARCHAR,
Bairro NVARCHAR,
Estado NVARCHAR,
IdEndereco NVARCHAR PRIMARY KEY,
Municipio NVARCHAR,
TelefoneResidencial NVARCHAR
)

CREATE TABLE Projeto (
IdProjeto NVARCHAR PRIMARY KEY,
Fase NVARCHAR,
DtInicio NVARCHAR,
DtFim NVARCHAR,
DtProrrogada NVARCHAR,
NomeProjeto NVARCHAR
)

CREATE TABLE Empregado (
Nome NVARCHAR,
IdEmpregado NVARCHAR PRIMARY KEY,
Sobrenome NVARCHAR,
CPF NVARCHAR,
TelefoneCel NVARCHAR,
Senha NVARCHAR,
Cargo NVARCHAR,
Login NVARCHAR,
IdEndereco NVARCHAR,
IdProjeto NVARCHAR,
IdEquipe NVARCHAR,
FOREIGN KEY(IdEndereco) REFERENCES Endereço (IdEndereco),
FOREIGN KEY(IdProjeto) REFERENCES Projeto (IdProjeto)
)

CREATE TABLE Equipe (
IdEquipe NVARCHAR PRIMARY KEY,
IdProjeto NVARCHAR,
FOREIGN KEY(IdProjeto) REFERENCES Projeto (IdProjeto)
)

CREATE TABLE Horas (
IdDia NVARCHAR PRIMARY KEY,
HoraEntrada NVARCHAR,
HoraSaida NVARCHAR,
HoraAcumulada NVARCHAR,
HoraDevida NVARCHAR,
Dia NVARCHAR,
IdEmpregado NVARCHAR,
FOREIGN KEY(IdEmpregado) REFERENCES Empregado (IdEmpregado)
)

CREATE TABLE Gerencia (
IdEmpregado NVARCHAR,
possui_IdEmpregado NVARCHAR
)

ALTER TABLE Empregado ADD FOREIGN KEY(IdEquipe) REFERENCES Equipe (IdEquipe)
