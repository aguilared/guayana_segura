


12-7-17

i-0bca8b43bb5a66913 Public DNS: ec2-34-229-201-249.compute-1.amazonaws.com

C:\aws> ssh -i "KEYAWS.pem" ubuntu@ec2-34-229-201-249.compute-1.amazonaws.com
Warning: Permanently added 'ec2-34-229-201-249.compute-1.amazonaws.com,34.229.201.249' (ECDSA) to the list of known hosts.
Welcome to Ubuntu 16.04.2 LTS (GNU/Linux 4.4.0-1020-aws x86_64)

 * Documentation:  https://help.ubuntu.com
 * Management:     https://landscape.canonical.com
 * Support:        https://ubuntu.com/advantage

  Get cloud support with Ubuntu Advantage Cloud Guest:
    http://www.ubuntu.com/business/services/cloud

0 packages can be updated.
0 updates are security updates.



The programs included with the Ubuntu system are free software;
the exact distribution terms for each program are described in the
individual files in /usr/share/doc/*/copyright.

Ubuntu comes with ABSOLUTELY NO WARRANTY, to the extent permitted by
applicable law.

To run a command as administrator (user "root"), use "sudo <command>".
See "man sudo_root" for details.  

ubuntu@ip-172-31-17-68:~$ sudo apt-get install locate
Reading package lists... Done
Building dependency tree
Reading state information... Done
The following NEW packages will be installed:
  locate
0 upgraded, 1 newly installed, 0 to remove and 0 not upgraded.
Need to get 51.1 kB of archives.
After this operation, 177 kB of additional disk space will be used.
Get:1 http://us-east-1.ec2.archive.ubuntu.com/ubuntu xenial/universe amd64 locate amd64 4.6.0+git+20160126-2 [51.1 kB]
Fetched 51.1 kB in 0s (2,051 kB/s)
Selecting previously unselected package locate.
(Reading database ... 51032 files and directories currently installed.)
Preparing to unpack .../locate_4.6.0+git+20160126-2_amd64.deb ...
Unpacking locate (4.6.0+git+20160126-2) ...
Processing triggers for man-db (2.7.5-1) ...
Setting up locate (4.6.0+git+20160126-2) ...

