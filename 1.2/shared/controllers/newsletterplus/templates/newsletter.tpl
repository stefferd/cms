<!DOCTYPE html>
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
        #backgroundTable {padding:0; width:100% !important; line-height: 100% !important; margin: 40px 0; }
        img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
        a img {border:none;}
        .image_fix {display:block;}
        p {margin: 1em 0;}
        h1, h2, h3, h4, h5, h6 {color: #CBCA8A!important; text-align: left!important; line-height: 1.6em;}

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
<body bgcolor="#000000">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="width: 560px; background: #000000; border: 4px solid #CBCA8A; margin: 0 auto; text-align: center;">
        <tr>
            <td align="center" width="550" style="color: #CBCA8A;">
                If the email isn't readable, check out the <a href="http://www.classics-world.com/newsletter-plus/view/{$newsletterid}/" style="color: #CBCA8A;">webversion</a>
            </td>
        </tr>
        <tr>
            <td align="center" width="550" style="color: #CBCA8A; width: 550px;">
                <img src="http://www.mmcms.net/cw/theme/default/images/header-newsletter.jpg" border="0" width="550" height="350" />
            </td>
        </tr>
        <tr>
            <td align="center">
                <table width="550" cellspacing="0" cellpadding="0" border="0" style="width: 550px;">
                    <tr>
                        <td>
                            <table width="550" cellspacing="0" cellpadding="0" border="0" style="width: 550px;">
                                <tr>
                                    <td align="left" width="550" style="width: 550px; text-align: left;">
                                        <font style="color: #CBCA8A; font-size: 24px; font-weight: bold; text-align: left; margin: 0; padding: 0;">{$title}</font>
                                    </td>
                                </tr>
                            </table>
                            <table width="550" cellspacing="0" cellpadding="0" border="0" style="width: 550px;">
                                <tr>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A;">
                                            Inventory number
                                        </font>
                                    </td>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A; font-weight: bold;">
                                            {$id}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A;">
                                            Brand
                                        </font>
                                    </td>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A; font-weight: bold;">
                                            {$car->getBrand()}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A;">
                                            Type
                                        </font>
                                    </td>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A; font-weight: bold;">
                                            {$car->getType()}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A;">
                                            Year
                                        </font>
                                    </td>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A; font-weight: bold;">
                                            {$car->getYear()}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A;">
                                            Location
                                        </font>
                                    </td>
                                    <td width="275" style="width: 275px;">
                                        <font style="color: #CBCA8A; font-weight: bold;">
                                            {$car->getLocation()}
                                        </font>
                                    </td>
                                </tr>
                            </table>
                            <table width="550" cellspacing="0" cellpadding="0" border="0" style="width: 550px; margin-top: 10px;">
                                <tr>
                                    <td width="550" style="width: 550px;">
                                        <div style="color: #CBCA8A; font-weight: bold; font-size: 1.8em; line-height: 2.4em; margin-left: 275px;">
                                            &euro; {$car->getPrice()}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="550" style="width: 550px;">
                                        <font style="color: #CBCA8A; font-weight: bold;">
                                            Description
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="550" style="width: 550px;">
                                        <font style="color: #CBCA8A;">
                                            {$car->getText()}
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="550" style="width: 550px;">
                                        <font style="color: #CBCA8A; font-weight: bold;">
                                            <a href="http://www.classics-world.com/inventory/details/{$car->getId()}/" title="More details" style="color: #CBCA8A;">More details</a>
                                        </font>
                                    </td>
                                </tr>
                            </table>
                            <table width="550" cellspacing="0" cellpadding="0" border="0" style="width: 550px;">
                            {foreach from=$pictures item=picture key=count}
                                {if ! $picture|strstr:"cache"}
                                    <tr>
                                        <td width="550" style="width: 550px;">
                                            <font style="color: #FFFFFF; font-weight: bold;">
                                                {assign var=dimension value=CatalogController::resizeToWidth(550, $picture)}
                                                <a href="http://www.classics-world.com/inventory/details/{$car->getId()}/" title="More details" style="color: #CBCA8A;">
                                                    <img src="{$picture}" width="{$dimension.width}" height="{$dimension.height}" style="height: {$dimension.height}px; width: {$dimension.width}px;" />
                                                </a>
                                            </font>
                                        </td>
                                    </tr>
                                {/if}
                            {/foreach}
                            </table>
                            <table width="550" cellspacing="0" cellpadding="0" border="0" style="width: 550px; border-top: 1px solid #CBCA8A;">
                                <tr>
                                    <td align="center" width="550" style="width: 550px;">
                                        <p><font style="color: #CBCA8A; font-size: 11px;">&copy; {$smarty.now|date_format:"%Y"} Classics-world.com | <a href="http://www.classics-world.com" title="classics-world.com" style="color: #CBCA8A">www.classics-world.com</a> | <a href="mailto:info@classics-world.com" title="info@classics-world.com" style="color: #CBCA8A">info@classics-world.com</a><br />Click to <a href="http://www.classics-world.com/newsletter-plus/unsubscribe/" title="Unsubscribe" style="color: #CBCA8A">unsubscribe</a> to this newsletter</font></p>
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