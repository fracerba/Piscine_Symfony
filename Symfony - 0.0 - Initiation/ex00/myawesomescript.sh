#!/bin/sh

if [ -n "$1" -a -z "$2" ]; then
	curl -sI "$1" | grep -ioP '^location:\s*\K.+(?=/\s*$)'
fi