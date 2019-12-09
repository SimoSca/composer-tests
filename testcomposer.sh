# Composer disable by default XDEBUG, so I have to force it for debugging packages
export COMPOSER_ALLOW_XDEBUG=1

./composer.phar update $@


# see all config (composer default and what in ~/.composer/config.json || or in COMPOSER_HOME/config.json]
# ./composer.phar config --list --file=./config.json
# Priorita':
# di default legge le impostazioni "config" dentro al composer.json, se non c'e' allora legge quelle in COMPOSER_HOME/config.json
# se invece specifico --file=./config.json allora usa quelle nel file

# Nota: in ogni caso fa un merge con il COMPOSER_HOME/config.json, se poi entrambi (il composer.json|--file=... e il COMPOSER_HOME/config.json)
# hanno la stessa chiave, allora quella di COMPOSER_HOME/config.json viene sovrascritta dalla chiave locale ( composer.json|--file=... )