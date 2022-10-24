<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
    </head>    
    <body>
        <form action="api/sendEmail.php" method="post">
            <label for="fname">Email:</label>
            <input type="text" id="fname" name="mail"><br><br>
            <label for="lname">Local:</label>
            <input type="text" id="lname" name="locale"><br><br>
            <label for="lname">conteudo:</label>
            <input type="text" id="lname" name="content"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
    <?php 
        $table = "<table>
        <thead><tr><th style=\"background-color:rgba(65,76,107,0.25);\">Ano</th><th style=\"background-color:rgba(65,76,107,0.25);\">Janeiro</th><th style=\"background-color:rgba(65,76,107,0.25);\">Fevereiro</th><th style=\"background-color:rgba(65,76,107,0.25);\">Março</th><th style=\"background-color:rgba(65,76,107,0.25);\">Abril</th><th style=\"background-color:rgba(65,76,107,0.25);\">Maio</th><th style=\"background-color:rgba(65,76,107,0.25);\">Junho</th><th style=\"background-color:rgba(65,76,107,0.25);\">Julho</th><th style=\"background-color:rgba(65,76,107,0.25);\">Agosto</th><th style=\"background-color:rgba(65,76,107,0.25);\">Setembro</th><th style=\"background-color:rgba(65,76,107,0.25);\">Outubro</th><th style=\"background-color:rgba(65,76,107,0.25);\">Novembro</th><th style=\"background-color:rgba(65,76,107,0.25);\">Dezembro</th><th style=\"background-color:rgba(65,76,107,0.25);\">Total</th></tr>
        </thead>
        <tbody>
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">1998</th>
        
        <td id=\"line0-\">-</td>
        
        <td id=\"line1-\">-</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line3-\">-</td>
        
        <td id=\"line4-\">-</td>
        
        <td id=\"line54\">4</td>
        
        <td id=\"line637\">37</td>
        
        <td id=\"line7172\">172</td>
        
        <td id=\"line8620\">620</td>
        
        <td id=\"line950\">50</td>
        
        <td id=\"line10-\">-</td>
        
        <td id=\"line118\">8</td>
        
        <td id=\"line12891\">891</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">1999</th>
        
        <td id=\"line0-\">-</td>
        
        <td id=\"line12\">2</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line3-\">-</td>
        
        <td id=\"line4-\">-</td>
        
        <td id=\"line5-\">-</td>
        
        <td id=\"line61\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line7114\" style=\"background-color: rgba(0, 0, 255, 0.25);\">114</td>
        
        <td id=\"line8269\" style=\"background-color: rgba(0, 0, 255, 0.25);\">269</td>
        
        <td id=\"line986\">86</td>
        
        <td id=\"line104\">4</td>
        
        <td id=\"line11-\">-</td>
        
        <td id=\"line12476\" style=\"background-color: rgba(0, 0, 255, 0.25);\">476</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2000</th>
        
        <td id=\"line0-\">-</td>
        
        <td id=\"line11\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line213\" style=\"background-color: rgba(255, 0, 0, 0.25);\">13</td>
        
        <td id=\"line32\">2</td>
        
        <td id=\"line41\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line51\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line61\">1</td>
        
        <td id=\"line7190\">190</td>
        
        <td id=\"line8340\">340</td>
        
        <td id=\"line948\" style=\"background-color: rgba(0, 0, 255, 0.25);\">48</td>
        
        <td id=\"line10-\">-</td>
        
        <td id=\"line11-\">-</td>
        
        <td id=\"line12597\">597</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2001</th>
        
        <td id=\"line0-\">-</td>
        
        <td id=\"line1-\">-</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line3-\">-</td>
        
        <td id=\"line4-\">-</td>
        
        <td id=\"line51\">1</td>
        
        <td id=\"line64\">4</td>
        
        <td id=\"line7494\">494</td>
        
        <td id=\"line8318\">318</td>
        
        <td id=\"line9154\">154</td>
        
        <td id=\"line101\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line112\">2</td>
        
        <td id=\"line12974\">974</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2002</th>
        
        <td id=\"line0-\">-</td>
        
        <td id=\"line11\">1</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line3-\">-</td>
        
        <td id=\"line4-\">-</td>
        
        <td id=\"line512\">12</td>
        
        <td id=\"line685\">85</td>
        
        <td id=\"line71555\">1555</td>
        
        <td id=\"line85567\">5567</td>
        
        <td id=\"line91236\">1236</td>
        
        <td id=\"line10178\">178</td>
        
        <td id=\"line114\">4</td>
        
        <td id=\"line128638\">8638</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2003</th>
        
        <td id=\"line017\">17</td>
        
        <td id=\"line11\">1</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line36\">6</td>
        
        <td id=\"line418\">18</td>
        
        <td id=\"line523\">23</td>
        
        <td id=\"line6531\">531</td>
        
        <td id=\"line73680\">3680</td>
        
        <td id=\"line87371\">7371</td>
        
        <td id=\"line91327\">1327</td>
        
        <td id=\"line1054\">54</td>
        
        <td id=\"line118\">8</td>
        
        <td id=\"line1213036\">13036</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2004</th>
        
        <td id=\"line01\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line15\">5</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line310\">10</td>
        
        <td id=\"line426\">26</td>
        
        <td id=\"line518\">18</td>
        
        <td id=\"line6127\">127</td>
        
        <td id=\"line71262\">1262</td>
        
        <td id=\"line87272\">7272</td>
        
        <td id=\"line9924\">924</td>
        
        <td id=\"line1050\">50</td>
        
        <td id=\"line1112\">12</td>
        
        <td id=\"line129707\">9707</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2005</th>
        
        <td id=\"line024\" style=\"background-color: rgba(255, 0, 0, 0.25);\">24</td>
        
        <td id=\"line13\">3</td>
        
        <td id=\"line27\">7</td>
        
        <td id=\"line34\">4</td>
        
        <td id=\"line420\">20</td>
        
        <td id=\"line595\">95</td>
        
        <td id=\"line61307\" style=\"background-color: rgba(255, 0, 0, 0.25);\">1307</td>
        
        <td id=\"line78948\" style=\"background-color: rgba(255, 0, 0, 0.25);\">8948</td>
        
        <td id=\"line88581\" style=\"background-color: rgba(255, 0, 0, 0.25);\">8581</td>
        
        <td id=\"line91286\">1286</td>
        
        <td id=\"line1080\">80</td>
        
        <td id=\"line118\">8</td>
        
        <td id=\"line1220363\" style=\"background-color: rgba(255, 0, 0, 0.25);\">20363</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2006</th>
        
        <td id=\"line07\">7</td>
        
        <td id=\"line11\">1</td>
        
        <td id=\"line22\">2</td>
        
        <td id=\"line33\">3</td>
        
        <td id=\"line463\" style=\"background-color: rgba(255, 0, 0, 0.25);\">63</td>
        
        <td id=\"line542\">42</td>
        
        <td id=\"line6227\">227</td>
        
        <td id=\"line71945\">1945</td>
        
        <td id=\"line84876\">4876</td>
        
        <td id=\"line9796\">796</td>
        
        <td id=\"line1091\">91</td>
        
        <td id=\"line11-\">-</td>
        
        <td id=\"line128053\">8053</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2007</th>
        
        <td id=\"line01\">1</td>
        
        <td id=\"line119\" style=\"background-color: rgba(255, 0, 0, 0.25);\">19</td>
        
        <td id=\"line25\">5</td>
        
        <td id=\"line38\">8</td>
        
        <td id=\"line420\">20</td>
        
        <td id=\"line599\">99</td>
        
        <td id=\"line6232\">232</td>
        
        <td id=\"line72419\">2419</td>
        
        <td id=\"line87799\">7799</td>
        
        <td id=\"line91496\">1496</td>
        
        <td id=\"line1049\">49</td>
        
        <td id=\"line113\">3</td>
        
        <td id=\"line1212150\">12150</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2008</th>
        
        <td id=\"line05\">5</td>
        
        <td id=\"line11\">1</td>
        
        <td id=\"line24\">4</td>
        
        <td id=\"line31\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line429\">29</td>
        
        <td id=\"line531\">31</td>
        
        <td id=\"line6208\">208</td>
        
        <td id=\"line71997\">1997</td>
        
        <td id=\"line84600\">4600</td>
        
        <td id=\"line91139\">1139</td>
        
        <td id=\"line1095\">95</td>
        
        <td id=\"line114\">4</td>
        
        <td id=\"line128114\">8114</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2009</th>
        
        <td id=\"line0-\">-</td>
        
        <td id=\"line12\">2</td>
        
        <td id=\"line21\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line32\">2</td>
        
        <td id=\"line411\">11</td>
        
        <td id=\"line512\">12</td>
        
        <td id=\"line679\">79</td>
        
        <td id=\"line7530\">530</td>
        
        <td id=\"line82912\">2912</td>
        
        <td id=\"line91459\">1459</td>
        
        <td id=\"line1073\">73</td>
        
        <td id=\"line115\">5</td>
        
        <td id=\"line125086\">5086</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2010</th>
        
        <td id=\"line06\">6</td>
        
        <td id=\"line1-\">-</td>
        
        <td id=\"line24\">4</td>
        
        <td id=\"line317\">17</td>
        
        <td id=\"line458\">58</td>
        
        <td id=\"line584\">84</td>
        
        <td id=\"line6324\">324</td>
        
        <td id=\"line73760\">3760</td>
        
        <td id=\"line86620\">6620</td>
        
        <td id=\"line9739\">739</td>
        
        <td id=\"line10101\">101</td>
        
        <td id=\"line116\">6</td>
        
        <td id=\"line1211719\">11719</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2011</th>
        
        <td id=\"line03\">3</td>
        
        <td id=\"line1-\">-</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line39\">9</td>
        
        <td id=\"line419\">19</td>
        
        <td id=\"line533\">33</td>
        
        <td id=\"line6223\">223</td>
        
        <td id=\"line71018\">1018</td>
        
        <td id=\"line82698\">2698</td>
        
        <td id=\"line9410\">410</td>
        
        <td id=\"line10180\">180</td>
        
        <td id=\"line1110\">10</td>
        
        <td id=\"line124603\">4603</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2012</th>
        
        <td id=\"line07\">7</td>
        
        <td id=\"line12\">2</td>
        
        <td id=\"line25\">5</td>
        
        <td id=\"line34\">4</td>
        
        <td id=\"line426\">26</td>
        
        <td id=\"line524\">24</td>
        
        <td id=\"line6190\">190</td>
        
        <td id=\"line71533\">1533</td>
        
        <td id=\"line83936\">3936</td>
        
        <td id=\"line9932\">932</td>
        
        <td id=\"line1059\">59</td>
        
        <td id=\"line117\">7</td>
        
        <td id=\"line126725\">6725</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2013</th>
        
        <td id=\"line05\">5</td>
        
        <td id=\"line15\">5</td>
        
        <td id=\"line21\">1</td>
        
        <td id=\"line365\" style=\"background-color: rgba(255, 0, 0, 0.25);\">65</td>
        
        <td id=\"line417\">17</td>
        
        <td id=\"line528\">28</td>
        
        <td id=\"line6130\">130</td>
        
        <td id=\"line71379\">1379</td>
        
        <td id=\"line84538\">4538</td>
        
        <td id=\"line9430\">430</td>
        
        <td id=\"line10200\" style=\"background-color: rgba(255, 0, 0, 0.25);\">200</td>
        
        <td id=\"line1110\">10</td>
        
        <td id=\"line126808\">6808</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2014</th>
        
        <td id=\"line0-\">-</td>
        
        <td id=\"line1-\">-</td>
        
        <td id=\"line28\">8</td>
        
        <td id=\"line319\">19</td>
        
        <td id=\"line41\">1</td>
        
        <td id=\"line535\">35</td>
        
        <td id=\"line6121\">121</td>
        
        <td id=\"line71577\">1577</td>
        
        <td id=\"line83205\">3205</td>
        
        <td id=\"line9628\">628</td>
        
        <td id=\"line10103\">103</td>
        
        <td id=\"line1117\">17</td>
        
        <td id=\"line125714\">5714</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2015</th>
        
        <td id=\"line010\">10</td>
        
        <td id=\"line16\">6</td>
        
        <td id=\"line25\">5</td>
        
        <td id=\"line38\">8</td>
        
        <td id=\"line46\">6</td>
        
        <td id=\"line566\">66</td>
        
        <td id=\"line6161\">161</td>
        
        <td id=\"line71891\">1891</td>
        
        <td id=\"line83959\">3959</td>
        
        <td id=\"line91273\">1273</td>
        
        <td id=\"line10180\">180</td>
        
        <td id=\"line1115\">15</td>
        
        <td id=\"line127580\">7580</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2016</th>
        
        <td id=\"line020\">20</td>
        
        <td id=\"line16\">6</td>
        
        <td id=\"line22\">2</td>
        
        <td id=\"line315\">15</td>
        
        <td id=\"line433\">33</td>
        
        <td id=\"line5156\" style=\"background-color: rgba(255, 0, 0, 0.25);\">156</td>
        
        <td id=\"line6791\">791</td>
        
        <td id=\"line73164\">3164</td>
        
        <td id=\"line84884\">4884</td>
        
        <td id=\"line9716\">716</td>
        
        <td id=\"line1062\">62</td>
        
        <td id=\"line1121\" style=\"background-color: rgba(255, 0, 0, 0.25);\">21</td>
        
        <td id=\"line129870\">9870</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2017</th>
        
        <td id=\"line01\">1</td>
        
        <td id=\"line15\">5</td>
        
        <td id=\"line21\">1</td>
        
        <td id=\"line32\">2</td>
        
        <td id=\"line411\">11</td>
        
        <td id=\"line559\">59</td>
        
        <td id=\"line6458\">458</td>
        
        <td id=\"line71608\">1608</td>
        
        <td id=\"line84078\">4078</td>
        
        <td id=\"line91843\" style=\"background-color: rgba(255, 0, 0, 0.25);\">1843</td>
        
        <td id=\"line10125\">125</td>
        
        <td id=\"line1120\">20</td>
        
        <td id=\"line128211\">8211</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2018</th>
        
        <td id=\"line01\">1</td>
        
        <td id=\"line12\">2</td>
        
        <td id=\"line21\">1</td>
        
        <td id=\"line39\">9</td>
        
        <td id=\"line430\">30</td>
        
        <td id=\"line568\">68</td>
        
        <td id=\"line6492\">492</td>
        
        <td id=\"line71728\">1728</td>
        
        <td id=\"line85408\">5408</td>
        
        <td id=\"line9539\">539</td>
        
        <td id=\"line1049\">49</td>
        
        <td id=\"line119\">9</td>
        
        <td id=\"line128336\">8336</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2019</th>
        
        <td id=\"line04\">4</td>
        
        <td id=\"line11\">1</td>
        
        <td id=\"line22\">2</td>
        
        <td id=\"line311\">11</td>
        
        <td id=\"line446\">46</td>
        
        <td id=\"line560\">60</td>
        
        <td id=\"line6272\">272</td>
        
        <td id=\"line73051\">3051</td>
        
        <td id=\"line82977\">2977</td>
        
        <td id=\"line9354\">354</td>
        
        <td id=\"line1044\">44</td>
        
        <td id=\"line111\" style=\"background-color: rgba(0, 0, 255, 0.25);\">1</td>
        
        <td id=\"line126823\">6823</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">2020</th>
        
        <td id=\"line016\">16</td>
        
        <td id=\"line1-\">-</td>
        
        <td id=\"line2-\">-</td>
        
        <td id=\"line3-\">-</td>
        
        <td id=\"line4-\">-</td>
        
        <td id=\"line5-\">-</td>
        
        <td id=\"line6-\">-</td>
        
        <td id=\"line7-\">-</td>
        
        <td id=\"line8-\">-</td>
        
        <td id=\"line9-\">-</td>
        
        <td id=\"line10-\">-</td>
        
        <td id=\"line11-\">-</td>
        
        <td id=\"line1216\">16</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">Máximo*</th>
        
        <td id=\"line024\" style=\"background-color:rgba(255,0,0,0.25);\">24</td>
        
        <td id=\"line119\" style=\"background-color:rgba(255,0,0,0.25);\">19</td>
        
        <td id=\"line213\" style=\"background-color:rgba(255,0,0,0.25);\">13</td>
        
        <td id=\"line365\" style=\"background-color:rgba(255,0,0,0.25);\">65</td>
        
        <td id=\"line463\" style=\"background-color:rgba(255,0,0,0.25);\">63</td>
        
        <td id=\"line5156\" style=\"background-color:rgba(255,0,0,0.25);\">156</td>
        
        <td id=\"line61307\" style=\"background-color:rgba(255,0,0,0.25);\">1307</td>
        
        <td id=\"line78948\" style=\"background-color:rgba(255,0,0,0.25);\">8948</td>
        
        <td id=\"line88581\" style=\"background-color:rgba(255,0,0,0.25);\">8581</td>
        
        <td id=\"line91843\" style=\"background-color:rgba(255,0,0,0.25);\">1843</td>
        
        <td id=\"line10200\" style=\"background-color:rgba(255,0,0,0.25);\">200</td>
        
        <td id=\"line1121\" style=\"background-color:rgba(255,0,0,0.25);\">21</td>
        
        <td id=\"line1220363\" style=\"background-color:rgba(255,0,0,0.25);\">20363</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">Média*</th>
        
        <td id=\"line07\" style=\"background-color:rgba(255,255,0,0.25);\">7</td>
        
        <td id=\"line14\" style=\"background-color:rgba(255,255,0,0.25);\">4</td>
        
        <td id=\"line24\" style=\"background-color:rgba(255,255,0,0.25);\">4</td>
        
        <td id=\"line311\" style=\"background-color:rgba(255,255,0,0.25);\">11</td>
        
        <td id=\"line424\" style=\"background-color:rgba(255,255,0,0.25);\">24</td>
        
        <td id=\"line545\" style=\"background-color:rgba(255,255,0,0.25);\">45</td>
        
        <td id=\"line6273\" style=\"background-color:rgba(255,255,0,0.25);\">273</td>
        
        <td id=\"line72001\" style=\"background-color:rgba(255,255,0,0.25);\">2001</td>
        
        <td id=\"line84219\" style=\"background-color:rgba(255,255,0,0.25);\">4219</td>
        
        <td id=\"line9812\" style=\"background-color:rgba(255,255,0,0.25);\">812</td>
        
        <td id=\"line1089\" style=\"background-color:rgba(255,255,0,0.25);\">89</td>
        
        <td id=\"line119\" style=\"background-color:rgba(255,255,0,0.25);\">9</td>
        
        <td id=\"line127476\" style=\"background-color:rgba(255,255,0,0.25);\">7476</td>
        </tr>
        
        <tr>
        <th style=\"background-color:rgba(65,76,107,0.25);\">Mínimo*</th>
        
        <td id=\"line01\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line11\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line21\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line31\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line41\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line51\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line61\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line7114\" style=\"background-color:rgba(0,0,255,0.25);\">114</td>
        
        <td id=\"line8269\" style=\"background-color:rgba(0,0,255,0.25);\">269</td>
        
        <td id=\"line948\" style=\"background-color:rgba(0,0,255,0.25);\">48</td>
        
        <td id=\"line101\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line111\" style=\"background-color:rgba(0,0,255,0.25);\">1</td>
        
        <td id=\"line12476\" style=\"background-color:rgba(0,0,255,0.25);\">476</td>
        </tr>
        </tbody></table>";

        require 'api/Controller/Table.php';

        #$table = str_replace("table","",$table);
        #$table = str_replace("thead","",$table);
        #$table = str_replace("<","",$table);
        #$table = str_replace(">","",$table);
        #$table = str_replace("=","",$table);
        #$table = str_replace("line","",$table); 
        #$table = str_replace("line","",$table);

        #echo  $table;
        #$texto = new Table($table);
        #echo "resultado : ".$texto;
        #echo "\n".strlen($texto);

        #echo  $table;
    ?>

 


</html>