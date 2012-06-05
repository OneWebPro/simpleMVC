<?php
/**
 * Created by IntelliJ IDEA.
 * User: loki
 * Date: 16.04.12
 * Time: 08:17
 *
 */

/*Class check if variables are of good type and length*/
class ValueCheck
{
    /**
     *
     */
    function __construct()
    {
    }

    function __destruct()
    {
    }

   /**Method check a type and length variable
    *@param array $valueArr array with variable, name and value
    *@param array $typeArr  array with type of variable, name and value
    *@return bool*/
    public static function isGoodType($valueArr, $typeArr){
          $key = key($valueArr);
          $prefLength = intVal(preg_replace("/[^0-9]/", '', $typeArr[$key]));  /*Get length of variable*/
          $type = preg_replace("/[^A-Za-z]/", '', $typeArr[$key]);       /*Get type of variable*/
          $value =$valueArr[$key];      /*Get varieble*/

         /*Check if is empty*/
        if(count($value) != 0 && $value != ''){
                //echo $type." ".$value."<br />";
             switch($type){
                 case "int":
                     if(is_numeric($value)){
                           return true;
                     }
                     else
                         return false;
                     break;
                 case "varchar":
                     if(is_string($value)){
                         if(count($value) <= $prefLength){
                         return true;
                         }
                     }
                     else
                         return false;
                     break;
                 case "decimal":
                     if(is_double($value)){
                         return true;
                     }
                     else
                         return false;
                     break;
             }
        }
            return false;
    }

    /**Return PDO::PARAM type
     * @static
     * @param array $valueArr array with variable, name and value
     * @param array $typeArr  array with type of variable, name and value
     * @return mixed
     */
    public static function  showPDOType($valueArr, $typeArr){
        $key = key($valueArr);
        $type = preg_replace("/[^A-Za-z]/", '', $typeArr[$key]);       /*Get type of variable*/
        $value =$valueArr[$key];      /*Get varieble*/

        if(count($value) != 0 && $value != ''){
            switch($type){
                case "int":
                    if(is_numeric($value)){
                        return PDO::PARAM_INT;
                    }
                    else
                        return false;
                    break;
                case "varchar":
                    if(is_string($value)){
                        return PDO::PARAM_STR;
                    }
                    else
                        return false;
                    break;
                case "decimal":
                    if(is_double($value)){
                       return PDO::PARAM_STR;
                    }
                    else
                        return false;
                    break;
            }
        }

    }
}