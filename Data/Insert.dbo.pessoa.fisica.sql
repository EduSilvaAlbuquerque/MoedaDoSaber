USE [dbo.moeda_do_saber]
GO

INSERT INTO [dbo].[pessoa_fisica]
           ([ID]
           ,[Nome]
           ,[Matricula]
           ,[DataCadastro]
           ,[CPF]
           ,[DataNascimento]
           ,[Email]
           ,[Fone])
     VALUES
           (<ID, int,>
           ,<Nome, nvarchar(100),>
           ,<Matricula, nvarchar(50),>
           ,<DataCadastro, date,>
           ,<CPF, nvarchar(20),>
           ,<DataNascimento, date,>
           ,<Email, nvarchar(100),>
           ,<Fone, nvarchar(20),>)
GO

