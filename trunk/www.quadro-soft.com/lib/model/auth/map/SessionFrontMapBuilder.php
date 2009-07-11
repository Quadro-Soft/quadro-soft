<?php


/**
 * This class adds structure of 'session_front' table to 'propel' DatabaseMap object.
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
class SessionFrontMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.auth.map.SessionFrontMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(SessionFrontPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(SessionFrontPeer::TABLE_NAME);
		$tMap->setPhpName('SessionFront');
		$tMap->setClassname('SessionFront');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('SESS_COO', 'SessCoo', 'CHAR', true, 32);

		$tMap->addColumn('SESS_DATA', 'SessData', 'LONGVARCHAR', true, null);

		$tMap->addColumn('SESS_TIME', 'SessTime', 'INTEGER', true, 11);

	} // doBuild()

} // SessionFrontMapBuilder
