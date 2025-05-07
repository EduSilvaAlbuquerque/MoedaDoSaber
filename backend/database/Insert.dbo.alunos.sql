USE [dbo.moeda_do_saber]
GO

INSERT INTO [dbo].[alunos]
           ([ID]
           ,[Nome]
           ,[Matricula]
           ,[DataCadastro]
           ,[CPF]
           ,[DataNascimento]
           ,[Turma])
     VALUES
           (<ID, int,>
           ,<Nome, nvarchar(100),>
           ,<Matricula, nvarchar(50),>
           ,<DataCadastro, date,>
           ,<CPF, nvarchar(20),>
           ,<DataNascimento, date,>
           ,<Turma, nvarchar(10),>)
GO

