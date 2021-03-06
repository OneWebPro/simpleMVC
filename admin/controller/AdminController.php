<?php
/**
 * Created by IntelliJ IDEA.
 * User: loki
 * Date: 24.04.12
 * Time: 22:44
 *
 */
class AdminController extends AdminManager
{

    /**
     *Constructor login user
     */
    function __construct()
    {
          parent::__construct();

    }

    /**
     *Render Administration panel
     */
    public function panelAction()
    {
        parent::generateModels();
        parent::generateControllers();

        if (sizeof($this->controllers) <= 0) {
            $_SESSION["title"] = "- AdminC";
            $this->render("panel");
        }
    }


    public function configAction()
    {
        $_SESSION["title"] = "- AdminC - Konfiguracje";
        $this->render("config");
    }

    public function userAction()
    {
        $_SESSION["title"] = "- AdminC - Użytkownicy";
        $this->render("user");
    }

    public function tematyAction()
    {
        $_SESSION["title"] = "- AdminC - Tematy";
        Application::makeActualLink();
        $this->render("tematy");
    }

    public function wiadomosciAction()
    {
        $_SESSION["title"] = "- AdminC - Wiadomości";
        $this->render("wiadomosci");
    }

    public function kategorieAction()
    {
        $_SESSION["title"] = "- AdminC - Kategorie";
        $this->render("kategorie");
    }

    public function configurationsaveAction()
    {
        $conf = new Configuration();
        $conf->setDateFormat($_POST["date"]);
        $conf->setTimeZone($_POST["zone"]);
        $conf->setTimeFormat($_POST["time"]);
        $conf->setTemplate($_POST["template"]);
        $conf->save();

        echo  json_encode(array('messages' => "Zapisano ustawienia"));
    }

}
