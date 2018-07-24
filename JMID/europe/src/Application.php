<?php

    use App\AbstractApplication;
    use Human\Human;
    use Human\President;
    use Human\Commissioner;
    use Human\VicePresident;
    use Human\Bodyguard;
    use Date\Date;
    use Commission\Commission;
    use Address\Address;
    use Venue\Venue;
    use Symfony\Component\VarDumper\Cloner\Data;

    if(isset($_POST['human']))
    {

        var_dump ($_POST);

        try
        {
            echo '<pre>';
                var_dump(Human::fromArray($_POST['human']));
            echo '</pre>';
        }
        catch(RuntimeException $e)
        {
            echo '<p>An error occured, please contact the administrator.<br>
            '. $e .'</p>';
        }

    }

    /**
     * This class is the main application. You will overwrite the "run" method to implement your code
     *
     * @author matthieu vallance <matthieu.vallance@vesperiagroup.com>
     */
    class Application extends AbstractApplication
    {
        /**
         * Run
         *
         * Execute the request process
         *
         * @return string|NULL
         */
        protected function run() : ?string
        {
            $req = $this->getRequest();
            if ($req->getMethod()=='POST') {
                $date = new Date();
                $date->setDay($req->request->get('day'));
                $date->setMonth($req->request->get('month'));
                $date->setYear($req->request->get('year'));
                return json_encode($date);
            }else{  return "
                <form method='post'>
                <label for 'day'>day </label>
                <input type='number' name='day'>
                
                <label for 'month'>month </label>
                <input type='number' name='month' >
                
                <label for 'year '>year </label>
                <input type='number' name='year' >
                
                <button type = 'submit'>Submit</button>
                </form>
                
                ";
            }
           
        }

    }

?>



