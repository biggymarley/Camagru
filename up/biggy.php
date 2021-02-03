<?php
/*_|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|
 * ___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|__
 * _|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|
 * ___|___|___|___|___|__   AUTHOR: ANAS RCHID  ___|___|___|___|___|___|_
 * _|___|___|___|___|___| CREATED: 11 Dec 2017  |___|___|___|___|___|___|
 * ___|___|___|___|___|__  UPDATE: 18 Dec 2017  __|___|___|___|___|___|__
 * _|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|
 * ___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|__
 * _|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|
 * ___  DESCRIPTION: Implementation de kNN avec plusieurs facteurs  __|__
 * _|___|___|___|_   et chaque facteur a un poids different.  __|___|___|
 * ___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|__
 * _|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|
 * ___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|__
 * _|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|___|
 */

/**
 * This file is intended to show how the process of finding a neart neighbor 
 * using kNN is done.
 *
 * @package     kNN
 * @description testing.. 
 * @author      0x0584 <rchid.anas@gmail.com>
 */

/**
 * Functions to handle pattern recognition using k-NN algorithm 
 *
 * @package     kNN
 * @description this file has functions like `getdata`, `list_neighbors` 
 *              up to `find_nn` which returns the guessed type.
 * @author      0x0584 <rchid.anas@gmail.com>
 */
require_once 'funcs.php';

/**
 * Input:
 *
 * take the $k-elements from a given $data set in order to find the $type
 * of a $mystery_element. 
 * * * * * * * * * * * * * * * * * * */

$k = 3;                         /* le nombre des elements proche */
$dataset = getdata();           /* les donnees */

/* l'element mystere que on veut deduire son type */
$mystery_element = new DataPiece('?',           /* le type inconnue */
                                 array(180, 82)); /* les facteurs */

/**
 * Process:
 *
 * find how much the $mystery_element is far from other elements of the
 * $data set. then, get $k-neighbors based on the higest distance. the
 * we determine the $type that is more likely 
 * * * * * * * * * * * * * * * * * * */

/* les resultat des calcules */
$results = compute_results($mystery_element, $dataset);

/* list des elements les plus proches dans la base de donnee */
$neighbors = list_neighbors($results, $k);

/* on deduit le type */
$type = find_nn($mystery_element, $dataset, $k);

/**
 * Output: 
 *
 * showing how the process goes.. 
 * * * * * * * * * * * * * * * * * * */

echo "liste des elements".BR.BR.implode(BR, $dataset).BR;
echo HR;
echo "l'element que nous voulons connaitre son type $mystery_element".BR;

echo HR."les results des calcules".BR.BR;
foreach ($results as $r) {
    echo $r['type']." | ".$r['distance'].BR;
}
echo HR;
echo "liste des $k-neighbors les plus proche: ".implode(', ', $neighbors);
echo HR;
echo "son type est fort probable: ". implode(", ", $type);
echo HR;
?>
