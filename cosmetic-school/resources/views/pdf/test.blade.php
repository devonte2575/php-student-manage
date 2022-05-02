<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tagesdokumentation zum Coachingvertrag</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <style>
        @page {
            margin: 0px;
            font-family: GOTHIC;
        }

        html {
            margin: 0px
        }

        body {
            margin: 0px;
            font-family: GOTHIC;
        }

        h1,
        h4 {
            font-family: GOTHIC;
        }

        @font-face {
            font-family: 'GOTHIC';
            font-style: normal;
            font-weight: normal;
            src:
                url(https://app.nextlevel-akademie.de/cosmetic-school/vendor/dompdf/dompdf/lib/fonts/GOTHIC.TTF) format('truetype');
        }

        @font-face {
            font-family: 'GOTHICB';
            font-style: normal;
            font-weight: 700;
            src:
                url(https://app.nextlevel-akademie.de/cosmetic-school/vendor/dompdf/dompdf/lib/fonts/GOTHICB.TTF) format('truetype');
        }

        table thead tr th {
            font-family: 'GOTHICB';
        }

        b {
            font-family: 'GOTHICB';
        }

        table tbody tr td {
            font-family: 'GOTHIC';
        }

        header {
            position: fixed;
            top: 25px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        footer {
            position: fixed;
            bottom: 10px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        .page {
            page-break-after: always;
            overflow: hidden;
        }

        .last-page {
            page-break-after: never;
            overflow: hidden;
        }
    </style>
</head>

<body style="padding-left: 50px; padding-right: 50px; padding-bottom: 50px; padding-top: 50px">
    <header>
        <table width="520" style="padding-left: 50px; padding-right: 10px; font-size: 14px;">
            <tr>
                <td><img src="images/logo.png" width="250px" height="auto" /></td>
            </tr>
        </table>
    </header>
    <footer>
        <table width="520" style="padding-left: 150px; padding-right: 50px; font-size: 12px;">
            <tr>
                <td align="center" style="color: #9B9B9B;">
                    NextLevel Akademie – Inh. Gülhan Dündar - Bundesallee 86 - 12161 Berlin<br />
                    Tel. 030/89640064 - info@nextlevel-akademie.de - www.nextlevel-akademie.de
                </td>
            </tr>
        </table>
    </footer>
    <main>
        <div class="last-page">
            <h1 align="center" style="margin-top: 100px">abschlussbericht</h1>
            <div style="font-size: 16px">
                <div style="padding-bottom: 10px">
                    Datum: 2022/08/28
                </div>
                <div style="padding-bottom: 10px">
                    Teilnehmner/ Kunder: bzzard
                </div>
                <div>
                    Frau/Herr befand sich vam --- bis --- (Bewilligungszeitraum) in unserer Adkdkkdkfdkfe
                    dfekdifkd (922 12 20)
                </div>
            </div>
            <div style="margin-top: 30px; font-size: 18px; font: bold">
                <table style="width: 100%" class="table table-hover table-striped table-bordered">
                    <tr>
                        <td style="width: 40%">
                            Ziel der Maßnahme:<br><br>
                            Heranführen an den<br>ersten Arbeitsmarkt.
                        </td>
                        <td style="width: 60%">
                            {{ $measure }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            Konkretes Ergebnis/<br>
                            Erbrachte Leistungen:
                        </td>
                        <td style="width: 60%">
                            dfdfdfwddwdwdwd
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">
                            weiterführend<br>
                            Empfehlungen:
                        </td>
                        <td style="width: 60%">
                            dfdfdfwddwdwdwd
                        </td>
                    </tr>
                </table>

				@if(str_contains($durch_belast_options, 'durch_belast_options_gesund') ||
				str_contains($durch_belast_options, 'durch_belast_options_familie') || str_contains($durch_belast_options, 'durch_belast_options_partner') ||
				str_contains($durch_belast_options, 'durch_belast_options_kinder') || str_contains($durch_belast_options, 'durch_belast_options_financial') ||
				str_contains($durch_belast_options, 'durch_belast_options_recht') || str_contains($durch_belast_options, 'durch_belast_options_sprach') ||
				str_contains($durch_belast_options, 'durch_belast_options_pflege') || isset($durch_belast_options_other) )
				<table width="520" style="page-break-inside:avoid;border: 1pt solid black;margin-top: 40px; padding-left: 10px; padding-right: 10px; font-size: 14px;">
					<tr>
						<td style="padding-left:10px;padding-right:10px;">Zusätzliche Herausforderungen erschwerten bisher die berufliche Laufbahn/Perspective:</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
							<ul>
								@if(str_contains($durch_belast_options, 'durch_belast_options_gesund'))
								<li>gesundheitlich</li>

								@endif @if(str_contains($durch_belast_options, 'durch_belast_options_familie'))
								<li>familiäre</li>
								@endif @if(str_contains($durch_belast_options, 'durch_belast_options_partner'))
								<li>partnerschaftliche</li>
								@endif @if(str_contains($durch_belast_options, 'durch_belast_options_kinder'))
								<li>Kinderbetreuung</li>
								@endif @if(str_contains($durch_belast_options, 'durch_belast_options_financial'))
								<li>finanzielle</li>
								@endif @if(str_contains($durch_belast_options, 'durch_belast_options_recht'))
								<li>rechtliche</li>
								@endif @if(str_contains($durch_belast_options, 'durch_belast_options_sprach'))
								<li>sprachliche/kulturelle</li>
								@endif @if(str_contains($durch_belast_options, 'durch_belast_options_pflege'))
								<li>Pflege von Angehörigen</li>
								@endif @if(isset($durch_belast_options_other))
								<li>
									Sonstiges:
									<ul>
										<li><?php echo nl2br($durch_belast_options_other);?></li>
									</ul>
								</li>

								@endif
							</ul>
						</td>
					</tr>
				</table>
                @endif
            </div>
        </div>
    </main>
</body>