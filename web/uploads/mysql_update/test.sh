#!/bin/sh  
for i in `ls -a`  
do  
echo "$i"  

mysql -uroot -p1234 bpcms_page < $i

done  