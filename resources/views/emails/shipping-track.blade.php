<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.3c.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=200, initial-scale= 1.0">
		<title>Customer Purchase</title>

		<link rel="stylesheet" href="{{ asset('production/app.css') }}">

		<style>
		body, #body-table, #body-cell {
			height:100% !important;
			margin:0;
			padding:0;
			width:100% !important;
		}
		table {
			border-collapse: collapse;
		}
		img, a img {
			border:0;
			outline:none;
			text-decoration;
		}
		h1, h2, h3, h4 ,h5, h6 {
			margin:0;
			padding:0;
		}

		/*///////// CLIENT SPECIFIC STYLES ////////*/
		.ReadMsgBody{ width:100%;}  /*Force Hotmail/Outlook.com to display emails at full width.*/
		.ExternalClass { width:100%;} /*Force Hotmail/Outlook.com to display emails at full width.*/

		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height:100%;} /*Force Hotmail/ Outlook.com to display line heights normally.*/
		table, td {
			mso-table-lspace: 0pt; /* Remove spacing between tables in Outlook 2007 and up */
			mso-table-rspace: 0pt; /* Remove spacing between tables in Outlook 2007 and up */
		}
		#outlook a { padding:0;} /* Force Outlook 2007 and up to provide a "view in browser" message */
		img { -ms-interpolation-mode: bicubic;} /* Force IE to smoothly render resized images */
		body, table, td, p, a, li, blockquote, {
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%; /* Prevent Windows and Webkit based mobile platforms from changing declared text sizes. */
			font-family: Helvetica, Arial, sans-serif;
		}

		/*////////// GENERAL STYLES //////////*/
		#body-cell {
			/*border: solid red thin;*/
		}
		#header {
			height:45px;
			/*background-color:gray;*/
			/*border:solid green thin;*/

			/*width:100;*/
			font-family: "Helvetica", Arial, sans-serif;
		}
		#header img {
			/*height:90%;*/
			margin-left:0;
			margin-top: 5px;
			font-family: "Helvetica", Arial, sans-serif;
		}
		#container {
			max-width:800px;
			/*width:90%;*/
			/*border:solid blue thin;*/
			/*background-color:orange;*/
			font-family: "Helvetica", Arial, sans-serif;

		}
		#main {
			max-width:950px;
			width:90%;
			/*height:600px;*/
			/*background-color: green;*/
			font-family: "Helvetica", Arial, sans-serif;
			padding-top:10px;
		}
		#order-info {
			width:100%;
			height:35px;
			/*background-color: red;*/
                        color:#E24A62;
			border-bottom: 1px solid black;
			font-family: "HelveticaNeue-Light", "Helvetica", Arial, sans-serif;
			padding:0 0 0 0px !important;
			
		}

		#track-info{
			width:100%;
			height:35px;
			color: #0000FF; 
			
			font-family: "HelveticaNeue-Light", "Helvetica", Arial, sans-serif;
			padding:0 0 0 0px !important;
		}
		
		#main-data-1 {
			/*background-color: yellow;*/
			width:30%;
			/*width:40px;
			height:40px;*/
			font-family: "HelveticaNeue-Light", "Helvetica", Arial, sans-serif;
			padding-top:20px;
			padding-bottom:20px;
			font-size:16px;
			font-weight: 200;
		}
		#main-data-2 {
			/*background-color:#C3C3C3;*/
			width:70%;
			font-family: "HelveticaNeue-Light", "Helvetica", Arial, sans-serif;
		}
		#totals {
			/*background-color:pink;*/
			font-family: "HelveticaNeue-Light", "Helvetica", Arial, sans-serif;
			font-size: 12px;
			color:#D1D1D1;
			border-top: 1px solid black;
			height:50px;
		}

		#total {
			border-top: 1px solid black;
			padding-top:10px;
			font-weight: bold;
		}
		#date {
			font-size:20px;
			font-weight: 200;
		}

		#status {
			/*display: inline;*/
			font-size:16px;
			font-weight: 200;
		}

		.product {
			/*background-color: green;*/
			padding-top:20px;
			padding-bottom: 0px;
			/*border-top: 1px solid black;*/
			border-bottom: 1px solid black;
		}

		.product-image {
			width:500px;
			height:auto;
			vertical-align: bottom;
			/*padding-left:-40px;*/
		}

		.product-after {
			padding-top:30px;
			padding-bottom: 0px;
			border-top: 1px solid black;
			border-bottom: 1px solid black;
			height:250px; overflow:hidden;
		}


		.image-container {
			width:100%;
			text-align: left;
		}

		.applelinksblack a {
			color:black !important;
			text-decoration: none !important;

		}

		.product-name {
			font-size: 20px;
			text-transform: uppercase;
		}


		.addons-table td {
			padding:4px 8px;
		}
		.addons-table td:last-child {
			padding-right:0px;
		}

		.main-product td {
			text-align:right;
		}
		.main-product:first-child td {
			padding-top:50px;
		}
		.product-name-row {
			border-bottom:solid black 1px;
		}
		.product-name-row td {
			text-align:right;
		}

		.product-data-cell {
			vertical-align:top;
		}
		.first-opt-set td{
			padding-top:35px;
		}

		.bold {

			font-weight:bold;

		}

		.product-quantity {
			font-weight:bold;
		}
		.product-final-price {
			font-weight:bold;
		}
		.multiple {
			display:block;
			background-color:#E24A62;
			width:18px;
			height:18px;
			text-align:center;
			border-radius:50%;
			box-sizing:border-box;
			padding-top:2px;
			color:white;
		}

        .product-image {
              width:300px

         }

		</style>
	</head>	
	<body style="margin: 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-family: Helvetica, Arial, sans-serif;height: 100%;width: 100%;">
		<center>

			<table id="body-table" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-family: Helvetica, Arial, sans-serif;margin: 0;padding: 0;height: 100%;width: 100%;">
				<tr>
					<td id="body-cell" align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-family: Helvetica, Arial, sans-serif;margin: 0;padding: 0;height: 100%;width: 100%;padding-bottom:50px">
						<table id="container" border="0" cellpadding="0" cellspacing="0" width="1000px" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-family: 'Helvetica', Arial, sans-serif;max-width: 800px;">
						<thead>
							<tr>
								<th id="track-info"
									colspan="2"
									padding="0"
									align="left"
									style="width: 100%;
									height: 35px;
									font-family: 'Helvetica', Arial, sans-serif;
									padding: 0 0 0 0px;">
														<span id="status" style="font-size: 16px;font-weight: 200;">Tracking # :
															<a href="https://tools.usps.com/go/TrackConfirmAction_input?qtc_tLabels1={{ $request['track_id'] }}">
																{{ $request['track_id'] }}</a>
														</span>
								</th>
							</tr>
							</thead>
						</table>
					</td>
				</tr>
			</table>

			@include('emails.order-email-common')

		</center>
	</body>
</html>

