<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $nztmailerSubject }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!-- Facebook sharing information tag -->
    <meta property="og:title" content="{{ $nztmailerSubject }}" />
    <style type="text/css">
        /* Client-specific ----------------------------------------------*/
        body, table, td, a {
            -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt; mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
        /* Reset --------------------------------------------------------*/
        body {
            margin:0; padding:0;
        }
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        table {
            border-collapse: collapse !important;
        }
        body {
            height:100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        /* Main ---------------------------------------------------------*/

        .h1 {
            font-family: -apple-system, BlinkMacSystemFont, "Roboto", "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 34px;
            line-height: 34px;
            font-weight: bold;
            color: #393939;
        }

        .body {
            font-family: -apple-system, BlinkMacSystemFont, "Roboto", "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 15px;
            line-height: 19px; /* Start with font-size + 4px for body text, less for headings */
            font-weight: normal;
            color: #505050;
        }

        .main-padding {
            padding: 20px 20px 0px 20px;
        }

        .sep-padding {
            padding: 20px 0px 0px 0px;
        }

        .button-padding {
            padding: 25px 0px 5px 0px;
        }

        .button-text {
            font-size: 16px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-weight: normal;
            color: #ffffff;
            text-decoration: none;
            background-color: #333333;
            border-top: 15px solid #333333;
            border-bottom: 15px solid #333333;
            border-left: 25px solid #333333;
            border-right: 25px solid #333333;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            display: inline-block;
        }

        /* Footer -------------------------------------------------------*/

        .footer {
            font-size: 12px;
            line-height: 18px;
            font-family: -apple-system, BlinkMacSystemFont, "Roboto", "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            color:#666666;
            padding: 10px 0px 0px 0px;
        }

        .apple-footer a {
            color:#666666; text-decoration: none;
        }

        /* Responsive ---------------------------------------------------*/
        @media screen and (max-width: 599px) {

            table.fluid {
                width: 100% !important;
            }
            img.responsive {
                max-width: 100% !important;
                height: auto !important;
            }
            td.body {
                font-size: 17px !important;
                line-height: 24px !important;
            }
        }
    </style>
</head>
<body>

<!-- Top margin =============================================================== -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#F5F7FA" style="padding: 10px 10px 10px 10px;"></td>
    </tr>
</table>


<!-- Logo ===================================================================== -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#F5F7FA" align="center">
            <!-- Container table -->
            <table class="fluid" border="0" cellpadding="0" cellspacing="0" width="600">
                <tr>
                    <td bgcolor="#FFFFFF">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="body" align="center" style="padding: 15px 0px 15px 0px;">
                                    <img src="http://placehold.it/200x100" alt="My Logo" width="200" height="100" border="0" class="block responsive" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@yield('main')

<!-- Signoff ================================================================== -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#F5F7FA" align="center">
            <table class="fluid" border="0" cellpadding="0" cellspacing="0" width="600">
                <tr>
                    <td bgcolor="#FFFFFF">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="body main-padding">
                                    <a href="#">My Organisation</a>
                                </td>
                            </tr>
                            <tr><td class="main-padding"><br></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<!-- Footer component ================================================= -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#F5F7FA" align="center">
            <table class="fluid" border="0" cellpadding="0" cellspacing="0" width="600">
                <tr>
                    <td bgcolor="#333333" style="padding: 35px 10px 35px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" valign="middle" class="footer">
                                    If you no longer wish to receive these messages, please <a href="#" style="color: #999999; text-decoration: underline;">unsubscribe from our list</a>.
                                    <br>
                                    <span class="apple-footer" style="color:#666666;">My Org, 123 Street St, Auckland 1021</span>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="middle" class="footer" >
                                    <a href="#" style="color: #999999; text-decoration: underline;">View this email in your browser</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
