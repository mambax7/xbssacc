<?php declare(strict_types=1);

/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Programing specific definitions
 *
 * Constant definitions that are programming specific rather than
 * module or language specific
 *
 * @copyright (c) 2004, Ashley Kitson
 * @copyright     XOOPS Project https://xoops.org/
 * @license       GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author        Ashley Kitson http://akitson.bbcb.co.uk
 * @author        XOOPS Development Team
 * @package       SACC
 * @subpackage    Definitions
 * @version       1
 */

/**#@+
 * Constants for paths to sacc objects
 */

/**
 * cannot use dirname as it doesn't nest
 * define('SACC_DIR', $xoopsModule->dirname());
 */
define('SACC_DIR', 'xbssacc');
define('SACC_PATH', XOOPS_ROOT_PATH . '/modules/' . SACC_DIR);
define('SACC_URL', XOOPS_URL . '/modules/' . SACC_DIR);
/**#@-*/

/**
 * Function: Get the current module's configuration options
 *
 * Because SACC can be nested inside other modules the $xoopsModuleConfig
 * variable will be pointing to whatever module is currently in scope
 * We therefore need to retrieve the SACC options
 *
 * @return array Module config options
 * @version 1
 * @access  private
 */
function getSACCModConfigs()
{
    static $SACCModuleConfig;

    if (isset($SACCModuleConfig)) {
        return $SACCModuleConfig;
    }

    $module = XoopsModule::getByDirname(SACC_DIR);

    $configHandler = xoops_getHandler('config');

    $SACCModuleConfig = $configHandler->getConfigsByCat(0, $module->getVar('mid'));

    return $SACCModuleConfig;
}

/**#@+
 * Constants for configuration items
 *
 * $cfg is a copy of the SACC module config array
 */
$cfg = getSACCModConfigs();
if (isset($cfg)) {
    define('SACC_CFG_DEFCURR', $cfg['def_currency']);

    define('SACC_CFG_DEFORG', $cfg['def_org']);

    define('SACC_CFG_USEPRNT', $cfg['use_parent']);

    define('SACC_CFG_DECPNT', $cfg['dec_point']);
} else { //values assigned as backstop defaults
    /**
     * @ignore
     */

    define('SACC_CFG_DEFCURR', 'GBP');

    /**
     * @ignore
     */

    define('SACC_CFG_DEFORG', 0);

    /**
     * @ignore
     */

    define('SACC_CFG_USEPRNT', 0);

    /**
     * @ignore
     */

    define('SACC_CFG_DECPNT', 2);
}
/**#@-*/

/**#@+
 * Constants used to describe status of object
 */
define('SACC_RSTAT_ACT', 'Active');     //object is active and useable
define('SACC_RSTAT_DEF', 'Defunct');    //object is permanently suspended and not useable
define('SACC_RSTAT_SUS', 'Suspended');  //object is temporarily suspended from use
/**#@-*/

/**#@+
 * Constants used to define type of account. The actual descriptive
 * names for the account types are defined in the SACCACTP CDM code set
 */

define('SACC_ACTP_INCOME', 'INCOME');
define('SACC_ACTP_EXPENSE', 'EXPENS');
define('SACC_ACTP_ASSET', 'ASSET');
define('SACC_ACTP_LIABILITY', 'LIABIL');
define('SACC_ACTP_BANK', 'BANK');
define('SACC_ACTP_SUPPLIER', 'SUPPLY');
define('SACC_ACTP_CUSTOMER', 'CUSTOM');
define('SACC_ACTP_EQUITY', 'EQUITY');
define('SACC_ACTP_3RDPTY', '3RDPTY');
/**#@-*/

/**#@+
 * Constant defs for control account types
 * The descriptive names are defined in the SACCCNTL CDM code set
 * If you need to add more, then use a max of 4 characters as that is what
 * CDM code set is set to.
 */
define('SACC_CNTL_BANK', 'BANK'); //Current bank account
define('SACC_CNTL_OPEN', 'OPEN'); //Opening Balances
define('SACC_CNTL_ASST', 'ASST'); //Master Asset Account
define('SACC_CNTL_LIAB', 'LIAB'); //Master Liability Account
define('SACC_CNTL_EQUI', 'EQUI'); //Master Equity Account
define('SACC_CNTL_INCO', 'INCO'); //Master Income Account
define('SACC_CNTL_EXPE', 'EXPE'); //Master Expense Account
/**#@-*/

/**#@+
 * Constant defs for tables used by SACC
 */
define('SACC_TBL_ACC', 'sacc_ac');      //account table
define('SACC_TBL_ENTRY', 'sacc_entry'); //account entry
define('SACC_TBL_JOURN', 'sacc_journ'); //journal
define('SACC_TBL_ORG', 'sacc_org');     //organisation
define('SACC_TBL_BANK', 'sacc_bank');   //bank details
define('SACC_TBL_CTRL', 'sacc_ctrl');   //control account map
/**#@-*/

/**#@+
 * Other constant definitions
 */
define('SACC_DEF_CRCY', 'GBP'); //default system currency
/**#@-*/
