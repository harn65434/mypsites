<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Nagios</title>
<meta name="generator" content="Bluefish">
<meta name="author" content="">
<meta name="date" content="">
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<script type="text/javascript" src="/media/jsscript.js"></script>
<link href="/media/pics.css" rel="stylesheet" type="text/css" />

<?php
$curpath = dirname(__FILE__);
$curpath = str_replace('mypsites','studio-progs',$curpath);
include "$curpath/config.php";
include "$curpath/../../common/utils.php";
include "$curpath/../../common/inspic.php";
?>

</head>
<body id="txtbody"
<?php
if (file_exists("/var/lock/synclock"))
{
  echo 'class="readonly">';
} else {
  echo 'class="normal">';
}
$time1=microtime(true);
?>
<table>
<?php
  $sqlcmd = "select `index` as id, status as status from danejones where prefix=\"$pre\";";
  $dbh = opendb();
  mysql_select_db($database);

  $result = mysql_query($sqlcmd,$dbh);
  $new_array = array();
  while( $row = mysql_fetch_assoc($result) )
  {
    $id = $row['id'];
    $status = $row['status'];
    $new_array[$id] = $status;
  }
?>

<tr>
<td><?php inspic_dj("massagerooms","mr",1310,"anna_on_natalee","Anna on Natalee","Anna_Natalee",$new_array['1310']);?></td>
<td><?php inspic_dj("massagerooms","mr",1308,"steve_on_alicia","Steve on Alicia","Steve_Alicia",$new_array['1308']);?></td>
<td><?php inspic_dj("massagerooms","mr",1306,"ivy_on_vera","Ivy on Vera","Ivy_Vera",$new_array['1306']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1304,"steve_on_tiffany","Steve on Tiffany","Steve_Tiffany",$new_array['1304']);?></td>
<td><?php inspic_dj("massagerooms","mr",1302,"martin_on_keira","Martin on Keira","Martin_Keira",$new_array['1302']);?></td>
<td><?php inspic_dj("massagerooms","mr",1300,"anna_on_peter","Anna on Peter","Anna_Peter",$new_array['1300']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1298,"keira_on_elisa","Keira on Elisa","Keira_Elisa",$new_array['1298']);?></td>
<td><?php inspic_dj("massagerooms","mr",1296,"steve_on_meggie","Steve on Meggie","Steve_Meggie",$new_array['1296']);?></td>
<td><?php inspic_dj("massagerooms","mr",1294,"martin_on_natalee","Martin on Natalee","Martin_Natalee",$new_array['1294']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1292,"steve_on_sofia","Steve on Sofia","Steve_Sofia",$new_array['1292']);?></td>
<td><?php inspic_dj("massagerooms","mr",1290,"joshua_on_alessandra","Joshua on Alessandra","Joshua_Alessandra",$new_array['1290']);?></td>
<td><?php inspic_dj("massagerooms","mr",1288,"cage_on_satin","Cage on Satin","Satin_Cage",$new_array['1288']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1286,"martin_and_anna_on_alexis","Martin and Anna on ALexis","Martin_Anna_Alexis",$new_array['1286']);?></td>
<td><?php inspic_dj("massagerooms","mr",1284,"radek_on_petty","Radek on Petty","Petty_Radek",$new_array['1284']);?></td>
<td><?php inspic_dj("massagerooms","mr",1282,"george_on_cat","George on Cat","George_Cat",$new_array['1282']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1280,"martin_on_anna","Martin on Anna","Martin",$new_array['1280']);?></td>
<td><?php inspic_dj("massagerooms","mr",1278,"cage_on_satin","Cage on Satin","Satin_Cage",$new_array['1278']);?></td>
<td><?php inspic_dj("massagerooms","mr",1276,"ivy_on_johny","Ivy on Johny","Ivy_Johny",$new_array['1276']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1274,"martin_on_coco","Martin on Coco","Martin_Coco",$new_array['1274']);?></td>
<td><?php inspic_dj("massagerooms","mr",1272,"ivy_on_jason","Ivy on Jason","Ivy_Jason",$new_array['1272']);?></td>
<td><?php inspic_dj("massagerooms","mr",1270,"steve_on_lolli","Steve on Lolli","Steve_Lolli",$new_array['1270']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1268,"martin_on_lara","Martin on Lara","Martin_Lara",$new_array['1268']);?></td>
<td><?php inspic_dj("massagerooms","mr",1266,"ivy_on_rudy","Ivy on Rudy","Ivy_Rudy",$new_array['1266']);?></td>
<td><?php inspic_dj("massagerooms","mr",1264,"steve_on_yenna","Steve on Yenna","Steve_Yenna",$new_array['1264']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1262,"steve_and_martin_on_angel","Steve and Martin on Angel","Steve_Martin_Angel",$new_array['1262']);?></td>
<td><?php inspic_dj("massagerooms","mr",1260,"steve_on_emily","Steve on Emily","Steve_Emily",$new_array['1260']);?></td>
<td><?php inspic_dj("massagerooms","mr",1258,"steve_on_alex","Steve on Alex","Steve_Alex",$new_array['1258']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1256,"uma_on_martin_and_steve","Uma on Martin and Steve","Steve_Uma_Martin",$new_array['1256']);?></td>
<td><?php inspic_dj("massagerooms","mr",1254,"ivy_on_lance","Ivy on Lance","Ivy_Lance",$new_array['1254']);?></td>
<td><?php inspic_dj("massagerooms","mr",1252,"gina_on_vica","Gina on Vica","Gina_Vica",$new_array['1252']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1250,"gina_on_lily","Gina on Lily","Gina_Lily",$new_array['1250']);?></td>
<td><?php inspic_dj("massagerooms","mr",1248,"lola_on_silvie","Lola on Silvie","Lola_Silvie",$new_array['1248']);?></td>
<td><?php inspic_dj("massagerooms","mr",1246,"ivy_on_joshua","Ivy on Joshua","Ivy_Joshua",$new_array['1246']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1244,"lola_on_keira","Lola on Keira","Lola_Keira",$new_array['1244']);?></td>
<td><?php inspic_dj("massagerooms","mr",1242,"gina_on_katy","Gina on Katy","Gina_Katy",$new_array['1242']);?></td>
<td><?php inspic_dj("massagerooms","mr",1240,"ivy_on_marc","Ivy on Marc","Ivy_Marc",$new_array['1240']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1238,"gina_on_bara","Gina on Bara","Gina_Bara",$new_array['1238']);?></td>
<td><?php inspic_dj("massagerooms","mr",1236,"george_on_kat","George on Kat","George_Kat",$new_array['1236']);?></td>
<td><?php inspic_dj("massagerooms","mr",1234,"gina_on_vanessa","Gina on Vanessa","Gina_Vanessa",$new_array['1234']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1232,"george_on_christine","George on Christine","George_Christine",$new_array['1232']);?></td>
<td><?php inspic_dj("massagerooms","mr",1230,"gina_on_elis","Gina on Elis","Gina_Elis",$new_array['1230']);?></td>
<td><?php inspic_dj("massagerooms","mr",1228,"george_on_lilia","George on Lilia","George_Lilia",$new_array['1228']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1226,"gina_on_natali","Gina on Natali","Gina_Natali",$new_array['1226']);?></td>
<td><?php inspic_dj("massagerooms","mr",1224,"gina_on_tess","Gina on Tess","Gina_Tess",$new_array['1224']);?></td>
<td><?php inspic_dj("massagerooms","mr",1222,"tracy_on_lorena","Tracy on Lorena","TracyLindsay_Lorena",$new_array['1222']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1220,"gina_on_daisy","Gina on Daisy","Gina_Daisy",$new_array['1220']);?></td>
<td><?php inspic_dj("massagerooms","mr",1218,"lola_on_jess_west","Lola on Jess West","Lola_Jess",$new_array['1218']);?></td>
<td><?php inspic_dj("massagerooms","mr",1216,"gina_on_emyli","Gina on Emyli","Gina_Emyli",$new_array['1216']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1214,"luci_li_on_mike_angelo","Luci Li on Mike Angelo","LucyLi_MikeAngelo",$new_array['1214']);?></td>
<td><?php inspic_dj("massagerooms","mr",1212,"gina_on_lorena","Gina on Lorena","Gina_Lorena",$new_array['1212']);?></td>
<td><?php inspic_dj("massagerooms","mr",1210,"tracy_on_martina","Tracy on Martina","TracyLindsay_Martina",$new_array['1210']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1208,"luci_li_on_marek","Luci Li on Marek","LucyLi_Marek",$new_array['1208']);?></td>
<td><?php inspic_dj("massagerooms","mr",1206,"tracy_on_eve_angel","Tracy on Eve Angel","TracyLindsay_EveAngel",$new_array['1206']);?></td>
<td><?php inspic_dj("massagerooms","mr",1204,"tracy_on_brandy","Tracy on Brandy","TracyLindsay_Brandy",$new_array['1204']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1202,"george_on_denise","George on Denise","George_Denise",$new_array['1202']);?></td>
<td><?php inspic_dj("massagerooms","mr",1200,"tracy_on_lucia","Tracy on Lucia","TracyLindsay_Lucia",$new_array['1200']);?></td>
<td><?php inspic_dj("massagerooms","mr",1198,"george_on_ria","George on Ria","Ria_George",$new_array['1198']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1196,"tracy_on_gina","Tracy on Gina","TracyLindsay_Gina",$new_array['1196']);?></td>
<td><?php inspic_dj("massagerooms","mr",1194,"george_on_gabriela","George on Gabriela","Gabriela_George",$new_array['1194']);?></td>
<td><?php inspic_dj("massagerooms","mr",1192,"tracy_on_eufrat","Tracy on Eufrat","TracyLindsay_Eufrat",$new_array['1192']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1190,"george_on_angel","George on Angel","Angel_George",$new_array['1190']);?></td>
<td><?php inspic_dj("massagerooms","mr",1188,"tracy_on_vanessa","Tracy on Vanessa","Vanessa_TracyLindsay",$new_array['1188']);?></td>
<td><?php inspic_dj("massagerooms","mr",1186,"tracy_on_holly","Tracy on Holly","Holly_TracyLindsay",$new_array['1186']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1184,"george_on_katy","George on Katy","Katy_George",$new_array['1184']);?></td>
<td><?php inspic_dj("massagerooms","mr",1182,"lucy_li_on_steve","Lucy Li on Steve","LucyLi_Steve",$new_array['1182']);?></td>
<td><?php inspic_dj("massagerooms","mr",1180,"tracy_on_jenny","Tracy on Jenny","Jenny_TracyLindsay",$new_array['1180']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1178,"lucy_li_on_jay","Lucy Li on Jay","LucyLi_Jay",$new_array['1178']);?></td>
<td><?php inspic_dj("massagerooms","mr",1176,"tracy_on_alyssa","Tracy on Alyssa","Alyssa_TracyLindsay",$new_array['1176']);?></td>
<td><?php inspic_dj("massagerooms","mr",1174,"mona_on_loreen","Mona on Loreen","Loreen_Mona",$new_array['1174']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1172,"tracy_on_gina","Tracy on Gina","Tracy_Gina",$new_array['1172']);?></td>
<td><?php inspic_dj("massagerooms","mr",1170,"george_on_morgan","George on Morgan","Morgan_George",$new_array['1170']);?></td>
<td><?php inspic_dj("massagerooms","mr",1168,"lola_on_penelope","Lola on Penelope","Penelope_Lola",$new_array['1168']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1166,"mona_on_steve","Mona on Steve","Mona_Steve",$new_array['1166']);?></td>
<td><?php inspic_dj("massagerooms","mr",1164,"tracy_on_eufrat","Tracy on Eufrat","Tracy_Eufrat",$new_array['1164']);?></td>
<td><?php inspic_dj("massagerooms","mr",1162,"george_on_ivy","George on Ivy","Ivy_George",$new_array['1162']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1160,"lola_on_tracy","Lola on Tracy","Tracy_Lola",$new_array['1160']);?></td>
<td><?php inspic_dj("massagerooms","mr",1158,"george_on_lucy_li","George on Lucy Li","LucyLi_George",$new_array['1158']);?></td>
<td><?php inspic_dj("massagerooms","mr",1156,"mona_on_tracy","Mona on Tracy","Tracy_Mona",$new_array['1156']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1154,"george_on_linda","George on Linda","Linda_George",$new_array['1154']);?></td>
<td><?php inspic_dj("massagerooms","mr",1152,"lola_on_tea","Lola on Tea","Tea_Lola",$new_array['1152']);?></td>
<td><?php inspic_dj("massagerooms","mr",1150,"ivy_on_jay","Ivy on Jay","Ivy_Jay",$new_array['1150']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1148,"lola_on_vera","Lola on Vera","Vera_Lola",$new_array['1148']);?></td>
<td><?php inspic_dj("massagerooms","mr",1146,"mona_on_thomas","Mona on Thomas","Thomas_Mona",$new_array['1146']);?></td>
<td><?php inspic_dj("massagerooms","mr",1144,"mona_on_steve","Mona on Steve","Mona_Steve",$new_array['1144']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1142,"uma_and_mona_on_george","Uma and Mona on George","Mona_Uma_George",$new_array['1142']);?></td>
<td><?php inspic_dj("massagerooms","mr",1140,"mona_on_thomas","Mona on Thomas","Mona_Thomas",$new_array['1140']);?></td>
<td><?php inspic_dj("massagerooms","mr",1138,"george_on_violette","George on Violette","Violette_George",$new_array['1138']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1136,"lola_on_mona","Lola on Mona","Mona_Lola",$new_array['1136']);?></td>
<td><?php inspic_dj("massagerooms","mr",1134,"george_on_billie","George on Billie","Billie_George",$new_array['1134']);?></td>
<td><?php inspic_dj("massagerooms","mr",1132,"lola_on_kari","Lola on Kari","Kari_Lola",$new_array['1132']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1130,"george_on_sylvia","George on Sylvia","Sylvia_George",$new_array['1130']);?></td>
<td><?php inspic_dj("massagerooms","mr",1128,"uma_and_ken_on_gina","Uma and Ken on Gina","Ken_Uma_Gina",$new_array['1128']);?></td>
<td><?php inspic_dj("massagerooms","mr",1126,"george_on_silvie","George on Silvie","Silvie_George",$new_array['1126']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1124,"lola_on_billie","Lola on Billie","Billie_Lola",$new_array['1124']);?></td>
<td><?php inspic_dj("massagerooms","mr",1122,"uma_on_martin","Uma on Martin","Martin_Uma",$new_array['1122']);?></td>
<td><?php inspic_dj("massagerooms","mr",1120,"george_on_samantha","George on Samantha","Samantha_George",$new_array['1120']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1118,"uma_on_zara","Uma on Zara","Zara_Uma",$new_array['1118']);?></td>
<td><?php inspic_dj("massagerooms","mr",1116,"ken_on_rachel","Ken on Rachel","Rachel_Ken",$new_array['1116']);?></td>
<td><?php inspic_dj("massagerooms","mr",1114,"george_and_ken_on_kelly","George and Ken on Kelly","Kelly_Ken_George",$new_array['1114']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1112,"uma_on_micha","Uma on Micha","Micha_Uma",$new_array['1112']);?></td>
<td><?php inspic_dj("massagerooms","mr",1110,"george_on_pink","George on Pink","Pink_George",$new_array['1110']);?></td>
<td><?php inspic_dj("massagerooms","mr",1108,"lola_on_eileen","Lola on Eileen","Eileen_Lola",$new_array['1108']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1106,"george_on_violette","George on Violette","Violette_George",$new_array['1106']);?></td>
<td><?php inspic_dj("massagerooms","mr",1104,"lola_on_eve","Lola on Eve","Eve_Lola",$new_array['1104']);?></td>
<td><?php inspic_dj("massagerooms","mr",1102,"lola_and_uma_on_tommy","Lola and Uma on Tommy","Tommy_Uma_Lola",$new_array['1102']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1100,"george_on_jenny","George on Jenny","Jenny_George",$new_array['1100']);?></td>
<td><?php inspic_dj("massagerooms","mr",1098,"uma_on_ava","Uma on Ava","Ava_Uma",$new_array['1098']);?></td>
<td><?php inspic_dj("massagerooms","mr",1096,"lola_and_uma_on_zuzana","Lola and Uma on Zuzana","Uma_Zuzana_Lola",$new_array['1096']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1094,"george_on_silvia","George on Silvia","Silvia_George",$new_array['1094']);?></td>
<td><?php inspic_dj("massagerooms","mr",1092,"lola_on_eve","Lola on Eve","Eve_Lola",$new_array['1092']);?></td>
<td><?php inspic_dj("massagerooms","mr",1090,"george_and_uma_on_zuzana","George and Uma on Zuzana","Uma_Zuzana_George",$new_array['1090']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1088,"lola_on_lily","Lola on Lily","Lily_Lola",$new_array['1088']);?></td>
<td><?php inspic_dj("massagerooms","mr",1086,"george_on_zuzana","George on Zuzana","Zuzana_George",$new_array['1086']);?></td>
<td><?php inspic_dj("massagerooms","mr",1084,"george_on_karol","George on Karol","Karol_George",$new_array['1084']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1082,"uma_on_julian","Uma on Julian","Julian_Uma",$new_array['1082']);?></td>
<td><?php inspic_dj("massagerooms","mr",1080,"uma_on_george","Uma on George","Uma_George",$new_array['1080']);?></td>
<td><?php inspic_dj("massagerooms","mr",1078,"uma_on_roy","Uma on Roy","Roy_Uma",$new_array['1078']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1076,"uma_on_richard","Uma on Richard","Richard_Uma",$new_array['1076']);?></td>
<td><?php inspic_dj("massagerooms","mr",1074,"lola_on_sandy","Lola on Sandy","Sandy_Lola",$new_array['1074']);?></td>
<td><?php inspic_dj("massagerooms","mr",1072,"lola_on_tommy","Lola on Tommy","Tommy_Lola",$new_array['1072']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1070,"victoria_b_on_ian","Victoria B on Ian","Ian_VictoriaB",$new_array['1070']);?></td>
<td><?php inspic_dj("massagerooms","mr",1068,"george_on_gina","George on Gina","Gina_George",$new_array['1068']);?></td>
<td><?php inspic_dj("massagerooms","mr",1066,"george_on_nathaly","George on Nathaly","Nathaly_George",$new_array['1066']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1064,"uma_on_ian","Uma on Ian","Uma_Ian",$new_array['1064']);?></td>
<td><?php inspic_dj("massagerooms","mr",1062,"victoria_on_dane","Victoria on Dane","Dane_VictoriaB",$new_array['1062']);?></td>
<td><?php inspic_dj("massagerooms","mr",1060,"george_on_bella","George on Bella","Bella_George",$new_array['1060']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1058,"rita_on_jay","Rita on Jay","Jay_Rita",$new_array['1058']);?></td>
<td><?php inspic_dj("massagerooms","mr",1056,"lola_on_jessie","Lola on Jessie","Jessie_Lola",$new_array['1056']);?></td>
<td><?php inspic_dj("massagerooms","mr",1054,"george_on_gina","George on Gina","Gina_George",$new_array['1054']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1052,"rita_on_patrick","Rita on Patrick","Patrick_Rita",$new_array['1052']);?></td>
<td><?php inspic_dj("massagerooms","mr",1050,"lola_on_suzie","Lola on Suzie","Suzie_Lola",$new_array['1050']);?></td>
<td><?php inspic_dj("massagerooms","mr",1048,"george_on_kristine","George on Kristine","Kristine_George",$new_array['1048']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1044,"lola_on_ivy","Lola on Ivy","Ivy_Lola",$new_array['1044']);?></td>
<td><?php inspic_dj("massagerooms","mr",1042,"george_on_adele","George on Adele","Adele_George",$new_array['1042']);?></td>
<td><?php inspic_dj("massagerooms","mr",1040,"rita_on_steve","Rita on Steve","Steve_Rita",$new_array['1040']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1038,"lola_on_angel","Lola on Angel","Angel_Lola",$new_array['1038']);?></td>
<td><?php inspic_dj("massagerooms","mr",1036,"george_on_ivy","George on Ivy","Ivy_George",$new_array['1036']);?></td>
<td><?php inspic_dj("massagerooms","mr",1034,"rita_on_thomas","Rita on Thomas","Thomas_Rita",$new_array['1034']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1032,"lola_on_eufrat","Lola on Eufrat","Eufrat_Lola",$new_array['1032']);?></td>
<td><?php inspic_dj("massagerooms","mr",1030,"george_on_enza","George on Enza","Enza_George",$new_array['1030']);?></td>
<td><?php inspic_dj("massagerooms","mr",1028,"rita_on_ned","Rita on Ned","Ned_Rita",$new_array['1028']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1026,"lola_on_bailey","Lola on Bailey","Bailey_Lola",$new_array['1026']);?></td>
<td><?php inspic_dj("massagerooms","mr",1024,"george_on_haven","George on Haven","Haven_George",$new_array['1024']);?></td>
<td><?php inspic_dj("massagerooms","mr",1022,"rita_on_steve","Rita on Steve","Steve_Rita",$new_array['1022']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1020,"lola_on_alex","Lola on Alex","Alex_Lola",$new_array['1020']);?></td>
<td><?php inspic_dj("massagerooms","mr",1018,"george_on_angel","George on Angel","Angel_George",$new_array['1018']);?></td>
<td><?php inspic_dj("massagerooms","mr",1016,"rita_on_thomas","Rita on Thomas","Thomas_Rita",$new_array['1016']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1014,"lola_on_ally","Lola on Ally","Ally_Lola",$new_array['1014']);?></td>
<td><?php inspic_dj("massagerooms","mr",1012,"george_on_samantha","George on Samantha","Samantha_George",$new_array['1012']);?></td>
<td><?php inspic_dj("massagerooms","mr",1010,"rita_on_patrick","Rita on Patrick","Patrick_Rita",$new_array['1010']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1008,"lola_on_zuzana","Lola on Zuzana","Zuzana_Lola",$new_array['1008']);?></td>
<td><?php inspic_dj("massagerooms","mr",1006,"george_on_alex","George on Alex","Alex_George",$new_array['1006']);?></td>
<td><?php inspic_dj("massagerooms","mr",1004,"rita_on_libor","Rita on Libor","Libor_Rita",$new_array['1004']);?></td>
</tr>
<tr>
<tr>
<td><?php inspic_dj("massagerooms","mr",1002,"lola_on_tess","Lola on Tess","Tess_Lola",$new_array['1002']);?></td>
</table>
<?php $dur = microtime(true) - $time1;
echo "<br /><h3>Duration $dur</h3>";
?>
</body>
</html>
