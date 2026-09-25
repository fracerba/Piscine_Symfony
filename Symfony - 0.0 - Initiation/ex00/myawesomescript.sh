if [[ -n $1 && -z $2 ]]; then
	curl -sI "$1" | grep -ioP 'location:\s*\K.+(?=/)'
fi