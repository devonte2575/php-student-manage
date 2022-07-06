<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Coaching-Endbericht</title>
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
            h1, h4 {
				font-family: GOTHIC;
			}
            table {
				border-collapse: collapse;
			}           
            @font-face {
				font-family: 'GOTHIC';
				font-style: normal;
				font-weight: normal;
				src:
					url(https://app.nextlevel-akademie.de/cosmetic-school/vendor/dompdf/dompdf/lib/fonts/GOTHIC.TTF)
					format('truetype');
			}
            @font-face {
				font-family: 'GOTHICB';
				font-style: normal;
				font-weight: 700;
				src:
					url(https://app.nextlevel-akademie.de/cosmetic-school/vendor/dompdf/dompdf/lib/fonts/GOTHICB.TTF)
					format('truetype');
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

			table#set_table {
				border: 1px solid black;
				border-collapse: collapse;
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
        <table width="520" style="padding-left: 50px; padding-right: 10px; font-size: 14px; margin-bottom: 250px">
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
				<table width="520" style="margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 14px;">
					<tr>
						<td align="center" style="font-size: 32px;"><b>Abschlussbericht</b></td>
					</tr>
				</table>
				<table width="520" style="margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 18px;">
			
					<tr><td style="padding-left:10px;">
						<b>@lang('forms.date')</b>
						: {{date("d-m-Y")}}
					</td></tr>			
					<tr><td style="padding-left:10px;">
						<b>Teilnehmner/ Kunde: </b>{{$coachee_name}}
					</td></tr>					
					<tr><td style="padding-left:10px;">
						Frau/Herr {{$coachee_name}} befand sich vom {{date_format(new DateTime($appt_min_date), 'd.m.Y')}} bis {{date_format(new DateTime($appt_max_date), 'd.m.Y')}} (Bewilligungszeitraum: {{date_format(new DateTime($contract_begin_date), 'd.m.Y')}} bis {{date_format(new DateTime($contract_end_date), 'd.m.Y')}}) in unserer Aktivierungs-und Vermittlungsmaßnahme: {{$product_title}} ({{$product_auth_no}})
					</td></tr>					
				</table>

                <table id="set_table" width="520" style="page-break-inside:avoid; margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 14px;" class="table table-striped table-bordered">
                    <tr>
                        <td style="width: 30%">
                            Ziel der Maßnahme:<br><br>
                            Heranführen an den<br>ersten Arbeitsmarkt.
                        </td>
                        <td style="width: 70%">
							<span style=" font-weight: bold">Ziel aus dem AVGS:</span><br>{{$ziele_avgs}}<br><br>
                            <span style=" font-weight: bold">Ziel des Kunden:</span><br>{{$ziele_coachee}}<br>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%">
                            Konkretes Ergebnis/<br>
                            Erbrachte Leistungen:
                        </td>
                        <td style="width: 70%">    
							<div style="font: bold">Vermittlung? Wenn ja, wohin, wann beginn? Beschäftigungsverhältnis in Aussicht. wo, zu wann?</div>
                            @if ($vermitting == 1)                      
                                <div><span style=" font-weight: bold">Wann beginn:</span>{{$vermit_begin}}</div>
                                <div>
									<span style="font-weight: bold">Wohin:</span><br/>
									<span><?php echo $vermit_content ?></span>
								</div>                                                     
                            @else 
                                <div style="font: bold">Noch keine konkrete Vermittlung</div>   
                            @endif                          
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%">
                            weiterführend<br>
                            Empfehlungen:
                        </td>
                        <td style="width: 70%">
                            <div>1. Werden weitere Coachingstunden benötigt, wenn ja, zu welchem Thema?</div>
                            <div style="padding-left: 20px; margin-top: 5px ;font-size: 16px; font-weight:300;">{{$recommendations_1}}</div>
                            <div style="margin-top: 10px">2. Was wird dem Coachee empfohlen?</div>
                            <div style="padding-left: 20px; margin-top: 5px ; font-size: 16px; font-weight:100;">{{$recommendations_2}}</div>
                        </td>
                    </tr>
                </table>  

				<table width="520" style="page-break-inside:avoid;border: 1pt solid black; margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 14px;">
					<tr>
						<td style="padding-left:10px;padding-right:10px; font-size: 16px;">
							<b>Zusätzliche Herausforderungen erschwerten bisher die berufliche Laufbahn/Perspective:</b>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px; font-size: 16px;">
							<b>Zum Ankreuzen:</b>
						</td>
					</tr>
					@if($durch_belast_exists != 0)
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_gesund" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_gesund')) checked @endif value="durch_belast_options_gesund"> gesundheitlich</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_familie" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_familie')) checked @endif value="durch_belast_options_familie"> familiäre</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_partner" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_partner')) checked @endif value="durch_belast_options_partner"> partnerschaftliche</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_kinder" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_kinder')) checked @endif value="durch_belast_options_kinder"> Kinderbetreuung</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_financial" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_financial')) checked @endif value="durch_belast_options_financial"> finanzielle</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_recht" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_recht')) checked @endif value="durch_belast_options_recht"> rechtliche</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_sprach" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_sprach')) checked @endif value="durch_belast_options_sprach"> sprachliche/kulturelle</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox">
                            <label><input name="durch_belast_options_gesund" type="checkbox" @if(str_contains($durch_belast_options, 'durch_belast_options_pflege')) checked @endif value="durch_belast_options_pflege"> Pflege von Angehörigen</label>
                            </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                            <div class="checkbox" style="width: 100%">
                            <label><input name="durch_belast_options_gesund" type="checkbox" @if(isset($durch_belast_options_other)) checked @endif value="durch_belast_options_pflege"> Sonstiges:</label>
                                <span style="width: 100%; text-decoration: underline"></span>
                            </div> 
						</td>
					</tr>
					@else
                    <tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                        <label><input name="durch_belast_options_gesund" type="checkbox" value="durch_belast_options_gesund"> gesundheitlich</label>
                        </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="durch_belast_options_familie" type="checkbox" value="durch_belast_options_familie"> familiäre</label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="durch_belast_options_partner" type="checkbox" value="durch_belast_options_partner"> partnerschaftliche</label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="durch_belast_options_kinder" type="checkbox" value="durch_belast_options_kinder"> Kinderbetreuung</label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="durch_belast_options_financial" type="checkbox" value="durch_belast_options_financial"> finanzielle</label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="durch_belast_options_recht" type="checkbox" value="durch_belast_options_recht"> rechtliche</label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="durch_belast_options_sprach" type="checkbox" value="durch_belast_options_sprach"> sprachliche/kulturelle</label>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="durch_belast_options_pflege" type="checkbox" value="durch_belast_options_pflege"> Pflege von Angehörigen</label>
                    </div>
						</td>
					</tr>									
					@endif
				</table>	
                		
                <table width="520" style="page-break-inside:avoid;border: 1pt solid black; margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 14px;">
					<tr>
						<td style="padding-left:10px;padding-right:10px; font-size: 16px;">
							<b>Berufliche Kompetenzen / neu entdeckte Potentiale / neu entdeckte berufliche Perspektiven:</b>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px; font-size: 16px;">
							<b><u>Resourceanalyse / neue berufliche Potentiale:</u></b>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <span>Stärken: </span>
                            @if(isset($selbst_fremd_strengths)){{$selbst_fremd_strengths}}@endif
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <span for="selbst_fremd_strengths">Schwächen: </span>
                            @if(isset($selbst_fremd_weakness)){{$selbst_fremd_weakness}}@endif
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <span for="selbst_fremd_strengths">Neu entdeckte Potentiale: </span>
                            @if(isset($selbst_fremd_potential)){{$selbst_fremd_potential}}@endif
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <span for="selbst_fremd_strengths">Energiekiller: </span>
                            @if(isset($selbst_fremd_energykiller)){{$selbst_fremd_energykiller}}@endif
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <span for="selbst_fremd_strengths">Energiegeber: </span>
                            @if(isset($selbst_fremd_energygiver)){{$selbst_fremd_energygiver}}@endif
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <span for="selbst_fremd_strengths">Neue berufliche Zielstellung & Weg-Ziel Planung: </span>
                            @if(isset($selbst_fremd_ziel_planung)){{$selbst_fremd_ziel_planung}}@endif
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <span for="selbst_fremd_strengths">Neue entdekte berufliche Perspektiven: </span>
                            @if(isset($selbst_fremd_beruf_persp)){{$selbst_fremd_beruf_persp}}@endif
						</td>
					</tr>					
                </table>

                <table width="520" style="page-break-inside:avoid;border: 1pt solid black; margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 14px;">
					<tr>
						<td style="padding-left:10px;padding-right:10px; font-size: 16px;">
							<b>Folgende arbeitmarktnahe Job-Perspektiven wurden erarbeitet:</b>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="col-12 col-md-12">
                            <label for="plan_a">Plan A</label>
                            <textarea rows=4 cols=10  class="form-control"  name="plan_a">@if(isset($weg_ziel_planung_plan_a)){{$weg_ziel_planung_plan_a}}@endif</textarea>
                        </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="col-12 col-md-12">
                            <label for="plan_b">Plan B</label>
                            <textarea rows=4 cols=5  class="form-control"  name="plan_b">@if(isset($weg_ziel_planung_plan_b)){{$weg_ziel_planung_plan_b}}@endif</textarea>
                        </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="col-12 col-md-12">
                            <label for="plan_c">Plan C</label>
                            <textarea rows=4 cols=5  class="form-control"  name="plan_c">@if(isset($weg_ziel_planung_plan_c)){{$weg_ziel_planung_plan_c}}@endif</textarea>
                        </div>
						</td>
					</tr>
                    @if(isset($weg_ziel_planung_plan_d)||isset($weg_ziel_planning_plan_e))
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="col-12 col-md-12">
                            <label for="plan_b">Plan D</label>
                            <textarea rows=4 cols=5  class="form-control"  name="plan_d">@if(isset($weg_ziel_planung_plan_d)){{$weg_ziel_planung_plan_d}}@endif</textarea>
                        </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="col-12 col-md-12">
                            <label for="plan_c">Plan E</label>
                            <textarea rows=4 cols=5  class="form-control"  name="plan_e">@if(isset($weg_ziel_planung_plan_e)){{$weg_ziel_planung_plan_e}}@endif</textarea>
                        </div>
						</td>
					</tr>
                    @endif									
                </table>

                <table width="520" style="page-break-inside:avoid;border: 1pt solid black; margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 14px;">
					<tr>
						<td style="padding-left:10px;padding-right:10px; font-size: 16px;">
							<b>Folgende Plattformen wurden genutzt (ankreuzen):</b>
						</td>
					</tr>
                    @if(isset($prof_bewerbung_platforms_used))
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="jobborse_fur_stellensuche" type="checkbox" @if(
                        str_contains($prof_bewerbung_platforms_used,  'jobborse_fur_stellensuche')) checked @endif value="jobborse_fur_stellensuche"> Jobbörse für Stellensuche </label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="kursnet_fur_weiterbildungen_und_umschulungen" type="checkbox" @if(
                        str_contains($prof_bewerbung_platforms_used,  'kursnet_fur_weiterbildungen_und_umschulungen')) checked @endif value="kursnet_fur_weiterbildungen_und_umschulungen"> Kursnet für Weiterbildungen und Umschulungen </label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                    <label><input name="berufsnet_fur_ausfuhrliche_berufsinformationen" type="checkbox" @if(
                        str_contains($prof_bewerbung_platforms_used,  'berufsnet_fur_ausfuhrliche_berufsinformationen')) checked @endif value="berufsnet_fur_ausfuhrliche_berufsinformationen"> Berufenet für ausführliche Berufsinformationen </label>
                    </div>
						</td>
					</tr>
                   @else
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                        <label><input name="jobborse_fur_stellensuche" type="checkbox"> Jobbörse für Stellensuche </label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                        <label><input name="kursnet_fur_weiterbildungen_und_umschulungen" type="checkbox"> Kursnet für Weiterbildungen und Umschulungen </label>
                    </div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
                        <div class="checkbox">
                        <label><input name="berufsnet_fur_ausfuhrliche_berufsinformationen" type="checkbox"> Berufenet für ausführliche Berufsinformationen </label>
                    </div>
						</td>
					</tr>
                    @endif									
                </table>
                <table width="520" style="page-break-inside:avoid;border: 1pt solid black; margin-top: 60px; padding-left: 10px; padding-right: 10px; font-size: 14px;">
					<tr>
						<td style="padding-left:10px;padding-right:10px; font-size: 16px;">
							<b>Professionelle Bewerbunasmappe:</b>
						</td>
					</tr>           
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
							<div class="checkbox">
								<label><input name="professionelles_anschreiben_erarbeitet" type="checkbox" @if(isset($prof_bewerbung_mappe) && 
									str_contains($prof_bewerbung_mappe, 'professionelles_anschreiben_erarbeitet')) checked @endif value="professionelles_anschreiben_erarbeitet"> Professionelles Anschreiben erarbeitet 
								</label>
							</div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
							<div class="checkbox">
								<label><input name="professionellen_lebenslauf_erarbeitet" type="checkbox" @if( isset($prof_bewerbung_mappe) && 
									str_contains($prof_bewerbung_mappe, 'professionellen_lebenslauf_erarbeitet')) checked @endif value="professionellen_lebenslauf_erarbeitet"> Professionellen Lebenslauf erarbeitet </label>
							</div>
						</td>
					</tr>
					<tr>
						<td style="padding-left:10px;padding-right:10px;">
							<div class="checkbox">
								<label><input name="zertifikate_wurden_fur_die_mappe_zusammengestellt" type="checkbox" @if( isset($prof_bewerbung_mappe) && 
									str_contains($prof_bewerbung_mappe, 'zertifikate_wurden_fur_die_mappe_zusammengestellt')) checked @endif value="zertifikate_wurden_fur_die_mappe_zusammengestellt"> Zertifikate Wurden für die Mappe Zusammengestellt </label>
							</div>
						</td>
					</tr>             								
                </table>

                <table width="520" style="page-break-inside:avoid;border: 1pt solid black; margin-top: 60px; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; font-size: 14px;">
					<tr>
						<td align="left" style="width:40%; padding-left:10px; font-size: 17px;">
                            <b>@lang('forms.coaching_verhalten')</b>
                        </td>
                        <td align="left" style="width:30%; padding-top:10px">
                        </td>
                        <td align="left" style="width:30%; padding-top:10px">
                        </td>
                    </tr>
                        
					<tr style="border-bottom: 1pt solid black">
                        <td align="left" style="width:40%; padding-left:10px">
                            <b>@lang('forms.vorbildlich')</b>
                        </td>
                        <td align="left" style="width:30%; padding-top:10px">
                        <?php
                            $vorbildlich = isset($coaching_verhalten_vorbildlich) ? $coaching_verhalten_vorbildlich :'';
                            for ($i = 1; $i <= $vorbildlich; $i++) {
                                ?>
                                <img src="images/star.png" />
                                <?php
                            }
							?>
						</td>
						<td align="left" style="width: 30%">
						<?php
							$rating = $vorbildlich;
                            if($rating == 1)
                                echo '&nbsp;stark unterdurchschnittlich';
                            else if ($rating == 2)
                                echo '&nbsp;knapp unterdurchschnittlich';
                            else if ($rating == 3)
                                echo '&nbsp;den Anforderungen entsprechend';
                            else if ($rating == 4)
                                echo '&nbsp;überdurchschnittlich';
                            else if ($rating == 5)
                                echo '&nbsp;ausgezeichnet';
                        ?>
                    	</td>
                    </tr>
                    <tr style="border: 1pt solid black">
                        <td align="left" style="width:40%; padding-left:10px">
							<b>@lang('forms.sucht_loesungen')</b>
                        </td>
                        <td align="left" style="width:30%; padding-top:10px">
                        <?php
                            $sucht_loesungen = isset($coaching_verhalten_sucht_loesungen) ? $coaching_verhalten_sucht_loesungen :'';
                            for ($i = 1; $i <= $sucht_loesungen; $i++) {
                                ?>
                                <img src="images/star.png" />
                                <?php
                            }
							?>
						<td align="left" style="width:30%">
							<?php
                            $rating = $sucht_loesungen;
                            if($rating == 1)
                                echo '&nbsp;stark unterdurchschnittlich';
                            else if ($rating == 2)
                                echo '&nbsp;knapp unterdurchschnittlich';
                            else if ($rating == 3)
                                echo '&nbsp;den Anforderungen entsprechend';
                            else if ($rating == 4)
                                echo '&nbsp;überdurchschnittlich';
                            else if ($rating == 5)
                                echo '&nbsp;ausgezeichnet';
                        ?>
                    </td>
                    </tr>
                    <tr style="border-bottom: 1pt solid black">
                        <td align="left" style="width:40%; padding-left:10px">
							<b>@lang('forms.agiert_entscheidung')</b>
                        </td>
                        <td align="left" style="width:30%; padding-top:10px">
                        <?php
                            $agiert_entscheidung = isset($coaching_verhalten_agiert_entscheidung) ? $coaching_verhalten_agiert_entscheidung :'';
                            for ($i = 1; $i <= $agiert_entscheidung; $i++) {
                                ?>
                                <img src="images/star.png" />
                                <?php
                            }
							?>
						<td align="left" style="width:30%">
							<?php
                            $rating = $agiert_entscheidung;
                            if($rating == 1)
                                echo '&nbsp;stark unterdurchschnittlich';
                            else if ($rating == 2)
                                echo '&nbsp;knapp unterdurchschnittlich';
                            else if ($rating == 3)
                                echo '&nbsp;den Anforderungen entsprechend';
                            else if ($rating == 4)
                                echo '&nbsp;überdurchschnittlich';
                            else if ($rating == 5)
                                echo '&nbsp;ausgezeichnet';
                        ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1pt solid black">
                        <td align="left" style="width:40%; padding-left:10px">
							<b>@lang('forms.motiviert_konflikt_solve')</b>
                        </td>
                        <td align="left" style="width:30%; padding-top:10px">
                        <?php
                            $motiviert_konflikt_solve = isset($coaching_verhalten_motiviert_konflikt_solve) ? $coaching_verhalten_motiviert_konflikt_solve :'';
                            for ($i = 1; $i <= $motiviert_konflikt_solve; $i++) {
                                ?>
                                <img src="images/star.png" />
                                <?php
                            }
							?>
						<td align="left" style="width:30%">
							<?php
                            $rating = $motiviert_konflikt_solve;
                            if($rating == 1)
                                echo '&nbsp;stark unterdurchschnittlich';
                            else if ($rating == 2)
                                echo '&nbsp;knapp unterdurchschnittlich';
                            else if ($rating == 3)
                                echo '&nbsp;den Anforderungen entsprechend';
                            else if ($rating == 4)
                                echo '&nbsp;überdurchschnittlich';
                            else if ($rating == 5)
                                echo '&nbsp;ausgezeichnet';
                        ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1pt solid black">
                        <td align="left" style="width:40%; padding-left:10px">
							<b>@lang('forms.motiviert_problem_solve')</b>
                        </td>
                        <td align="left" style="width:30%; padding-top:10px">
                        <?php
                            $motiviert_problem_solve = isset($coaching_verhalten_motiviert_problem_solve) ? $coaching_verhalten_motiviert_problem_solve :'';
                            for ($i = 1; $i <= $motiviert_konflikt_solve; $i++) {
                                ?>
                                <img src="images/star.png" />
                                <?php
                            }
							?>
						<td align="left" style="width:30%">
							<?php
                            $rating = $motiviert_problem_solve;
                            if($rating == 1)
                                echo '&nbsp;stark unterdurchschnittlich';
                            else if ($rating == 2)
                                echo '&nbsp;knapp unterdurchschnittlich';
                            else if ($rating == 3)
                                echo '&nbsp;den Anforderungen entsprechend';
                            else if ($rating == 4)
                                echo '&nbsp;überdurchschnittlich';
                            else if ($rating == 5)
                                echo '&nbsp;ausgezeichnet';
                        ?>
                        </td>
                    </tr>                    
                </table>
					
                <table width="520" style="page-break-inside:avoid; margin-top: 120px; padding-left: 10px; padding-right: 10px; font-size: 14px;">          
                        <tr>             
                            <td>
                            <div><span style="font-size: 16px; margin-bottom: 30px">Verfasser: </span><span></span></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div><span style="font-size: 16px; font: bold; margin-bottom: 30px">Nextlevel Akademie</span></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div style="font-size: 16px">Caoching & Prozess Management</div>     
                            </td>
                        </tr>                                          
                </table>	
	    </div>
    </main>
</body>