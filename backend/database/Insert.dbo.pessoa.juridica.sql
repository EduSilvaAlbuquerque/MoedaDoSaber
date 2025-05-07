USE [dbo.moeda_do_saber]
GO

INSERT INTO [dbo].[pessoa_juridica]
           ([ID]
           ,[Nome]
           ,[Matricula]
           ,[DataCadastro]
           ,[NomeRazaoSocial]
           ,[CNPJ]
           ,[DataAbertura])
     VALUES
           (<ID, int,>
           ,<Nome, nvarchar(100),>
           ,<Matricula, nvarchar(50),>
           ,<DataCadastro, date,>
           ,<NomeRazaoSocial, nvarchar(100),>
           ,<CNPJ, nvarchar(20),>
           ,<DataAbertura, date,>)
GO

