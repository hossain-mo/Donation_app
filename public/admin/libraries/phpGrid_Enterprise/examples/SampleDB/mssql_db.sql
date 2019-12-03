USE [master]
GO
/****** Object:  Database [sampledb]    Script Date: 03/22/2012 11:32:31 ******/
CREATE DATABASE [sampledb]
GO
USE [sampledb]
GO
/****** Object:  User [root]    Script Date: 03/22/2012 11:32:31 ******/
CREATE USER [root] FOR LOGIN [root] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  Table [dbo].[Person]    Script Date: 03/22/2012 11:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Person](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[lastname] [varchar](50) NULL,
	[firstname] [varchar](50) NULL,
	[age] [smallint] NULL,
 CONSTRAINT [PK_Person] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Person] ON
INSERT [dbo].[Person] ([id], [lastname], [firstname], [age]) VALUES (1, N'foo', N'bar', 123)
INSERT [dbo].[Person] ([id], [lastname], [firstname], [age]) VALUES (2, N'joe', N'blow', 59)
INSERT [dbo].[Person] ([id], [lastname], [firstname], [age]) VALUES (3, N'jane', N'doe', 23)
INSERT [dbo].[Person] ([id], [lastname], [firstname], [age]) VALUES (4, N'TEST', N'TEST AGAIN', 23)
INSERT [dbo].[Person] ([id], [lastname], [firstname], [age]) VALUES (5, N'test', N'test', 123)
SET IDENTITY_INSERT [dbo].[Person] OFF
/****** Object:  Table [dbo].[names]    Script Date: 03/22/2012 11:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[names](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[lname] [varchar](50) NOT NULL,
	[fname] [varchar](50) NOT NULL,
	[sex] [nchar](1) NULL,
	[race] [nchar](1) NULL,
	[dob] [date] NULL,
	[email] [varchar](50) NULL,
	[addr1] [varchar](50) NULL,
	[addr2] [varchar](50) NULL,
	[city] [varchar](50) NULL,
	[state] [nchar](2) NULL,
	[zip] [varchar](50) NULL,
	[note] [text] NULL,
 CONSTRAINT [PK_names] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[names] ON
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (3, N'Smith', N'John', N'M', N'W', CAST(0xA5D50A00 AS Date), N'smith@yahoo.com', N'123 California St', NULL, N'San Francisco', N'CA', N'94070', N'test note')
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (4, N'Smith', N'John', N'M', N'W', CAST(0xA5D50A00 AS Date), N'smith@yahoo.com', N'123 Calinfornia St', N'', N'San Francisco', N'CA', N'94070', N'test note')
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (6, N'test', N'asf', N'M', N' ', CAST(0x5B950A00 AS Date), N'', N'', N'', N'', N'  ', N'', N'')
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (10, N'Smith', N'John', N'M', N'W', CAST(0xA5D50A00 AS Date), N'asfd@asfsad.com', N'123 Calinfornia', NULL, N'San F', N'CA', N'94809', N'test note')
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (13, N'test', N'test', N'M', N'W', CAST(0x76250B00 AS Date), N'sdaf@asdfsad.com', N'sadfs', NULL, N'asdf', N'CA', N'93432', NULL)
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (14, N'asfd', N'asdf', N'M', N'W', CAST(0xDC0B0B00 AS Date), N'asfsa@asdfsda.com', N'asdf', N'asdf', N'asdfa', N'CA', N'91999', N'test')
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (15, N'asfd', N'asdfas', N'M', N'W', CAST(0x00CD0A00 AS Date), N'sadf@asfsa.com', N'12 SAFsa', NULL, N'asdfsda', N'CA', N'92922', N'test')
INSERT [dbo].[names] ([id], [lname], [fname], [sex], [race], [dob], [email], [addr1], [addr2], [city], [state], [zip], [note]) VALUES (16, N'test', N'test', N'm', N'w', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
SET IDENTITY_INSERT [dbo].[names] OFF
/****** Object:  Table [dbo].[Foo]    Script Date: 03/22/2012 11:32:33 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Foo](
	[NUID] [varchar](10) NOT NULL,
	[Name] [varchar](50) NULL,
	[Notes] [text] NULL,
 CONSTRAINT [PK_Foo] PRIMARY KEY CLUSTERED 
(
	[NUID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[Foo] ([NUID], [Name], [Notes]) VALUES (N'n2342', N'work', N'yet?')
INSERT [dbo].[Foo] ([NUID], [Name], [Notes]) VALUES (N'ne434', N'tesat''s', N'<b>asfsaf asfasfasfs</b><h1><b><code>sadf</code></b></h1><div><b>asf</b><img src="http://" title="" alt=""><b>as</b></div><div><b>fdasfasdf</b></div>')
