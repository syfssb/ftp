
# Get the aliases and functions
if [ -f ~/.bashrc ]; then
	. ~/.bashrc
fi

# User specific environment and startup programs

#PATH=$PATH:$HOME/bin
PATH=.:$HOME/bin:$PATH

export PATH
unset USERNAME

export LANG=zh_CN.UTF-8
export LANGUAGE=zh_CN.UTF-8
export TERM=linux #for color vim
export SVN_EDITOR=vi
#export CDPATH=.:$HOME:$HOME/bin:$HOME/www:$HOME/www/newmaint:$HOME/tmp

stty erase ^H

# some more ls aliases
alias ll='ls -atlr'
alias la='ls -A'
alias lf='ls -CF'
alias l='ls -l'

alias isql='/opt/lampp/bin/mysql exchangedb -exchange -pexchange2016'
#alias svnz='svn ci --username=zmx --password=zmx'

cat $HOME/.readme
echo -e "时间: "`date +%Y/%m/%d' '%T`
echo -e "\n"