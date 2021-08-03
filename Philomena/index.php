<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philomena</title>
    <link rel="stylesheet" href="style.css">
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/core/locales/nl.js'></script>
    <script src="calendar.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <?php
    require "config.php";
    // require "catcher.php";
    
  ?>

  <div id="signout">
    <a href="logout.php">Sign Out</a>
  </div>
  <div id="container">
    <div id="afspraak_form">
      <div id="afspraak_title">
        <h2>Wat kan Philomena voor u betekenen</h2>
          <div id="tab">
            <h3 id="tab_dienst">Dienst(en)</h3>
            <h3 id="tab_behandeling">Behandeling(en)</h3>
            <h3 id="tab_datum_tijd">Datum & Tijd</h3>
            <h3 id="tab_afrekenen">Afrekenen</h3>
            <div id="line" :style="line"></div>
        </div>
      </div>
      <div id="afspraak_content">

        <div id="dienst" v-if="dienst">
          <div id="dienst_options">
            <label for="checkbox_dienst_nagels" id="dienst_nagels">
                <h1>Nagels</h1>
                <input type="checkbox" name="checkbox_dienst_nagels" id="checkbox_dienst_nagels" v-model="dnagels">
            </label>

            <label for="checkbox_dienst_haar" id="dienst_haar">
                <h1>Haar</h1>
                <input type="checkbox" name="checkbox_dienst_haar" id="checkbox_dienst_haar" v-model="dhaar">
            </label>     
          </div>
          <div id="nav_dienst" class="nav1">
          <?php
            require "CRUD.php";

          ?>
            <h3 id="dienst_error">U heeft nog niks gekozen.</h3>
            <button @click="dienst_checked_check">Verder</button>
          </div>
        </div>

        <div v-if="behandeling" id="behandeling">
          <div id="behandeling_options">
            <div id="behandeling_nagels" v-if="dnagels">
              <h1>Nagels</h1>
              <table>
                <tr>
                  <th>Nieuwe set:</th>
                </tr>
                <tr>
                  <td>Naturel: Gel / powergel / acryl</td>
                  <td>€50</td>
                </tr>
                <tr>
                  <td>French manicure: Gel / powergel / acryl</td>
                  <td>€55</td>
                </tr>
                <tr>
                  <td>Gelpolish: Gel / powergel / acryl</td>
                  <td>€57,50</td>
                </tr>
              </table>
              <br>
              <table>
                <tr>
                  <th>Nabehandeling:</th>
                </tr>
                <tr>
                  <td>Naturel: Gel / powergel / acryl</td>
                  <td>€50</td>
                </tr>
                <tr>
                  <td>French manicure: Gel / powergel / acryl</td>
                  <td>€55</td>
                </tr>
                <tr>
                  <td>Gelpolish: Gel / powergel / acryl</td>
                  <td>€57,50</td>
                </tr>
                <tr>
                  <td>Kunstnagels verwijderen</td>
                  <td>€25</td>
                </tr>
                <tr>
                  <td>Gel op natuurlijke nagels</td>
                  <td>€30</td>
                </tr>
                <tr>
                  <td>Gelpolish op natuurlijke nagels</td>
                  <td>€25</td>
                </tr>
              </table>
              <br>
              <table>
                <tr>
                  <th>Handen:</th>
                </tr>
                <tr>
                  <td>Manicure 30 min</td>
                  <td>€17,50</td>
                </tr>
                <tr>
                  <td>Gelpolish op natuurlijke nagels</td>
                  <td>€25</td>
                </tr>
                <tr>
                  <td>Manicure incl. gelpolish</td>
                  <td>€35</td>
                </tr>
              </table>
              <br>
              <table>
                <tr>
                  <th>Voeten</th>
                </tr>
                <tr>
                  <td>Spa pedicure: eelt verwijderen en verzorging 30 min</td>
                  <td>€27,50</td>
                </tr>
                <tr>
                  <td>Gelpolish op tenen nagels</td>
                  <td>€25</td>
                </tr>
                <tr>
                  <td>Gel met French manicure op teen nagels</td>
                  <td>€35</td>
                </tr>
                <tr>
                  <td>Spa pedicure incl. Gelpolish</td>
                  <td>€45</td>
                </tr>
              </table>
            </div>
            <div id="behandeling_haar" v-if="dhaar">
              <h1>Haar</h1>
              <table>
                <tr>
                  <th>Dames:</th>
                </tr>
                <tr>
                  <td>Knippen</td>
                  <td>€25,00</td>
                </tr>
                <tr>
                  <td>Knippen / drogen / zonder product</td>
                  <td>€28,00</td>
                </tr>
                <tr>
                  <td>Knippen / modelleren</td>
                  <td>€32,00</td>
                </tr>
                <tr>
                  <td>Knippen / metamorfose/ boblijn (60min)</td>
                  <td>€40,50</td>
                </tr>
                <tr>
                  <td>Knippen / föhnen (60min)</td>
                  <td>€46,50</td>
                </tr>
                <tr>
                  <td>Wassen / knippen</td>
                  <td>€28,00</td>
                </tr>
                <tr>
                  <td>Wassen / knippen / drogen / zonder product</td>
                  <td>€31,00</td>
                </tr>
                <tr>
                  <td>Wassen / knippen / modelleren</td>
                  <td>€35,00</td>
                </tr>
                <tr>
                  <td>Wassen / metamorfose / boblijn (60min)</td>
                  <td>€43,50</td>
                </tr>
                <tr>
                  <td>Wassen / knippen / föhnen (60min)</td>
                  <td>€49,50</td>
                </tr>
              </table>
              <br>
              <table>
                <tr>
                  <th>Heren:</th>
                </tr>
                <tr>
                  <td>Knippen</td>
                  <td>€25,00</td>
                </tr>
                <tr>
                  <td>Wassen / knippen</td>
                  <td>€27,00</td>
                </tr>
              </table>
              <br>
              <table>
                <tr>
                  <th>Kinderen t/m 11 jaar:</th>
                </tr>
                <tr>
                  <td>Knippen</td>
                  <td>€18,50</td>
                </tr>
                <tr>
                  <td>Wassen / knippen</td>
                  <td>€21,50</td>
                </tr>
                <tr>
                  <td>Wassen / knippen / drogen</td>
                  <td>€24,50</td>
                </tr>
              </table>
              <br>
              <table>
                <tr>
                  <th>Kinderen 12 t/m 15 jaar:</th>
                </tr>
                <tr>
                  <td>Knippen</td>
                  <td>€21,50</td>
                </tr>
                <tr>
                  <td>Wassen / knippen</td>
                  <td>€23,50</td>
                </tr>
                <tr>
                  <td>Knippen / drogen</td>
                  <td>€23,50</td>
                </tr>
                <tr>
                  <td>Wassen / knippen / drogen</td>
                  <td>€26,50</td>
                </tr>
              </table>
            </div>
          </div>
          <div id="behandeling_selector">
            <!-- selector_nagels -->
            <div id="selector_nagels" v-if="dnagels">

              <!-- Nieuwe Set -->
              <div>
                <input type="checkbox" name="ns_option" id="ns_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="ns_option"><h3>Nieuwe set</h3></label>
                <div class="checkbox_hide" id="checkbox_ns">

                  <div>
                    <input type="checkbox" name="ns_n" id="ns_n" @click="total_price('ns_n', 50)" @change="select_aub('ns_n', 'ns_n_g', 'ns_n_p', 'ns_n_a', 'ns_n_error')">
                    <span>></span>
                    <label for="ns_n">Naturel</label>
                    <div class="radio_hide" id="radio_ns_n">
                      <span id="ns_n_error">Selecteer aub. een optie.</span>
                      <input type="radio" name="ns_n_option" id="ns_n_g" class="option" value="Nieuwe set: Naturel Gel" @click="select_aub('ns_n', 'ns_n_g', 'ns_n_p', 'ns_n_a', 'ns_n_error')">
                      <label for="ns_n_g">Gel</label><br>
                      <input type="radio" name="ns_n_option" id="ns_n_p" class="option" value="Nieuwe set: Naturel Powergel" @click="select_aub('ns_n', 'ns_n_g', 'ns_n_p', 'ns_n_a', 'ns_n_error')">
                      <label for="ns_n_p">Powergel</label><br>
                      <input type="radio" name="ns_n_option" id="ns_n_a" class="option" value="Nieuwe set: Naturel Acryl" @click="select_aub('ns_n', 'ns_n_g', 'ns_n_p', 'ns_n_a', 'ns_n_error')">
                      <label for="ns_n_a">Acryl</label><br>
                    </div>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="ns_fm" id="ns_fm" @click="total_price('ns_fm', 55)" @change="select_aub('ns_fm', 'ns_fm_g', 'ns_fm_p', 'ns_fm_a', 'ns_fm_error')">
                    <span>></span>
                    <label for="ns_fm">French Manicure</label>
                    <div class="radio_hide" id="radio_ns_fm">
                      <span id="ns_fm_error">Selecteer aub. een optie.</span>
                      <input type="radio" name="ns_fm_option" id="ns_fm_g" class="option" value="Nieuwe set: French Manicure Gel" @click="select_aub('ns_fm', 'ns_fm_g', 'ns_fm_p', 'ns_fm_a', 'ns_fm_error')">
                      <label for="ns_fm_g">Gel</label><br>
                      <input type="radio" name="ns_fm_option" id="ns_fm_p" class="option" value="Nieuwe set: French Manicure Powergel" @click="select_aub('ns_fm', 'ns_fm_g', 'ns_fm_p', 'ns_fm_a', 'ns_fm_error')">
                      <label for="ns_fm_p">Powergel</label><br>
                      <input type="radio" name="ns_fm_option" id="ns_fm_a" class="option" value="Nieuwe set: French Manicure Acryl" @click="select_aub('ns_fm', 'ns_fm_g', 'ns_fm_p', 'ns_fm_a', 'ns_fm_error')">
                      <label for="ns_fm_a">Acryl</label><br>
                    </div>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="ns_g" id="ns_g" @click="total_price('ns_g', 57.50)" @change="select_aub('ns_g', 'ns_g_g', 'ns_g_p', 'ns_g_a', 'ns_g_error')">
                    <span>></span>
                    <label for="ns_g">Gelpolish</label>
                    <div class="radio_hide" id="radio_ns_g">
                      <span id="ns_g_error">Selecteer aub. een optie.</span>
                      <input type="radio" name="ns_g_option" id="ns_g_g" class="option" value="Nieuwe set: Gelpolish Gel" @click="select_aub('ns_g', 'ns_g_g', 'ns_g_p', 'ns_g_a', 'ns_g_error')">
                      <label for="ns_g_g">Gel</label><br>
                      <input type="radio" name="ns_g_option" id="ns_g_p" class="option" value="Nieuwe set: Gelpolish Powergel" @click="select_aub('ns_g', 'ns_g_g', 'ns_g_p', 'ns_g_a', 'ns_g_error')">
                      <label for="ns_g_p">Powergel</label><br>
                      <input type="radio" name="ns_g_option" id="ns_g_a" class="option" value="Nieuwe set: Gelpolish Acryl" @click="select_aub('ns_g', 'ns_g_g', 'ns_g_p', 'ns_g_a', 'ns_g_error')">
                      <label for="ns_g_a">Acryl</label><br>
                    </div>
                    <br>
                  </div>

                </div>
                <br>
              </div>

              <!-- Nabehandeling -->
              <div>
                <input type="checkbox" name="nh_option" id="nh_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="nh_option"><h3>Nabehandeling</h3></label>
                <div class="checkbox_hide" id="checkbox_nh">
                  
                  <div>
                    <input type="checkbox" name="nh_n" id="nh_n" @click="total_price('nh_n', 50)" @change="select_aub('nh_n', 'nh_n_g', 'nh_n_p', 'nh_n_a', 'nh_n_error')">
                    <span>></span>
                    <label for="nh_n">Naturel</label>
                    <div class="radio_hide" id="radio_nh_n">
                      <span id="nh_n_error">Selecteer aub. een optie.</span>
                      <input type="radio" name="nh_n_option" id="nh_n_g" class="option" value="Nabehandeling: Naturel Gel" @click="select_aub('nh_n', 'nh_n_g', 'nh_n_p', 'nh_n_a', 'nh_n_error')">
                      <label for="nh_n_g">Gel</label><br>
                      <input type="radio" name="nh_n_option" id="nh_n_p" class="option" value="Nabehandeling: Naturel Powergel" @click="select_aub('nh_n', 'nh_n_g', 'nh_n_p', 'nh_n_a', 'nh_n_error')">
                      <label for="nh_n_p">Powergel</label><br>
                      <input type="radio" name="nh_n_option" id="nh_n_a" class="option" value="Nabehandeling: Naturel Acryl" @click="select_aub('nh_n', 'nh_n_g', 'nh_n_p', 'nh_n_a', 'nh_n_error')">
                      <label for="nh_n_a">Acryl</label><br>
                    </div>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="nh_fm" id="nh_fm" @click="total_price('nh_fm', 55)" @change="select_aub('nh_fm', 'nh_fm_g', 'nh_fm_p', 'nh_fm_a', 'nh_fm_error')">
                    <span>></span>
                    <label for="nh_fm">French Manicure</label>
                    <div class="radio_hide" id="radio_nh_fm">
                      <span id="nh_fm_error">Selecteer aub. een optie.</span>
                      <input type="radio" name="nh_fm_option" id="nh_fm_g" class="option" value="Nabehandeling: French Manicure Gel" @click="select_aub('nh_fm', 'nh_fm_g', 'nh_fm_p', 'nh_fm_a', 'nh_fm_error')">
                      <label for="nh_fm_g">Gel</label><br>
                      <input type="radio" name="nh_fm_option" id="nh_fm_p" class="option" value="Nabehandeling: French Manicure Powergel" @click="select_aub('nh_fm', 'nh_fm_g', 'nh_fm_p', 'nh_fm_a', 'nh_fm_error')">
                      <label for="nh_fm_p">Powergel</label><br>
                      <input type="radio" name="nh_fm_option" id="nh_fm_a" class="option" value="Nabehandeling: French Manicure Acryl" @click="select_aub('nh_fm', 'nh_fm_g', 'nh_fm_p', 'nh_fm_a', 'nh_fm_error')">
                      <label for="nh_fm_a">Acryl</label><br>
                    </div>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="nh_g" id="nh_g" @click="total_price('nh_g', 57.50)" @change="select_aub('nh_g', 'nh_g_g', 'nh_g_p', 'nh_g_a', 'nh_g_error')">
                    <span>></span>
                    <label for="nh_g">Gelpolish</label>
                    <div class="radio_hide" id="radio_nh_g">
                      <span id="nh_g_error">Selecteer aub. een optie.</span>
                      <input type="radio" name="nh_g_option" id="nh_g_g" class="option" value="Nabehandeling: Gelpolish Gel" @click="select_aub('nh_g', 'nh_g_g', 'nh_g_p', 'nh_g_a', 'nh_g_error')">
                      <label for="nh_g_g">Gel</label><br>
                      <input type="radio" name="nh_g_option" id="nh_g_p" class="option" value="Nabehandeling: Gelpolish Powergel" @click="select_aub('nh_g', 'nh_g_g', 'nh_g_p', 'nh_g_a', 'nh_g_error')">
                      <label for="nh_g_p">Powergel</label><br>
                      <input type="radio" name="nh_g_option" id="nh_g_a" class="option" value="Nabehandeling: Gelpolish Acryl" @click="select_aub('nh_g', 'nh_g_g', 'nh_g_p', 'nh_g_a', 'nh_g_error')">
                      <label for="nh_g_a">Acryl</label><br>
                    </div>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="nh_k" id="nh_k" class="option" value="Nabehandeling: Kunstnagels verwijderen" @click="total_price('nh_k', 25)">
                    <label for="nh_k">Kunstnagels verwijderen</label>
                  </div>

                  <div>
                    <input type="checkbox" name="nh_gn" id="nh_gn" class="option" value="Nabehandeling: Gel op natuurlijke nagels" @click="total_price('nh_gn', 30)">
                    <label for="nh_gn">Gel op natuurlijke nagels</label>
                  </div>

                  <div>
                    <input type="checkbox" name="nh_gpn" id="nh_gpn" class="option" value="Nabehandeling: Gelpolish op natuurlijke nagels" @click="total_price('nh_gpn', 25)">
                    <label for="nh_gpn">Gelpolish op natuurlijke nagels</label>
                  </div>

                </div>
                <br>
              </div>

              <!-- Handen -->
              <div>
                <input type="checkbox" name="h_option" id="h_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="h_option"><h3>Handen</h3></label>
                <div class="checkbox_hide" id="checkbox_h">

                  <div>
                    <input type="checkbox" name="h_m" id="h_m" class="option" value="Handen: Manicure 30 min" @click="total_price('h_m', 17.50)">
                    <label for="h_m">Manicure 30 min</label>
                  </div>

                  <div>
                    <input type="checkbox" name="h_g" id="h_g" class="option" value="Handen: Gelpolish op natuurlijke nagels" @click="total_price('h_g', 25)">
                    <label for="h_g">Gelpolish op natuurlijke nagels</label>
                  </div>

                  <div>
                    <input type="checkbox" name="h_mg" id="h_mg" class="option" value="Handen: Manicure incl. gelpolish" @click="total_price('h_mg', 35)">
                    <label for="h_mg">Manicure incl. gelpolish</label>
                  </div>

                </div>
                <br>
              </div>

              <!-- Voeten -->
              <div>
                <input type="checkbox" name="v_option" id="v_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="v_option"><h3>Voeten</h3></label>
                <div class="checkbox_hide" id="checkbox_v">

                  <div>
                    <input type="checkbox" name="v_s" id="v_s" class="option" value="Voeten: Spa pedicure: eelt verwijderen en verzorging 30 min" @click="total_price('v_s', 27.50)">
                    <label for="v_s">Spa pedicure: eelt verwijderen en verzorging 30 min</label>
                  </div>

                  <div>
                    <input type="checkbox" name="v_g" id="v_g" class="option" value="Voeten: Gelpolish op teen nagels" @click="total_price('v_g', 25)">
                    <label for="v_g">Gelpolish op teen nagels</label>
                  </div>

                  <div>
                    <input type="checkbox" name="v_gf" id="v_gf" class="option" value="Voeten: Gel met French manicure op teen nagels" @click="total_price('v_gf', 35)">
                    <label for="v_gf">Gel met French manicure op teen nagels</label>
                  </div>

                  <div>
                    <input type="checkbox" name="v_sg" id="v_sg" class="option" value="Voeten: Spa pedicure incl. Gelpolish" @click="total_price('v_sg', 45)">
                    <label for="v_sg">Spa pedicure incl. Gelpolish</label>
                  </div>

                </div>
                <br>
              </div>

            </div>
            <!-- Selector_haar -->
            <div id="selector_haar" v-if="dhaar">
              
              <!-- Dames -->
              <div>
                <input type="checkbox" name="d_option" id="d_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="d_option"><h3>Dames</h3></label>
                <div class="checkbox_hide" id="checkbox_d">

                  <div>
                    <input type="checkbox" name="d_k" id="d_k" class="option" value="Dames: Knippen" @click="total_price('d_k', 25)">
                    <label for="d_k">Knippen</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_kdz" id="d_kdz" class="option" value="Dames: Knippen / drogen / zonder product" @click="total_price('d_kdz', 28)">
                    <label for="d_kdz">Knippen / drogen / zonder product</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_km" id="d_km" class="option" value="Dames: Knippen / modelleren" @click="total_price('d_km', 32)">
                    <label for="d_km">Knippen / modelleren</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_kmb" id="d_kmb" class="option" value="Dames: Knippen / metamorfose/ boblijn (60min)" @click="total_price('d_kmb', 40.50)">
                    <label for="d_kmb">Knippen / metamorfose/ boblijn (60min)</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_kf" id="d_kf" class="option" value="Dames: Knippen / föhnen (60min)" @click="total_price('d_kf', 46.50)">
                    <label for="d_kf">Knippen / föhnen (60min)</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_wk" id="d_wk" class="option" value="Dames: Wassen / knippen" @click="total_price('d_wk', 28)">
                    <label for="d_wk">Wassen / knippen</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_wkdz" id="d_wkdz" class="option" value="Dames: Wassen / knippen / drogen / zonder product" @click="total_price('d_wkdz', 31)">
                    <label for="d_n">Wassen / knippen / drogen / zonder product</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_wkm" id="d_wkm" class="option" value="Dames: Wassen / knippen / modelleren" @click="total_price('d_wkm', 35)">
                    <label for="d_wkm">Wassen / knippen / modelleren</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_wmb" id="d_wmb" class="option" value="Dames: Wassen / metamorfose / boblijn (60min)" @click="total_price('d_wmb', 43.50)">
                    <label for="d_wmb">Wassen / metamorfose / boblijn (60min)</label>
                    <br>
                  </div>

                  <div>
                    <input type="checkbox" name="d_wkf" id="d_wkf" class="option" value="Dames: Wassen / knippen / föhnen (60min)" @click="total_price('d_wkf', 49.50)">
                    <label for="d_wkf">Wassen / knippen / föhnen (60min)</label>
                    <br>
                  </div>

                </div>
                <br>
              </div>

              <!-- Heren -->
              <div>
                <input type="checkbox" name="hr_option" id="hr_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="hr_option"><h3>Heren</h3></label>
                <div class="checkbox_hide" id="checkbox_hr">

                  <div>
                    <input type="checkbox" name="hr_k" id="hr_k" class="option" value="Heren: Knippen" @click="total_price('hr_k', 25)">
                    <label for="hr_k">Knippen</label>
                  </div>

                  <div>
                    <input type="checkbox" name="hr_wk" id="hr_wk" class="option" value="Heren: Wassen / knippen" @click="total_price('hr_wk', 27)">
                    <label for="hr_wk">Wassen / knippen</label>
                  </div>

                </div>
                <br>
              </div>

              <!-- Kinderen t/m 11 jaar -->
              <div>
                <input type="checkbox" name="k11_option" id="k11_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="k11_option"><h3>Kinderen t/m 11 jaar</h3></label>
                <div class="checkbox_hide" id="checkbox_k11">

                  <div>
                    <input type="checkbox" name="k11_k" id="k11_k" class="option" value="Kinderen t/m 11 jaar: Knippen" @click="total_price('k11_k', 18.50)">
                    <label for="k11_k">Knippen</label>
                  </div>

                  <div>
                    <input type="checkbox" name="k11_wk" id="k11_wk" class="option" value="Kinderen t/m 11 jaar: Wassen / knippen" @click="total_price('k11_wk', 21.50)">
                    <label for="k11_wk">Wassen / knippen</label>
                  </div>

                  <div>
                    <input type="checkbox" name="k11_wkd" id="k11_wkd" class="option" value="Kinderen t/m 11 jaar: Wassen / knippen / drogen" @click="total_price('k11_wkd', 24.50)">
                    <label for="k11_mg">Wassen / knippen / drogen</label>
                  </div>

                </div>
                <br>
              </div>

              <!-- Kinderen 12 t/m 15 jaar -->
              <div>
                <input type="checkbox" name="k12_option" id="k12_option" class="checkbox_title">
                <span><h3>></h3></span>
                <label for="k12_option"><h3>Kinderen 12 t/m 15 jaar</h3></label>
                <div class="checkbox_hide" id="checkbox_k12">

                  <div>
                    <input type="checkbox" name="k12_s" id="k12_s" class="option" value="Kinderen 12 t/m 15 jaar: Knippen" @click="total_price('k12_s', 21.50)">
                    <label for="k12_s">Knippen</label>
                  </div>

                  <div>
                    <input type="checkbox" name="k12_g" id="k12_g" class="option" value="Kinderen 12 t/m 15 jaar: Wassen / knippen" @click="total_price('k12_g', 23.50)">
                    <label for="k12_g">Wassen / knippen</label>
                  </div>

                  <div>
                    <input type="checkbox" name="k12_gf" id="k12_gf" class="option" value="Kinderen 12 t/m 15 jaar: Knippen / drogen" @click="total_price('k12_gf', 23.50)">
                    <label for="k12_gf">Knippen / drogen</label>
                  </div>

                  <div>
                    <input type="checkbox" name="k12_sg" id="k12_sg" class="option" value="Kinderen 12 t/m 15 jaar: Wassen / knippen / drogen" value="Wassen / knippen / drogen" @click="total_price('k12_sg', 26.50)">
                    <label for="k12_sg">Wassen / knippen / drogen</label>
                  </div>

                </div>
                <br>
              </div>

            </div>
          </div>
          <div id="price">
            <h2>Totaal (te betalen bij vertrek):{{EURprice}}</h2>
            <h3 id="behandeling_error">U heeft nog niks gekozen.</h3>
          </div>

          <div id="creatdiv">
            <button @click="store_event(); nav_behandeling=true">behandelingen opslaan</button>
          </div>

          <div class="nav2" v-if="nav_behandeling">
            <button @click='dienst_click'>Terug</button>
            <button @click="datum_tijd_click">Verder</button>
          </div>
        </div>


        <div id="datum_tijd">
          <div id='calendar'></div>

          <div id="afspraak_maken">

            <div id='external-events'>
              <p>
                <strong>Je behandeling(en)</strong>
              </p>
              <button @click="create_event">Laat mijn afspraken zien</button>
              <div id="event_box">

              </div>     
            </div>
            
          </div>
          <div class="nav2">
            <button @click="behandeling_click(); price='0'">Terug</button>
            <button @click='afrekenen_click'>Verder</button>
          </div>
        </div>
        

        <div v-if="afrekenen" id="afrekenen">
          <div>
            <div>{{dienst_info}}</div>
            <div>{{EURprice}}</div>
            <div>{{afspraken}}</div> 
          </div>
            
          <div>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="DPE6NERN3MTAJ">
              <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>

          <div class="nav2">
            <button @click='datum_tijd_click'>Terug</button>
            <button @click='bevestiging_click'>Verder</button>
          </div>
        </div>

        <div v-if="bevestiging" id="bevestiging">
          <div>

            <!-- <?php
            // $sql = "SELECT * FROM afspraak";
            //           if($result = $pdo->query($sql)){
            //               if($result->rowCount() > 0){
            //                   echo '<table class="table table-bordered table-striped">';
            //                       echo "<thead>";
            //                           echo "<tr>";
            //                               echo "<th>#</th>";
            //                               echo "<th>reservation_date</th>";
            //                               echo "<th>reservation_time</th>";
            //                               echo "<th>status</th>";
            //                               echo "<th>klantID</th>";
            //                               echo "<th>behandelingID</th>";
            //                               echo "<th>confirmed</th>";
            //                           echo "</tr>";
            //                       echo "</thead>";
            //                       echo "<tbody>";
            //                       while($row = $result->fetch()){
            //                           echo "<tr>";
            //                               echo "<td>" . $row['id'] . "</td>";
            //                               echo "<td>" . $row['reservation_date'] . "</td>";
            //                               echo "<td>" . $row['reservation_time'] . "</td>";
            //                               echo "<td>" . $row['status'] . "</td>";
            //                               echo "<td>" . $row['klantID.voornaam'] . "</td>";
            //                               echo "<td>" . $row['behandelingID'] . "</td>";
            //                               echo "<td>" . $row['confirmed'] . "</td>";
            //                           echo "</tr>";
            //                       }
            //                       echo "</tbody>";                            
            //                   echo "</table>";
            //                   // Free result set
            //                   unset($result);
            //               } else{
            //                   echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
            //               }
            //           } else{
            //               echo "Oops! Something went wrong. Please try again later.";
            //           }
                      ?> -->
          </div>
            <div class="nav1">
              <button @click='afrekenen_click'>Terug</button>
            </div>
          </div>
        </div>

    </div>

    </div>
  </div>
    
      <script src="https://unpkg.com/vue@3.0.11"></script>
      <script src="app.js"></script>
</body>
</html>