<?php


/**
 * This class adds structure of 'account2credential' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 07/11/09 22:07:29
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.auth.map
 */
class Account2CredentialMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.auth.map.Account2CredentialMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(Account2CredentialPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(Account2CredentialPeer::TABLE_NAME);
		$tMap->setPhpName('Account2Credential');
		$tMap->setClassname('Account2Credential');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ACCOUNT_ID', 'AccountId', 'INTEGER' , 'account', 'ID', true, null);

		$tMap->addForeignPrimaryKey('CREDENTIAL_ID', 'CredentialId', 'INTEGER' , 'credential', 'ID', true, null);

	} // doBuild()

} // Account2CredentialMapBuilder
