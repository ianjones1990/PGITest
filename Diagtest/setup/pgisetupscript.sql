
USE [PGIDiagnosticToolDb]
GO
/****** Object:  User [pgidiagnosticuser]    Script Date: 08/23/2013 14:36:53 ******/
CREATE USER [pgidiagnosticuser] FOR LOGIN [test] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  Table [dbo].[operating_systems]    Script Date: 08/23/2013 14:36:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[operating_systems](
	[userAgentValues] [nvarchar](110) NULL,
	[operatingSystems] [nvarchar](50) NULL
) ON [PRIMARY]
GO
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows NT 6.1', N'Windows 7')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows NT 5.1|Windows XP', N'Windows XP')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows NT 6.2', N'Windows 8')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Mac_PowerPC|Macintosh|Mac OS X', N'Mac OS')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows 95|Win95|Windows_95', N'Windows 95')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows NT 5.2', N'Windows Server 2003')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows NT 6.0', N'Windows Vista')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Win16', N'Windows 3.11')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows NT 4.0|WinNT4.0|WinNT', N'Windows NT 4.0')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows ME', N'Windows ME')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'OpenBSD', N'Open BSD')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'SunOS', N'Sun OS')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Linux|X11', N'Linux')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows NT 5.0|Windows 2000', N'Windows 2000')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)', N'Search Bot')
INSERT [dbo].[operating_systems] ([userAgentValues], [operatingSystems]) VALUES (N'Windows 98|Win98', N'Windows 98')
/****** Object:  Table [dbo].[diagnosticresults]    Script Date: 08/23/2013 14:36:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[diagnosticresults](
	[operating_system] [nvarchar](200) NOT NULL,
	[browser] [nvarchar](200) NOT NULL,
	[pop_ups_enabled] [nvarchar](80) NOT NULL,
	[flash_version] [nvarchar](300) NULL,
	[dlbandwidth_kbits] [int] NOT NULL,
	[ulbandwidth_kbits] [int] NOT NULL,
	[cookies_enabled] [nvarchar](100) NOT NULL,
	[dotnet_version] [nvarchar](100) NULL
) ON [PRIMARY]

/****** Object:  Table [dbo].[compatible_os]    Script Date: 08/23/2013 14:36:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[compatible_os](
	[operatingSystem] [nvarchar](50) NULL
) ON [PRIMARY]
GO
INSERT [dbo].[compatible_os] ([operatingSystem]) VALUES (N'Windows 7')
INSERT [dbo].[compatible_os] ([operatingSystem]) VALUES (N'Windows XP')
INSERT [dbo].[compatible_os] ([operatingSystem]) VALUES (N'Windows 8')
/****** Object:  Table [dbo].[compatible_dotnet_versions]    Script Date: 08/23/2013 14:36:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[compatible_dotnet_versions](
	[compatibleVersions] [nvarchar](50) NULL
) ON [PRIMARY]
GO
INSERT [dbo].[compatible_dotnet_versions] ([compatibleVersions]) VALUES (N'.NET CLR 3.5')
/****** Object:  Table [dbo].[bandwidth_threshold_files]    Script Date: 08/23/2013 14:36:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[bandwidth_threshold_files](
	[speedThreshold] [int] NULL,
	[fileToDownload] [nvarchar](100) NULL,
	[fileSize] [int] NULL
) ON [PRIMARY]
GO
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (512, N'2.png', 659456)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (768, N'3.png', 982016)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (1024, N'4.png', 1311744)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (1536, N'5.png', 1988608)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (2048, N'6.png', 2633728)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (2560, N'7.png', 3278848)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (3072, N'8.png', 3939328)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (4096, N'9.png', 5260288)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (5120, N'10.png', 6565888)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (256, N'1.png', 334848)
INSERT [dbo].[bandwidth_threshold_files] ([speedThreshold], [fileToDownload], [fileSize]) VALUES (6144, N'11.png', 7833600)
/****** Object:  Table [dbo].[bandwidth_speed]    Script Date: 08/23/2013 14:36:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[bandwidth_speed](
	[speedThresholdName] [nvarchar](50) NULL,
	[speedThresholds] [int] NULL,
	[sampleScenario] [nvarchar](100) NULL
) ON [PRIMARY]
GO
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Powerpoint (Low)', 88, N'Slides with text and graphics changed every minute')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Powerpoint (High)', 704, N'Extremel hi-resolution, graphic-intensive slides changed every 20 seconds')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Webcam (Low)', 256, N'Low quality setting, normalised motion')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Webcam (High)', 1024, N'High quality setting, constant dramatic motion')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Screen Sharing (Low)', 760, N'Sharing of various productivity applications')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Screen Sharing (High)', 1720, N'Complete changes of screen conten multiple times per second')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Softphone', 352, N'Host or guests connect to audio portion of meeting via computer')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Streaming (320 x 140)', 750, N'Host plays a 320 x 140 video in the meeting')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Streaming (640 x 360)', 1024, N'Host plays a 640 x 360 video in the meeting')
INSERT [dbo].[bandwidth_speed] ([speedThresholdName], [speedThresholds], [sampleScenario]) VALUES (N'Streaming (1280 x 720)', 3072, N'Host plays a 1280 x 720 video in the meeting')
