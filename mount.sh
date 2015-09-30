#!/usr/bin/env bash

# node_modules
[ ! -d ~/mount/real-time-chat/node_modules ] && mkdir -p ~/mount/real-time-chat/node_modules
[ ! -d ./node_modules ] && mkdir -p ./node_modules
sudo mount --bind ~/mount/real-time-chat/node_modules ./node_modules
