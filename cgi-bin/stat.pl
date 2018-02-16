#!/usr/bin/perl
#########################################################################
#  Access Stats v1.12                                                   #
#  Copyright (c)2000 Chi Kien Uong                                      #
#  URL: http://www.proxy2.de                                            #
#                                                                       #
# This Software is distributed under the GNU General Public             #
# License. For more details see license.txt                             #
#                                                                       #
#########################################################################

# url to script
$cgiurl = "http://sanrafaellate.com.ar/cgi-bin/stat.pl";

# url to the image files without trailing "/"
$gif_url = "http://sanrafaellate.com.ar/advstats/gif";

# path to the log files from the server root without trailing "/" (chmoded to 777 (drwxrwxrwx))
$base_dir = "../advstats/logfiles";

# url to the log files without trailing "/"
$log_url = "http://sanrafaellate.com.ar/advstats/logfiles";

# minimum visits before to show in list
$host_min = 3;
$browser_min = 1;
$os_min = 1;
$referer_min = 1;

# show visits from all countries
$show_ccodes = "yes";
$show_max = 15; # only valid if $show_ccodes="no"

# log file extension
$log_file_ext = "txt";

# misc configurations
$font_size = "8pt"; # font size
$table_width = 600; # table width
$max_bar_length = 300; # bar lenght of host,os,browser,etc. in relation to $table_width
$max_bar_day_length = 170; # bar lenght of day should be set in relation to $table_width
$hits_by_weekday = "yes";
$top_countries =   "yes";
$top_browsers =    "yes";
$top_os =          "yes";
$top_host =        "yes";
# Done
###########

%CCodes = (
  ad => "Andorra",
  ae => "United Arab Emirates",
  af => "Afghanistan",
  ag => "Antigua and Barbuda",
  ai => "Anguilla",
  al => "Albania",
  am => "Armenia",
  an => "Netherlands Antilles",
  ao => "Angola",
  aq => "Antarctica",
  ar => "Argentina",
  as => "American Samoa",
  at => "Austria",
  au => "Australia",
  aw => "Aruba",
  az => "Azerbaijan",
  ba => "Bosnia Herzegovina",
  bb => "Barbados",
  bd => "Bangladesh",
  be => "Belgium",
  bf => "Burkina Faso",
  bg => "Bulgaria",
  bh => "Bahrain",
  bi => "Burundi",
  bj => "Benin",
  bm => "Bermuda",
  bn => "Brunei Darussalam",
  bo => "Bolivia",
  br => "Brazil",
  bs => "Bahamas",
  bt => "Bhutan",
  bv => "Bouvet Island",
  bw => "Botswana",
  by => "Belarus",
  bz => "Belize",
  ca => "Canada",
  cc => "Cocos (Keeling) Islands",
  cf => "Central African Republic",
  cg => "Congo",
  ch => "Switzerland",
  ci => "Cote DIvoire",
  ck => "Cook Islands",
  cl => "Chile",
  cm => "Cameroon",
  cn => "China",
  co => "Colombia",
  cr => "Costa Rica",
  cs => "Czechoslovakia",
  cu => "Cuba",
  cv => "Cape Verde",
  cx => "Christmas Island",
  cy => "Cyprus",
  cz => "Czech Republic",
  de => "Germany",
  dj => "Djibouti",
  dk => "Denmark",
  dm => "Dominica",
  do => "Dominican Republic",
  dz => "Algeria",
  ec => "Ecuador",
  ee => "Estonia",
  eg => "Egypt",
  eh => "Western Sahara",
  er => "Eritrea",
  es => "Spain",
  et => "Ethiopia",
  fi => "Finland",
  fj => "Fiji",
  fk => "Falkland Islands (Malvinas)",
  fm => "Micronesia",
  fo => "Faroe Islands",
  fr => "France",
  fx => "France (Metropolitan)",
  ga => "Gabon",
  gb => "Great Britain (UK)",
  gd => "Grenada",
  ge => "Georgia",
  gf => "French Guiana",
  gh => "Ghana",
  gi => "Gibraltar",
  gl => "Greenland",
  gm => "Gambia",
  gn => "Guinea",
  gp => "Guadeloupe",
  gq => "Equatorial Guinea",
  gr => "Greece",
  gs => "S. Georgia and S. Sandwich Islands",
  gt => "Guatemala",
  gu => "Guam",
  gw => "Guinea-Bissau",
  gy => "Guyana",
  hk => "Hong Kong",
  hm => "Heard and McDonald Islands",
  hn => "Honduras",
  hr => "Croatia (Hrvatska)",
  ht => "Haiti",
  hu => "Hungary",
  id => "Indonesia",
  ie => "Ireland",
  il => "Israel",
  in => "India",
  io => "British Indian Ocean Territory",
  iq => "Iraq",
  ir => "Iran",
  is => "Iceland",
  it => "Italy",
  jm => "Jamaica",
  jo => "Jordan",
  jp => "Japan",
  ke => "Kenya",
  kg => "Kyrgyzstan",
  kh => "Cambodia",
  ki => "Kiribati",
  km => "Comoros",
  kn => "Saint Kitts and Nevis",
  kp => "North Korea",
  kr => "South Korea",
  kw => "Kuwait",
  ky => "Cayman Islands",
  kz => "Kazakhstan",
  la => "Laos",
  lb => "Lebanon",
  lc => "Saint Lucia",
  li => "Liechtenstein",
  lk => "Sri Lanka",
  lr => "Liberia",
  ls => "Lesotho",
  lt => "Lithuania",
  lu => "Luxembourg",
  lv => "Latvia",
  ly => "Libya",
  ma => "Morocco",
  mc => "Monaco",
  md => "Moldova",
  mg => "Madagascar",
  mh => "Marshall Islands",
  mk => "Macedonia",
  ml => "Mali",
  mm => "Myanmar",
  mn => "Mongolia",
  mo => "Macau",
  mp => "Northern Mariana Islands",
  mq => "Martinique",
  mr => "Mauritania",
  ms => "Montserrat",
  mt => "Malta",
  mu => "Mauritius",
  mv => "Maldives",
  mw => "Malawi",
  mx => "Mexico",
  my => "Malaysia",
  mz => "Mozambique",
  na => "Namibia",
  nc => "New Caledonia",
  ne => "Niger",
  nf => "Norfolk Island",
  ng => "Nigeria",
  ni => "Nicaragua",
  nl => "Netherlands",
  no => "Norway",
  np => "Nepal",
  nr => "Nauru",
  nt => "Neutral Zone",
  nu => "Niue",
  nz => "New Zealand (Aotearoa)",
  om => "Oman",
  pa => "Panama",
  pe => "Peru",
  pf => "French Polynesia",
  pg => "Papua New Guinea",
  ph => "Philippines",
  pk => "Pakistan",
  pl => "Poland",
  pm => "St. Pierre and Miquelon",
  pn => "Pitcairn",
  pr => "Puerto Rico",
  pt => "Portugal",
  pw => "Palau",
  py => "Paraguay",
  qa => "Qatar",
  re => "Reunion",
  ro => "Romania",
  ru => "Russian Federation",
  rw => "Rwanda",
  sa => "Saudi Arabia",
  sb => "Solomon Islands",
  sc => "Seychelles",
  sd => "Sudan",
  se => "Sweden",
  sg => "Singapore",
  sh => "St. Helena",
  si => "Slovenia",
  sj => "Svalbard and Jan Mayen Islands",
  sk => "Slovak Republic",
  sl => "Sierra Leone",
  sm => "San Marino",
  sn => "Senegal",
  so => "Somalia",
  sr => "Suriname",
  st => "Sao Tome and Principe",
  su => "USSR (Former)",
  sv => "El Salvador",
  sy => "Syria",
  sz => "Swaziland",
  tc => "Turks and Caicos Islands",
  td => "Chad",
  tf => "French Southern Territories",
  tg => "Togo",
  th => "Thailand",
  tj => "Tajikistan",
  tk => "Tokelau",
  tm => "Turkmenistan",
  tn => "Tunisia",
  to => "Tonga",
  tp => "East Timor",
  tr => "Turkey",
  tt => "Trinidad and Tobago",
  tv => "Tuvalu",
  tw => "Taiwan",
  tz => "Tanzania",
  ua => "Ukraine",
  ug => "Uganda",
  uk => "United Kingdom",
  um => "US Minor Outlying Islands",
  us => "United States",
  uy => "Uruguay",
  uz => "Uzbekistan",
  va => "Vatican City State (Holy See)",
  vc => "Saint Vincent and the Grenadines",
  ve => "Venezuela",
  vg => "Virgin Islands (British)",
  vi => "Virgin Islands (US)",
  vn => "Vietnam",
  vu => "Vanuatu",
  wf => "Wallis and Futuna Islands",
  ws => "Samoa",
  ye => "Yemen",
  yt => "Mayotte",
  yu => "Yugoslavia",
  za => "South Africa",
  zm => "Zambia",
  zr => "Zaire",
  zw => "Zimbabwe",
  com => "US Commercial",
  edu => "US Educational",
  gov => "US Government",
  int => "International",
  mil => "US Military",
  net => "Network",
  org => "Non-Profit Organization",
  arpa => "Old-Style Arpanet",
  nato => "NATO Field"
);

@gif_array = ("purple","orange","green","pink","blue","yellow","red","gold","darkgreen","aqua");
$|++;
&parse_form;
if ($FORM{'action'} eq "eval" && $FORM{'id'} ne '') {
	&html_header;
	&parse_log("$FORM{'id'}");
	&topbar;
	&days;
	&http_ref;
	&hours;
	&html_week if ($hits_by_weekday eq "yes");
	&html_browser if ($top_browsers eq "yes");
	&os_system if ($top_os eq "yes");
	&countries if ($top_countries eq "yes");
	&html_remote_host if ($top_host eq "yes");
	print " </table>\n   </div>\n";
	print "<div align=\"center\"><font face=\"Arial\" size=1>This script can be found at <a href=\"http://www.proxy2.de\" target=\"_blank\"><font color=\"#000000\">http://www.proxy2.de</font></a>\n";
        print "  </font></div>\n</center>\n</body>\n</html>\n";
}
else {
	&show_files;
}
exit (0);

sub parse_form {

if ($ENV{'REQUEST_METHOD'} eq "GET") {
        $buffer = $ENV{'QUERY_STRING'};
}
else {
        read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
}
@pairs = split(/&/, $buffer);
foreach $pair (@pairs) {
      ($name, $value) = split(/=/, $pair);
      $name =~ tr/+/ /;
      $name =~ s/%([a-f0-9]{2})/pack("C", hex($1))/egi;
      $value =~ tr/+/ /;
      $value =~ s/%([a-f0-9]{2})/pack("C", hex($1))/egi;
      $FORM{$name} = $value;
  }
}

sub show_files {
	&html_header;
	print "</div>\n</center>\n</body>\n</html>\n";
}

sub parse_log {

$log_file = "$base_dir/$_[0]";
open(DATA,"$log_file") || &message('Cannot Open Log File!');
@lines = <DATA>;
close(DATA);
$total = @lines;
foreach $line (@lines) {
  if ($line =~ /(.*) - (.*) - \"(.*)\" - \"(.*)\"/) {
    $date = $1;
    ($weekday,$day,$time) = split(/ /,$date);
    ($hour,$minute) = split(/:/,$time);
    ($temp,$month,$year) = split (/-/,$day);
    $host_name = $2;
    $user_agent = $3;
    $referer = $4;
    $day = "$day "."$weekday";
    $referer{$referer}++;
    $day{$day}++;
    $week_days{$weekday}++;
    $hour{$hour}++;
    if ($top_countries eq "yes" || $top_host eq "yes") {
      if ($host_name =~ /\.([_a-z0-9-]*\.[a-z]{2,4}$)/i) {
        $remote{$1}++;
        $host_name =~ s/(.*)\.// ;
        $host_name =~ tr/[A-Z]/[a-z]/;
        $domain{$host_name}++;
        $total_doms += 1;
      }
      else {
        $remote{'<b>IP only</b>'}++;
      }
    }
    push(@USER_AGENT, $user_agent);
  }
}
$total_agent = @USER_AGENT;
if ($top_os eq "yes") {
  foreach $user_agent (@USER_AGENT) {
	if ($user_agent =~ /MSIE/i) {
   		if ($user_agent =~ /Windows 98/i) {
   			$os{'Windows 98'}++;
   			next;
   		}
   		elsif ($user_agent =~ /Windows NT/i) {
   			$os{'Windows NT'}++;
   			next;
   		}
   		elsif ($user_agent =~ /Windows 95/i) {
   			$os{'Windows 95'}++;
   			next;
   		}
   		elsif ($user_agent =~ /Mac_PowerPC/i || $user_agent =~ /Macintosh/i) {
   			$os{'Macintosh'}++;
   			next;
   		}
   	}
   	elsif  ($user_agent =~ /Win98/i || $user_agent =~ /Windows 98/i) {
   		$os{'Windows 98'}++;
   		next;
   	}
   	elsif  ($user_agent =~ /WinNT/i || $user_agent =~ /Windows NT/i) {
   		$os{'Windows NT'}++;
   		next;
   	}
   	elsif  ($user_agent =~ /Win95/i || $user_agent =~ /Windows 95/i) {
   		$os{'Windows 95'}++;
   		next;
   	}
   	elsif ($user_agent =~ /Mac_PowerPC/i || $user_agent =~ /Macintosh/i) {
   		$os{'Macintosh'}++;
   		next;
   	}
   	elsif  ($user_agent =~ /X11/i) {
   		if  ($user_agent =~ /Linux/i) {
   			$os{'Linux'}++;
   			next;
   		}
 	  	elsif  ($user_agent =~ /SunOS/i) {
 	  		$os{'SunOS'}++;
 	  		next;
	   	}
 	  	elsif  ($user_agent =~ /FreeBSD/i) {
	   		$os{'FreeBSD'}++;
	   		next;
	   	}
	   	elsif  ($user_agent =~ /BSD/i) {
	   		$os{'BSD'}++;
	   		next;
   		}
	   	else {
	   		$os{'UNIX Clone'}++;
	   		next;
	   	}
	}
   	elsif  ($user_agent =~ /Win16/i || $user_agent =~ /Windows 3\.1/i) {
   		$os{'Windows 3.1'}++;
   		next;
   	}
   	elsif  ($user_agent =~ /OS\/2/i) {
   		$os{'OS/2'}++;
   		next;
   	}
   	elsif  ($user_agent =~ /Amiga/i) {
   		$os{'Amiga'}++;
   		next;
   	}
   	else {
   		$os{'Unknown Platform'}++;
   		next;
   	}
  }
}
if ($top_browsers eq "yes") {
 foreach $agent (@USER_AGENT) {
   if ($agent =~ /Opera/i) {
   	$browser{'Opera'}++;
	next;
   }
   elsif ($agent =~ /MSIE/i) {
   	if ($agent =~ /AltaVista/i) {
   		$browser{'AltaVista'}++;
		next;
	}
	elsif ($agent =~ /Lycos/i) {
   		$browser{'Lycos'}++;
		next;
	}
	elsif ($agent =~ /MSIE (\d)/i) {
		$browser{"Internet Explorer $1"}++;
		next;
	}
	else {
		$browser{$agent}++;
		next;
	}
    }
    elsif ($agent =~ /Mozilla/i) {
	if ($agent =~ /Mozilla\/5/i || $agent =~ /Mozilla 5/i) {
		$browser{'Netscape Navigator 6'}++;
		next;
	}
	elsif ($agent =~ /Mozilla\/(\d)/i || $agent =~ /Mozilla (\d)/i) {
		$browser{"Netscape Navigator $1"}++;
		next;
	}
	else {
		$browser{$agent}++;
		next;
	}
     }
     elsif ($agent ne "") {
     	$browser{$agent}++;
     	next;
     }
     else {
     	$browser{'NO USER AGENT'}++;
     }
 }
}
foreach $count (keys %day) {
  $total_days++;
}
$hits_per_day = sprintf ("%.2f",($total/$total_days));
$hits_per_hour = sprintf ("%.2f",($total/$total_days/24));
}

sub message {
	print "Content-type: text/html\n\n";
	print "$_[0]";
	exit (0);
}

sub html_header {
print "Content-type: text/html\n\n";
print <<Header ;
<html>
<head>
<title>Access Stats</title>
<style type="text/css">
<!--
A:visited {text-decoration: none;; color: #000000}
A:link {text-decoration: none;; color: #000000}
A:active {text-decoration: none;; color: #000000}
A:hover {text-decoration: underline; color:red;}
td {  font-family: Arial, Helvetica, sans-serif; font-size: $font_size}
tt {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13pt; font-weight: bold}
-->
</style>
</head>
<body bgcolor="#FFFFFF">
<center>
<table width="$table_width" height="50" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr>
    <td><tt>Access Stats 1.12</tt></td>
  <tr>
</table>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="3" bgcolor="#FFFFFF" align="center">
    <tr bgcolor="#C5E2E2">
      <td width="50%"><b>Logfile</b></td>
      <td width="50%">&nbsp;</td>
    </tr>
Header
opendir(HOMEDIR, "$base_dir");
@filename = readdir(HOMEDIR);
closedir(HOMEDIR);
foreach $logfile (@filename) {
	if ($logfile =~ /(.*)\.$log_file_ext$/) {
		push (@new_array,$logfile);
	}
}
foreach $logfile (sort @new_array) {
print "    <tr>\n      <td width=50%><img src=\"$gif_url/arrow-3.gif\" width=11 height=11 border=0><a href=\"$log_url/$logfile\" target=\"_blank\">$logfile</a></td>\n";
print "      <td width=50%>\n        <div align=right><a href=\"$cgiurl?action=eval&id=$logfile\">evaluate</a>\n      <img src=\"$gif_url/hook.gif\" width=14 height=11></div>\n";
print "      </td>\n    </tr>\n";
}
print "  </table>\n   <br>\n";
}

sub sort_host {
	if ($remote{$a} > $remote{$b}) {
                $retval = -1;
        }
        elsif ($remote{$a} == $remote{$b}) {
        	$retval = uc($a) cmp uc($b);
        }
        else {
                $retval = 1;
        }
        $retval;
}

sub sort_ref {
	if ($referer{$a} > $referer{$b}) {
                $retval = -1;
        }
        elsif ($referer{$a} == $referer{$b}) {
        	$retval = uc($a) cmp uc($b);
        }
        else {
                $retval = 1;
        }
        $retval;
}

sub topbar {
print <<Header ;
  <table border="0" cellspacing="1" cellpadding="4" width="$table_width" height="25" align="center">
    <tr bgcolor="#E6E6FF">
      <td bgcolor="#E6E6FF">
        <div align="center">[ <a href="#day">Visits by day</a> ]</div>
      </td>
      <td>
        <div align="center">[ <a href="#week-day">Visits by week-day</a> ]</div>
      </td>
      <td>
        <div align="center">[ <a href="#referer">Referer</a> ]</div>
      </td>
      <td>
        <div align="center">[ <a href="#hour">Visits by hour</a> ]</div>
      </td>
      <td>
        <div align="center">[ <a href="#domain">Top Countries</a> ]</div>
      </td>
      <td>
        <div align="center">[ <a href="#browser">Browsers</a> ]</div>
      </td>
      <td>
        <div align="center">[ <a href="#os">OS</a> ]</div>
      </td>
      <td>
        <div align="center">[ <a href="#host">Host</a> ]</div>
      </td>
    </tr>
  </table><br>
  <img src="$gif_url/black.gif" width="$table_width" height="1">
  <br>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <td width="24%"><b>Month</b></td>
      <td colspan="2"><font color="#CC0000"><b>$month $year</b></font></td>
    </tr>
    <tr>
      <td width="24%"><b>Total Days</b></td>
      <td colspan="2"><font color="#CC0000"><b>$total_days</b></font></td>
    </tr>
    <tr>
      <td width="24%"><b>Total Visits</b></td>
      <td colspan="2"><font color="#CC0000"><b>$total</b></font></td>
    </tr>
    <tr>
      <td width="24%"><b>Avarage visits per day</b></td>
      <td colspan="2"><font color="#CC0000"><b>$hits_per_day</b></font></td>
    </tr>
    <tr>
      <td width="24%"><b>Avarage visits per hour</b></td>
      <td colspan="2"><font color="#CC0000"><b>$hits_per_hour</b></font></td>
    </tr>
  </table>
  <img src="$gif_url/black.gif" width="$table_width" height="1">
Header
}

sub days {
print <<Header ;
  <b><br><br><font face="Arial, Helvetica, sans-serif" size=3>
  Visits by day<a name="day"></a><br>
  <br>
  </font></b>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="2" align="center">
    <tr>
      <TD width="7%" bgcolor="#DDDDE8"><B>Day</B></TD>
      <TD width="17%" bgcolor="#DDDDE8"><B>Date</B></TD>
      <TD width="7%" bgcolor="#DDDDE8"><B>Visits</B></TD>
      <TD width="69%" bgcolor="#DDDDE8">&nbsp;</TD>
    </tr>
Header
my ($this_date,$week_day,$img_width,$top_day);
foreach $get_max (%day) {
  $top_day = $day{$get_max} if  ($day{$get_max} > $top_day);
}
$top_day = 1 if ($top_day==0);
foreach $key (sort keys %day) {
($this_date,$week_day) = split(/ /,$key);
$img_width = int($day{$key}*$max_bar_day_length/$top_day);
print "    <tr>\n";
if ($week_day eq "Sun") {
	print "      <td width=\"7%\" bgcolor=\"#F2FBFF\"><font color=#FF0000>$week_day</font> </td>\n";
	print "      <td width=\"17%\" bgcolor=\"#F2FBFF\">$this_date </td>\n";
	print "      <td width=\"7%\" bgcolor=\"#F2FBFF\">$day{$key}</td>\n";
	print "      <td width=\"69%\" bgcolor=\"#FFFAF4\"><img src=\"$gif_url/red.gif\" width=$img_width height=10></td>\n";
}
elsif ($week_day eq "Sat") {
	print "      <td width=\"7%\" bgcolor=\"#F2FBFF\"><font color=#993399>$week_day</font> </td>\n";
	print "      <td width=\"17%\" bgcolor=\"#F2FBFF\">$this_date </td>\n";
	print "      <td width=\"7%\" bgcolor=\"#F2FBFF\">$day{$key}</td>\n";
	print "      <td width=\"69%\" bgcolor=\"#FFFAF4\"><img src=\"$gif_url/gold.gif\" width=$img_width height=10></td>\n";
}
else {
	print "      <td width=\"7%\" bgcolor=\"#F2FBFF\">$week_day </td>\n";
	print "      <td width=\"17%\" bgcolor=\"#F2FBFF\">$this_date </td>\n";
	print "      <td width=\"7%\" bgcolor=\"#F2FBFF\">$day{$key}</td>\n";
	print "      <td width=\"69%\" bgcolor=\"#FFFAF4\"><img src=\"$gif_url/blue.gif\" width=$img_width height=10></td>\n";
}
print "    </tr>\n";
}
$img_width = int($hits_per_day*$max_bar_day_length/$top_day);
print "   <tr>\n      <td width=\"7%\" bgcolor=\"#F2FBFF\">&nbsp;</td>\n";
print "      <td width=\"17%\" bgcolor=\"#F2FBFF\"><b>Days: $total_days</b></td>\n";
print "      <td width=\"7%\" bgcolor=\"#F2FBFF\"><b>$total</b></td>\n";
print "      <td width=\"69%\" bgcolor=\"#FFFAF4\"><img src=\"$gif_url/brown.gif\" width=$img_width height=10> $hits_per_day</td>\n";
print "    </tr>\n  </table>\n  <hr size=1 width=$table_width><br>\n";
}

sub http_ref {
print <<Header ;
  <br>
  <b><font face="Arial, Helvetica, sans-serif" size="3">Referer<a name="referer"></a><br>
  <br>
  </font></b>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="2" bgcolor="#FAFAF5" align="center">
    <tr bgcolor="#DDDDE8">
      <td width="8%"><b>Visits</b></td>
      <td width="10%"><b>Percent</b></td>
      <td width="82%"><b>Referer</b></td>
    </tr>
Header
my $percent;
foreach $refer (sort sort_ref keys %referer) {
      if ($referer{$refer} >= $referer_min) {
      	$percent = sprintf ("%.2f",($referer{$refer}/$total*100));
	print "    <tr>\n      <td width=\"8%\">$referer{$refer} </td>\n      <td width=\"10%\">$percent\% </td>\n";
	if ($refer eq "-") {
	  print "      <td width=\"82%\">NO REFERER</td>\n    </tr>\n";
	}
	else {
	  print "      <td width=\"82%\">$refer</td>\n    </tr>\n";
	}
      }
      else {
        last;
      }
}
print "  </table>\n  <hr size=1 width=$table_width>\n  <br>\n";
}

sub html_week {
print <<Header ;
  <font face="Arial, Helvetica, sans-serif" size="3"><b><br>
  Visits by week-day<a name="week-day"></a> <br>
  <br>
  </b></font>
  <table border="0" cellspacing="1" cellpadding="2" width="$table_width" bgcolor="#FDFDF4" align="center">
    <tr>
      <td width="14%">Monday</td>
      <td width="14%">Tuesday</td>
      <td width="15%">Wednesday</td>
      <td width="15%">Thursday</td>
      <td width="14%">Friday</td>
      <td width="14%"><font color="#009900">Saturday</font></td>
      <td width="14%"><font color="#FF0000">Sunday</font></td>
    </tr>
    <tr>
      <td width="14%"><b>$week_days{"Mon"}</b></td>
      <td width="14%"><b>$week_days{"Tue"}</b></td>
      <td width="15%"><b>$week_days{"Wed"}</b></td>
      <td width="15%"><b>$week_days{"Thu"}</b></td>
      <td width="14%"><b>$week_days{"Fri"}</b></td>
      <td width="14%"><b>$week_days{"Sat"}</b></td>
      <td width="14%"><b>$week_days{"Sun"}</b></td>
    </tr>
  </table>
  <hr width="$table_width" size="1">
  <br>
Header
}

sub html_remote_host {
print <<EOM ;
  <b><font face="Arial, Helvetica, sans-serif" size="3"><br>Hostname<a name="host"></a><br><br>
  </font></b>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="3" bgcolor="#F7F7F7" align="center">
    <tr bgcolor="#DDDDE8">
      <td width="30%"><b>Hostname</b></td>
      <td width="8%">&nbsp;</td>
      <td width="62%">&nbsp;</td>
    </tr>
EOM
my $flag=0;
my $i=0;
my $num=0;
my ($top_pos,$img_width,$percent);
foreach $show_host (sort sort_host keys %remote) {
  $top_pos = $remote{$show_host} if ($flag == 0);
  $num++;
  $i++;
  if ($remote{$show_host} >= $host_min) {
    $img_width = int($remote{$show_host}*$max_bar_length/$top_pos);
    $percent = sprintf ("%.2f",($remote{$show_host}/$total*100));
    print "    <tr>\n      <td width=30%>$num) $show_host</td>\n";
    print "      <td width=8%>$remote{$show_host}</td>\n";
    print "      <td width=62%><img src=\"$gif_url/$gif_array[$i-1].gif\" width=$img_width height=10> $percent\%</td>\n";
    print "    </tr>\n";
  }
  else {
    last;
  }
  $i=0 if ($i>=10);
  $flag=1;
}
print "  </table>\n  <hr width=$table_width size=1>\n  <br>\n";
}

sub html_browser {
print <<EOM ;
  <b><font face="Arial, Helvetica, sans-serif" size="3"><br>
  Browser<a name="browser"></a><br><br>
  </font></b>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="3" bgcolor="#F4F4FF" align="center">
    <tr bgcolor="#DDDDE8">
      <td width="30%"><b>Browser</b></td>
      <td width="8%">&nbsp;</td>
      <td width="62%">&nbsp;</td>
    </tr>
EOM
my $flag=0;
my $i=0;
my $num=0;
my ($top_pos,$img_width,$percent);
foreach $brow (sort { $browser{$b} <=> $browser{$a} } keys %browser) {
  $top_pos = $browser{$brow} if ($flag == 0);
  $num++;
  $i++;
  if ($browser{$brow} >= $browser_min) {
    $img_width = int($browser{$brow}*$max_bar_length/$top_pos);
    $percent = sprintf ("%.2f",($browser{$brow}/$total_agent*100));
    print "    <tr>\n      <td width=30%>$num) $brow</td>\n";
    print "      <td width=8%>$browser{$brow}</td>\n";
    print "      <td width=62%><img src=\"$gif_url/$gif_array[$i-1].gif\" width=$img_width height=10> $percent\%</td>\n";
    print "    </tr>\n";
  }
  else {
    last;
  }
  $i=0 if ($i>=10);
  $flag=1;
}
print "  </table>\n  <hr width=$table_width size=1>\n  <br>\n";
}

sub os_system {
print <<EOM ;
  <b><font face="Arial, Helvetica, sans-serif" size="3"><br>
  Operating System<a name="os"></a><br>
  <br>
  </font></b>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="3" bgcolor="#FAFAF5" align="center">
    <tr bgcolor="#DDDDE8">
      <td width="30%"><b>Operating System</b></td>
      <td width="8%">&nbsp;</td>
      <td width="62%">&nbsp;</td>
    </tr>
EOM
my $flag=0;
my $i=0;
my $num=0;
my ($top_pos,$img_width,$percent);
foreach $os_sys (sort { $os{$b} <=> $os{$a} } keys %os) {
  $top_pos = $os{$os_sys} if ($flag==0);
  $num++;
  $i++;
  if ($os{$os_sys} >= $os_min) {
    $img_width = int($os{$os_sys}*$max_bar_length/$top_pos);
    $percent = sprintf ("%.2f",($os{$os_sys}/$total_agent*100));
    print "    <tr>\n      <td width=30%>$num) $os_sys</td>\n";
    print "      <td width=8%>$os{$os_sys}</td>\n";
    print "      <td width=62%><img src=\"$gif_url/$gif_array[$i-1].gif\" width=$img_width height=10> $percent\%</td>\n";
    print "    </tr>\n";
  }
  else {
    last;
  }
  $i=0 if ($i>=10);
  $flag=1;
}
print "  </table>\n  <hr width=$table_width size=1>\n  <br>\n";
}

sub countries {
print <<EOM ;
  <b><font face="Arial, Helvetica, sans-serif" size="3"><br>
  Top Countries<a name="domain"></a><br>
  <br>
  </font></b>
  <table width="$table_width" border="0" cellspacing="0" cellpadding="3" bgcolor="#FFF7F2" align="center">
    <tr bgcolor="#DDDDE8">
      <td width="30%"><b>Top Countries</b></td>
      <td width="8%">&nbsp;</td>
      <td width="62%">&nbsp;</td>
    </tr>
EOM
my $show=0;
my $i=0;
my $num=0;
my ($top_pos,$img_width,$percent);
if (scalar keys %domain) {

foreach $tmp_country (%domain) {
  $top_pos = $domain{$tmp_country} if ($domain{$tmp_country}) > $top_pos;
}
if ($top_pos==0) {
  $top_pos=1;
} elsif ($top_pos>0 && $top_pos<($total-$total_doms)) {
  $top_pos=($total-$total_doms);
}
foreach $country (sort {$domain{$b} <=> $domain{$a}} keys %domain) {
  $num++;
  $i++;
  if (($show_ccodes ne "yes" && $show < $show_max) || $show_ccodes eq "yes") {
    $img_width = int($domain{$country}*$max_bar_length/$top_pos);
    $percent = sprintf ("%.2f",($domain{$country}/$total*100));
    print "    <tr>\n      <td width=30%>$num) $CCodes{$country} ($country)</td>\n";
    print "      <td width=8%>$domain{$country}</td>\n";
    print "      <td width=62%><img src=\"$gif_url/$gif_array[$i-1].gif\" width=$img_width height=10> $percent\%</td>\n";
    print "    </tr>\n";
  }
  else {
    $remain += $domain{$country};
  }
  $i=0 if ($i>=10);
  $show++;
}

if ($show_ccodes ne "yes") {
  $percent = sprintf ("%.2f",($remain/$total*100));
  $img_width = int($remain*$max_bar_length/$top_pos);
  print "    <tr>\n      <td width=30%>others</td>\n";
  print "      <td width=8%>$remain</td>\n";
  print "      <td width=62%><img src=\"$gif_url/$gif_array[9].gif\" width=$img_width height=10> $percent\%</td>\n";
  print "    </tr>\n";
}

}
else {
	$top_pos=$total;
}

$ip_only = ($total - $total_doms);
$percent = sprintf ("%.2f",($ip_only/$total*100));
$img_width = int($ip_only*$max_bar_length/$top_pos);
print "    <tr>\n      <td width=30%>Unknown</td>\n";
print "      <td width=8%>$ip_only</td>\n";
print "      <td width=62%><img src=\"$gif_url/brown.gif\" width=$img_width height=10> $percent\%</td>\n";
print "    </tr>\n";
print "  </table>\n  <hr width=$table_width size=1>\n  <br>\n";
}

sub hours {
foreach $tmp_hour (%hour) {
  $top_hour = $hour{$tmp_hour} if ($hour{$tmp_hour} > $top_hour);
}
$top_hour = 1 if ($top_hour==0);
print <<Header ;
 <font face="Arial, Helvetica, sans-serif" size="3"><b>Visits by hour<a name="hour"></a><br><br></b></font>
 <table border="0" cellspacing="0" cellpadding="1" align="center" width="$table_width" bgcolor="#F4F4FF">
  <tr>
    <td width="5">&nbsp;</td>
Header
my $max_height=200;
for ($hour_i=0;$hour_i<24;$hour_i++) {
  $pad=$hour_i;
  $pad="0$pad" if ($pad<10);
  $img_height=int(($hour{$pad} * $max_height)/$top_hour);
  $img_height=1 if ($img_height==0);
  print "    <td width=25 align=center valign=bottom>\n";
  print "      <img src=\"$gif_url/h_green.gif\" width=15 height=$img_height></td>\n";
}
print "  </tr>\n  <tr>\n    <td colspan=26>\n      <div align=right><img src=\"$gif_url/black.gif\" width=$table_width height=1></div>\n    </td>\n  </tr>\n";
print "  <tr>\n    <td>Hour</td>\n";
my ($hour_j);
for ($hour_j=0;$hour_j<24;$hour_j++) {
  $pad_hour=$hour_j;
  $pad_hour="0$pad_hour" if ($pad_hour<10);
  print "    <td>$pad_hour\h</td>\n";
}
print "  </tr>\n  <tr>\n    <td>Visits</td>\n";
for ($val=0;$val<24;$val++) {
  $pad_val=$val;
  $pad_val="0$pad_val" if ($pad_val<10);
  $hits=sprintf("%.1f",($hour{$pad_val}/$total_days));
  print "    <td>\n      <div align=center>$hits</div>\n    </td>\n";
}
print "  </tr>\n  </table>\n  <br>\n";
}

