<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <meta name="format-detection" content="date=no">
  <meta name="format-detection" content="telephone=no">
  <style type="text/CSS"></style>
  <style @import url('https://dopplerhealth.com/fonts/BasierCircle/basiercircle-regular-webfont.woff2');></style>
  <title></title>
  <!--[if mso]>
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
	</style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table,
    td,
    div,
    h1,
    p {
      font-family: 'Basier Circle', 'montserrat', 'Helvetica', 'Arial', sans-serif;
      font-size:12px;
    }

    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #FFEADA;
        text-decoration: none !important;
        font-weight: bold;
      }

      .button {
        min-height: 42px;
        line-height: 42px;
      }

      .col-lge {
        max-width: 100% !important;
      }
    }

    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }

      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>

<body style="margin: 0; padding: 0; word-spacing: normal; background-color: #ac73be7c; background-image: url('https://img.freepik.com/premium-photo/purple-gradient-wall-blank-studio-room-plain-studio-background_570543-7218.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
  <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; background-color: linear-gradient(to right, #792db8, #912d73);">
    

      <!-- Outer Table -->
      <table role="presentation" style="width: 100%; border: none; border-spacing: 0;">
        <tr>
          <td align="center" style="padding: 0;">
            <!--[if mso]>
            <table role="presentation" align="center" style="width: 600px;">
            <tr>
            <td>
            <![endif]-->

            <!-- Inner Table -->
            <table role="presentation" style="width: 94%; max-width: 600px; border: none; border-spacing: 0; text-align: left; font-family: 'Basier Circle', 'montserrat', 'Helvetica', 'Arial', sans-serif; font-size: 1em; line-height: 1.37em; color: #384049;">

              <!-- Logo Header -->
              <tr>
                <td style="padding: 40px 30px 30px 30px; text-align: center; font-size: 1.5em; font-weight: bold;">
                  <a href="https://mightyfinance.co.zm" style="text-decoration: none;">
                    <img alt="Mighty Finance Solutions" style="width: 90px; height: 60px; border: none; text-decoration: none; color: #750303;" src="https://mightyfinance.co.zm/public/web/images/01-ft-logo.png">
                  </a>
                </td>
              </tr>

              <!-- Intro Section -->
              <tr>
                <td style="padding: 30px; background-color: #ffffff;">
                  <h1 style="text-align: center; margin-top: 0; margin-bottom: 1.38em; font-size: 1.953em; line-height: 1.3; font-weight: bold; letter-spacing: -0.02em;">
                    @if (! empty($greeting))
                    {{ $greeting }}
                    @else
                    @if ($level === 'error')
                     @lang('Whoops!')
                    @else
                     @lang('New Notification')
                    @endif
                    @endif
                  </h1>

                  <p>
                    @foreach ($introLines as $line)
                      {{ $line }}
                    @endforeach
                  </p>

                
                </td>
              </tr>

              <!-- Social Media and Address Section -->
              <tr>
                <td style="padding: 30px; text-align: center; font-size: 0.75em; background-color: #ffeada; color: #384049; border: 1em solid #fff;">
                  <p style="margin: 0 0 0.75em 0; line-height: 0;">
                    <!-- LinkedIn logo -->
                    <a href="https://www.linkedin.com/company/mighty-finance-solution/?originalSubdomain=zm" style="display: inline-block; text-decoration: none; margin: 0 5px;">
                      <!-- Replace this with the actual LinkedIn logo SVG -->
                      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/LinkedIn_icon.svg/2048px-LinkedIn_icon.svg.png" width="30px" height="30px">
                    </a>
                    <!-- Facebook logo -->
                    <a href="https://web.facebook.com/mightyfinsol/?_rdc=1&_rdr" style="display: inline-block; text-decoration: none; margin: 0 5px;">
                      <!-- Replace this with the actual Facebook logo SVG -->
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-uaK5MQMEY1_ds2IHnWNvKen6q96rbt2rgQ&usqp=CAU width="30px" height="30px">
                    </a>
                    <!-- Instagram logo -->
                    <a href="https://www.instagram.com/mightyfinancesolution/?hl=en" style="display: inline-block; text-decoration: none; margin: 0 5px;">
                      <!-- Replace this with the actual Instagram logo SVG -->
                      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1024px-Instagram-Icon.png" width="30px" height="30px">
                    </a>
                  </p>

                  <p style="margin: 0; font-size: 0.75rem; line-height: 1.5em; text-align: center;">
                    MightyFinance, Stand B19 CBU, Jambo Drive, Riverside, Lusaka.
                    <br>
                    @isset($actionText)
                      @slot('subcopy')
                        @lang(
                          "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n" .
                          'into your web browser:',
                          [
                            'actionText' => $actionText,
                          ]
                        ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
                      @endslot
                    @endisset
                    <br>
                    <a class="unsub" href="#" style="color: #384049; text-decoration: underline;">Unsubscribe</a>
                  </p>
                </td>
              </tr>

            </table>
            <!-- End of Inner Table -->

            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->

          </td>
        </tr>
      </table>
      <!-- End of Outer Table -->
  </div>
</body>


</html>