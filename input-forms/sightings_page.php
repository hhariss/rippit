<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Rippit</title>
    <link rel="icon" type="image/png" href="../img/whiteclaws.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/style.css" />
</head>
<main>

    <body>
        <?php
      session_start();
      if (!isset($_SESSION['username'])) {
        header('Location: php/login_page.php');
        die();
      }
      ?>
        <header>
            <nav class="navbar">
                <a href="../index.php">
                    <img alt="Logo" src="../img/whiteclaws.png" width="150" />
                </a>
            </nav>
        </header>
        <form class="container col-7 font-monospace" action="../php/sightings_page.php" method="post">
            <div class="form-group mt-3">
                <h1>make sightings post</h1>
                <label>title</label>
                <input class="form-control" placeholder="enter title" name="title" />
            </div>
            <div class="form-group mt-3">
                <label>country</label>
                <select asp-for="Nationality" class="form-control" name="country">
                    <option value="" disabled selected hidden>choose country</option>
                    <option value="afghanistan">Afghanistan</option>
                    <option value="albania">Albania</option>
                    <option value="algeria">Algeria</option>
                    <option value="andorra">Andorra</option>
                    <option value="angola">Angola</option>
                    <option value="antigua and barbuda">Antigua and Barbuda</option>
                    <option value="argentina">Argentina</option>
                    <option value="armenia">Armenia</option>
                    <option value="australia">Australia</option>
                    <option value="austria">Austria</option>
                    <option value="azerbaijan">Azerbaijan</option>
                    <option value="bahamas">Bahamas</option>
                    <option value="bahrain">Bahrain</option>
                    <option value="bangladesh">Bangladesh</option>
                    <option value="barbados">Barbados</option>
                    <option value="belarus">Belarus</option>
                    <option value="belgium">Belgium</option>
                    <option value="belize">Belize</option>
                    <option value="benin">Benin</option>
                    <option value="bhutan">Bhutan</option>
                    <option value="bolivia">Bolivia</option>
                    <option value="bosnia and herzegovina">
                        Bosnia and Herzegovina
                    </option>
                    <option value="botswana">Botswana</option>
                    <option value="brazil">Brazil</option>
                    <option value="brunei">Brunei</option>
                    <option value="bulgaria">Bulgaria</option>
                    <option value="burkina faso">Burkina Faso</option>
                    <option value="burundi">Burundi</option>
                    <option value="côte d'ivoire">Côte d'Ivoire</option>
                    <option value="cabo verde">Cabo Verde</option>
                    <option value="cambodia">Cambodia</option>
                    <option value="cameroon">Cameroon</option>
                    <option value="canada">Canada</option>
                    <option value="central african republic">
                        Central African Republic
                    </option>
                    <option value="chad">Chad</option>
                    <option value="chile">Chile</option>
                    <option value="china">China</option>
                    <option value="colombia">Colombia</option>
                    <option value="comoros">Comoros</option>
                    <option value="congo (congo-brazzaville)">
                        Congo (Congo-Brazzaville)
                    </option>
                    <option value="costa rica">Costa Rica</option>
                    <option value="croatia">Croatia</option>
                    <option value="cuba">Cuba</option>
                    <option value="cyprus">Cyprus</option>
                    <option value="czechia (czech republic)">
                        Czechia (Czech Republic)
                    </option>
                    <option value="democratic republic of the congo">
                        Democratic Republic of the Congo
                    </option>
                    <option value="denmark">Denmark</option>
                    <option value="djibouti">Djibouti</option>
                    <option value="dominica">Dominica</option>
                    <option value="dominican republic">Dominican Republic</option>
                    <option value="ecuador">Ecuador</option>
                    <option value="egypt">Egypt</option>
                    <option value="el salvador">El Salvador</option>
                    <option value="equatorial guinea">Equatorial Guinea</option>
                    <option value="eritrea">Eritrea</option>
                    <option value="estonia">Estonia</option>
                    <option value="eswatini">Eswatini</option>
                    <option value="ethiopia">Ethiopia</option>
                    <option value="fiji">Fiji</option>
                    <option value="finland">Finland</option>
                    <option value="france">France</option>
                    <option value="gabon">Gabon</option>
                    <option value="gambia">Gambia</option>
                    <option value="georgia">Georgia</option>
                    <option value="germany">Germany</option>
                    <option value="ghana">Ghana</option>
                    <option value="greece">Greece</option>
                    <option value="grenada">Grenada</option>
                    <option value="guatemala">Guatemala</option>
                    <option value="guinea">Guinea</option>
                    <option value="guinea-bissau">Guinea-Bissau</option>
                    <option value="guyana">Guyana</option>
                    <option value="haiti">Haiti</option>
                    <option value="holy see">Holy See</option>
                    <option value="honduras">Honduras</option>
                    <option value="hungary">Hungary</option>
                    <option value="iceland">Iceland</option>
                    <option value="india">India</option>
                    <option value="indonesia">Indonesia</option>
                    <option value="iran">Iran</option>
                    <option value="iraq">Iraq</option>
                    <option value="ireland">Ireland</option>
                    <option value="israel">Israel</option>
                    <option value="italy">Italy</option>
                    <option value="jamaica">Jamaica</option>
                    <option value="japan">Japan</option>
                    <option value="jordan">Jordan</option>
                    <option value="kazakhstan">Kazakhstan</option>
                    <option value="kenya">Kenya</option>
                    <option value="kiribati">Kiribati</option>
                    <option value="kuwait">Kuwait</option>
                    <option value="kyrgyzstan">Kyrgyzstan</option>
                    <option value="laos">Laos</option>
                    <option value="latvia">Latvia</option>
                    <option value="lebanon">Lebanon</option>
                    <option value="lesotho">Lesotho</option>
                    <option value="liberia">Liberia</option>
                    <option value="libya">Libya</option>
                    <option value="liechtenstein">Liechtenstein</option>
                    <option value="lithuania">Lithuania</option>
                    <option value="luxembourg">Luxembourg</option>
                    <option value="madagascar">Madagascar</option>
                    <option value="malawi">Malawi</option>
                    <option value="malaysia">Malaysia</option>
                    <option value="maldives">Maldives</option>
                    <option value="mali">Mali</option>
                    <option value="malta">Malta</option>
                    <option value="marshall islands">Marshall Islands</option>
                    <option value="mauritania">Mauritania</option>
                    <option value="mauritius">Mauritius</option>
                    <option value="mexico">Mexico</option>
                    <option value="micronesia">Micronesia</option>
                    <option value="moldova">Moldova</option>
                    <option value="monaco">Monaco</option>
                    <option value="mongolia">Mongolia</option>
                    <option value="montenegro">Montenegro</option>
                    <option value="morocco">Morocco</option>
                    <option value="mozambique">Mozambique</option>
                    <option value="myanmar (formerly burma)">
                        Myanmar (formerly Burma)
                    </option>
                    <option value="namibia">Namibia</option>
                    <option value="nauru">Nauru</option>
                    <option value="nepal">Nepal</option>
                    <option value="netherlands">Netherlands</option>
                    <option value="new zealand">New Zealand</option>
                    <option value="nicaragua">Nicaragua</option>
                    <option value="niger">Niger</option>
                    <option value="nigeria">Nigeria</option>
                    <option value="north korea">North Korea</option>
                    <option value="north macedonia">North Macedonia</option>
                    <option value="norway">Norway</option>
                    <option value="oman">Oman</option>
                    <option value="pakistan">Pakistan</option>
                    <option value="palau">Palau</option>
                    <option value="palestine state">Palestine State</option>
                    <option value="panama">Panama</option>
                    <option value="papua new guinea">Papua New Guinea</option>
                    <option value="paraguay">Paraguay</option>
                    <option value="peru">Peru</option>
                    <option value="philippines">Philippines</option>
                    <option value="poland">Poland</option>
                    <option value="portugal">Portugal</option>
                    <option value="qatar">Qatar</option>
                    <option value="romania">Romania</option>
                    <option value="russia">Russia</option>
                    <option value="rwanda">Rwanda</option>
                    <option value="saint kitts and nevis">Saint Kitts and Nevis</option>
                    <option value="saint lucia">Saint Lucia</option>
                    <option value="saint vincent and the grenadines">
                        Saint Vincent and the Grenadines
                    </option>
                    <option value="samoa">Samoa</option>
                    <option value="san marino">San Marino</option>
                    <option value="sao tome and principe">Sao Tome and Principe</option>
                    <option value="saudi arabia">Saudi Arabia</option>
                    <option value="senegal">Senegal</option>
                    <option value="serbia">Serbia</option>
                    <option value="seychelles">Seychelles</option>
                    <option value="sierra leone">Sierra Leone</option>
                    <option value="singapore">Singapore</option>
                    <option value="slovakia">Slovakia</option>
                    <option value="slovenia">Slovenia</option>
                    <option value="solomon islands">Solomon Islands</option>
                    <option value="somalia">Somalia</option>
                    <option value="south africa">South Africa</option>
                    <option value="south korea">South Korea</option>
                    <option value="south sudan">South Sudan</option>
                    <option value="spain">Spain</option>
                    <option value="sri lanka">Sri Lanka</option>
                    <option value="sudan">Sudan</option>
                    <option value="suriname">Suriname</option>
                    <option value="sweden">Sweden</option>
                    <option value="switzerland">Switzerland</option>
                    <option value="syria">Syria</option>
                    <option value="tajikistan">Tajikistan</option>
                    <option value="tanzania">Tanzania</option>
                    <option value="thailand">Thailand</option>
                    <option value="timor-leste">Timor-Leste</option>
                    <option value="togo">Togo</option>
                    <option value="tonga">Tonga</option>
                    <option value="trinidad and tobago">Trinidad and Tobago</option>
                    <option value="tunisia">Tunisia</option>
                    <option value="turkey">Turkey</option>
                    <option value="turkmenistan">Turkmenistan</option>
                    <option value="tuvalu">Tuvalu</option>
                    <option value="uganda">Uganda</option>
                    <option value="ukraine">Ukraine</option>
                    <option value="united arab emirates">United Arab Emirates</option>
                    <option value="united kingdom">United Kingdom</option>
                    <option value="united states of america">
                        United States of America
                    </option>
                    <option value="uruguay">Uruguay</option>
                    <option value="uzbekistan">Uzbekistan</option>
                    <option value="vanuatu">Vanuatu</option>
                    <option value="venezuela">Venezuela</option>
                    <option value="vietnam">Vietnam</option>
                    <option value="yemen">Yemen</option>
                    <option value="zambia">Zambia</option>
                    <option value="zimbabwe">Zimbabwe</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label>city</label>
                <input class="form-control" placeholder="enter city" name="city" />
            </div>
            <div class="form-group mt-3">
                <label>content</label>
                <textarea class="form-control" placeholder="enter content" rows="10" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary mt-4">post</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>
    <script src="../scripts/cancel_button.js"></script>
</main>

</html>