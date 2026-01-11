#!/bin/bash
set -e

for dir in $(ls -1)
do
	echo "cat $dir"
	cat $dir
	echo
done
