#!/bin/bash
for adir in `ls -w1`
do
  if [ -d $adir ]
  then
    cd $adir
    echo "$adir"
    for afile in `ls -w1 thumb*`
    do
      if [ -f $afile ]
      then
        convert -quality 75 $afile $afile
      fi
    done
    cd ..
  fi
done
