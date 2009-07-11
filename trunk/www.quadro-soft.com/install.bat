
@SET DBNAME=quadrosoft
@SET DBUSER=quser
@SET DBPASS=hArt2krtYB

@ECHO #############################################################
@ECHO #                                                           #
@ECHO #                                                           #
@ECHO #                   Install project script                  #
@ECHO #                     version: beta 1.1                     #
@ECHO #                                                           #
@ECHO #                Powered by Andrey Kotlyarov                #
@ECHO #                                                           #
@ECHO #                                                           #
@ECHO #############################################################
@ECHO #

@ECHO # Create database: %DBNAME%
@ECHO # Username: %DBUSER%
@ECHO # Password: %DBPASS%
@ECHO #
@mysql -u%DBUSER% -p%DBPASS% -e "DROP SCHEMA IF EXISTS %DBNAME%;"
@mysql -u%DBUSER% -p%DBPASS% -e "CREATE SCHEMA %DBNAME% DEFAULT CHARACTER SET utf8;"

@ECHO # Delete old sql files
@ECHO #
@del .\data\sql\*.sql
@del .\data\sql\sqldb.map

@php symfony cache:clear

@php symfony propel:build-model
@php symfony propel:build-forms
@php symfony propel:build-filters
@php symfony propel:build-sql
@php symfony propel:insert-sql
@php symfony propel:data-load

@php symfony cache:clear
