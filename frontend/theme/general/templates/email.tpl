<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{$subject}</title>
    <style type="text/css">
    {literal}
        #outlook a {padding:0;}
        body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; font-family: Helvetica, Arial, sans-serif; font-size: 14px;}
        .ExternalClass {width:100%;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
        #backgroundTable {padding:0; width:100% !important; line-height: 100% !important; background: #EFEFEF; border: 1px solid #CCCCCD; margin: 40px 0; }
        img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
        a img {border:none;}
        .image_fix {display:block;}
        p {margin: 1em 0;}
        h1, h2, h3, h4, h5, h6 {color: black !important; line-height: 1.6em;}

        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

        h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
            color: red !important;
        }

        h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
            color: purple !important;
        }
        table td {border-collapse: collapse; padding: 5px;}
        table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; padding-bottom: 20px; }
        a {color: blue;}

        @media only screen and (max-device-width: 480px) {
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: blue; /* or whatever your want */
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important;
                pointer-events: auto;
                cursor: default;
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: blue;
                pointer-events: none;
                cursor: default;
            }

            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: orange !important;
                pointer-events: auto;
                cursor: default;
            }
        }
    {/literal}
    </style>
</head>
<body>
    <table cellpadding="0" cellspacing="5" border="0" id="backgroundTable">
        <tr>
            <td valign="top">
                <table cellpadding="0" cellspacing="5" border="0" align="center">
                    <tr>
                        <td width="900" valign="top" colspan="2">
                            <h1>{$subject}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td width="450" valign="top">
                            <table cellspacing="0" cellspacing="5" border="0" align="center">
                                <tr>
                                    <td width="225" valign="top"><strong>Naam</strong></td>
                                    <td width="225" valign="top">{$name}</td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Email</strong></td>
                                    <td width="225" valign="top"><a href="mailto:{$email}" target ="_blank" title="{$email}" style="color: orange; text-decoration: none;">{$email}</a></td>
                                </tr>
                                <tr>
                                    <td width="450" valign="top" colspan="2">
                                        <strong>Bericht</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="450" valign="top" colspan="2">
                                        {$message}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="450" valign="top" colspan="2">
                                        {assign var=dimension value=CatalogController::resizeToWidth(450, $picture)}
                                        <img src="{$picture}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="450" valign="top">
                            <table cellspacing="0" cellspacing="5" border="0" align="center">
                                <tr>
                                    <td width="450" valign="top" colspan="2">
                                        <strong>Het bericht gaat over de volgende auto</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Autonummer</strong></td>
                                    <td width="225" valign="top">{$id}</td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Titel</strong></td>
                                    <td width="225" valign="top">{$title}</td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Merk</strong></td>
                                    <td width="225" valign="top">{$brand}</td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Type</strong></td>
                                    <td width="225" valign="top">{$type}</td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Bouwjaar</strong></td>
                                    <td width="225" valign="top">{$year}</td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Engine</strong></td>
                                    <td width="225" valign="top">{$engine}</td>
                                </tr>
                                <tr>
                                    <td width="225" valign="top"><strong>Location</strong></td>
                                    <td width="225" valign="top">{$location}</td>
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