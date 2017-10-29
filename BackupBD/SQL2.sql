-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Equipe (
Nome_Equipe Nvarchar(),
IdEquipe Nvarchar() PRIMARY KEY,
DtEntrada Nvarchar(),
IdProjeto Nvarchar()
)

CREATE TABLE Endereço+Empregado (
Rua Nvarchar(),
Bairro Nvarchar(),
Estado Nvarchar(),
IdEndereco Nvarchar(),
Municipio Nvarchar(),
TelefoneResidencial Nvarchar(),
Senha Nvarchar(),
TelefoneCel Nvarchar(),
CPF Nvarchar(),
Nome Nvarchar(),
IdEmpregado Nvarchar(),
Sobrenome Nvarchar(),
Cargo Nvarchar(),
Login Nvarchar(),
IdEquipe Nvarchar(),
IdProjeto Nvarchar(),
PRIMARY KEY(IdEndereco,IdEmpregado),
FOREIGN KEY(IdEquipe) REFERENCES Equipe (IdEquipe)
)

CREATE TABLE Projeto (
IdProjeto Nvarchar() PRIMARY KEY,
Fase Nvarchar(),
DtInicio Nvarchar(),
DtFim Nvarchar(),
NomeProjeto Nvarchar(),
DtProrrogada Nvarchar()
)

CREATE TABLE Horas (
IdDia Nvarchar() PRIMARY KEY,
HoraEntrada Nvarchar(),
HoraSaida Nvarchar(),
HoraAcumulada Nvarchar(),
HoraDevida Nvarchar(),
Dia Nvarchar(),
IdEmpregado Nvarchar(),
FOREIGN KEY(/*erro: ??*/) REFERENCES Endereço+Empregado (IdEndereco,IdEmpregado)
)

CREATE TABLE Gerencia (
IdEmpregado Nvarchar(),
possui_IdEmpregado Nvarchar()
)

ALTER TABLE Equipe ADD FOREIGN KEY(IdProjeto) REFERENCES Projeto (IdProjeto)
ALTER TABLE Endereço+Empregado ADD FOREIGN KEY(IdProjeto) REFERENCES Projeto (IdProjeto)
