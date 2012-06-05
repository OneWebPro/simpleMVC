<?php
/**
 * Created by IntelliJ IDEA.
 * User: loki
 * Date: 24.04.12
 * Time: 22:44
 *
 */
class AdminController  extends TemplateControll
{

    /**
     *Constructor login user
     */
    function __construct()
    {

        if(isset($_POST["login"])&& isset($_POST["password"])){
            $_POST["password"] = md5($_POST["password"]);

            $usr = new UserModel();
            $usr = $usr->getQueryObject("SELECT * FROM user WHERE login =".ApplicationDB::connectDB()->quote(HTMLManager::cleanInput($_POST["login"])));
            if($usr->password == $_POST["password"]){
                unset($_POST["password"]);
                unset($_POST["login"]);
                Application::sendSessionModel($usr);}}

          if(Application::isGuest()){
        $this->renderIndex();}
        else{
            if(Application::isAdmin()){
         $this->panelRender();
            }
        }
    }

    function __destruct()
    {
        parent::__destruct();
    }

    protected function afterRender()
    {
       parent::afterRender();
    }



    protected function beforeRender()
    {
        parent::beforeRender();

    }

    /**
    *Render Administration panel
    */
    public function panelRender()
    {
       parent::generateModels();
       parent::generateControllers();

        unset($_GET["url"]);

        if(sizeof($this->controllers) <= 0){
            $_SESSION["title"] = "- Admin";
        $this->render("panel");}
    }


    public function configRender()
    {
        $_SESSION["title"] = "- Admin - Konfiguracje";
        $this->render("config");
    }

    public function userRender()
    {
        $_SESSION["title"] = "- Admin - Użytkownicy";
        $this->render("user");
    }

    public function tematyRender()
    {
        $_SESSION["title"] = "- Admin - Tematy";
        Application::makeActualLink();
        $this->render("tematy");
    }

    public function wiadomosciRender()
    {
        $_SESSION["title"] = "- Admin - Wiadomości";
        $this->render("wiadomosci");
    }

    public function kategorieRender()
    {
        $_SESSION["title"] = "- Admin - Kategorie";
        $this->render("kategorie");
    }

    public function configurationsaveRender()
    {
        $conf = new Configuration();
        $conf->setDateFormat($_POST["date"]);
        $conf->setTimeZone($_POST["zone"]);
        $conf->setTimeFormat($_POST["time"]);
        $conf->setTemplate($_POST["template"]);
        $conf->save();

        echo  json_encode(array('messages'=>"Zapisano ustawienia"));
    }

}
