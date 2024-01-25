@echo off
%time% = date /T 
git pull
git add *
git commit -m  %time%
git push