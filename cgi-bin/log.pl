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

# url to the image file
$output = "http://sanrafaellate.com.ar/advstats/log.gif";

# path to the log files from the server root without trailing "/" (chmoded to 777 (drwxrwxrwx))
$base_dir = "../advstats/logfiles";

# server time offset - add one hour = +1 ; subtract one hour = -1
$offset = 0;

# Ignored IPs - Comment it out if you don't use it e.g. #@skip=('127.0.0.1');
@skip=('127.0.0.1');

# log file extension
$log_file_ext = "txt";

# IP log file - 666 (-rw-rw-rw-)
$ip_file = "ip.log";

# time (in min) to keep visitor IP in table (ip blocking)
$ip_time = 15;

# Done
###########

$check=0;

sub check_ip {

  open(FILE,"$ip_file");
  my @lines = <FILE>;
  close(FILE);
  my $found = 0;
  my $this_time = time();

  open(TABLE,">$ip_file");
  foreach $visitor (@lines) {
    ($ip_addr,$time_stamp) = split(/\|/,$visitor);
    if ($this_time < $time_stamp+(60*$ip_time)) {
      if ($ip_addr eq $ENV{'REMOTE_ADDR'}) {
        $found=1;
      } else {
        print TABLE "$ip_addr|$time_stamp";
      }
    }
  }
  print TABLE "$ENV{'REMOTE_ADDR'}|$this_time\n";
  close(TABLE);
  return $found;
}

sub parse_ref {

  my $query = $ENV{'QUERY_STRING'};
  ($value, $referer) = split(/=/, $query);
  if ($referer) {
    if ($referer =~ /(http:\/\/.*\.[a-z]{2,4}\/)/i) {
      $referer = $1;
    }
  } else {
     $referer = "-";
  }
}

sub write_log {

  my @months = ('January','February','March','April','May','June','July','August','September','October','November','December');
  my @days = ('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
  my ($min,$hour,$mday,$mon,$year,$wday) = (localtime(time+($offset*3600)))[1,2,3,4,5,6];

  $min = "0$min" if ($min < 10);
  $hour = "0$hour" if ($hour < 10);
  $mday = "0$mday" if ($mday < 10);
  $year += 1900;
  $month = $mon+1;
  $month = "0$month" if ($month < 10);

  my $logdat = "$base_dir/$month-$year\.$log_file_ext";
  my $this_day = ("$days[$wday] $mday-$months[$mon]-$year $hour:$min");

  open(DATA,">>$logdat");
  print DATA ("$this_day - $host - \"$ENV{'HTTP_USER_AGENT'}\" - \"$referer\"\n");
  close (DATA);
}

sub get_host {

  my ($ip_address,$ip_number,@numbers);
  if ($ENV{'REMOTE_HOST'}) {
    $host = $ENV{'REMOTE_HOST'};
  } else {
    $ip_address = $ENV{'REMOTE_ADDR'};
    @numbers = split(/\./, $ip_address);
    $ip_number = pack("C4", @numbers);
    $host = (gethostbyaddr($ip_number, 2))[0];
  }
  if ($host eq "") {
    $host = "$ENV{'REMOTE_ADDR'}";
  }
}

if (@skip) {
  foreach $ips (@skip) {
    if($ENV{'REMOTE_ADDR'} =~ /$ips/) {
      $check = 1;
      last;
    }
  }
}

$check = &check_ip if ($check==0);

if ($check == 0) {
  &get_host();
  &parse_ref();
  &write_log();
}

print "Location: $output\n\n";
exit (0);
