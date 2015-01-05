<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BiteTogether</title>
			<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/css/bootstrap.min.css">
			<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" >
				<style type="text/css">
					body
					{
						padding: 30px;
						background-color: #696969;
					}

					.smGlobalBtn
					{ /* global button class */
						display: inline-block;
						position: relative;
						cursor: pointer;
						width: 50px;
						height: 50px;
						box-shadow: 0 2px 2px #999;
						padding: 0px;
						text-decoration: none;
							text-align: center;
						color: #fff;
						font-size: 25px;
						font-weight: normal;
						line-height: 2em;
						border-radius: 25px;
						-moz-border-radius:25px;
						-webkit-border-radius:25px;
					}

					.linkedinBtn
					{
				    	background: #0094BC;
					}

					.linkedinBtn:before
					{
				    	font-family: "FontAwesome";
				      	content: "\f0e1"; /* LinkedIn icon */
					}

					.linkedinBtn:hover
					{
				    	color: #0094BC;
				    	background: #fff;
					}

				</style>

	</head>
	<body>
		@yield('content')
	</body>
</html>