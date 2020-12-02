#!/bin/bash
input="day2data.txt"
IFS='- :'
i=0
while read -r posone postwo char passwd
do
    # printf 'pos1: %s, pos2: %s, char: %s, pwd: %s\n' "$posone" "$postwo" "$char" "$passwd"
    pos1=$((posone-1)) #Adjust for 1-indexed data
    pos2=$((postwo-1)) #Adjust for 1-indexed data
    printf 'pos1: %s, pos2: %s, char: %s, pwd: %s\n' "$pos1" "$pos2" "$char" "$passwd"
    if ([ "${passwd:$pos1:1}" = $char ] || [ "${passwd:$pos2:1}" = $char ]) && [ "${passwd:$pos2:1}" != "${passwd:$pos1:1}" ]
    then
      #  echo "match!"
        i=$((i+1))
    fi
echo $i
done < "$input"