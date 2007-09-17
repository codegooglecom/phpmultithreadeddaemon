<?php

error_reporting(E_ALL);

require_once 'include/class.MTDaemon.php';

class MTTest extends MTDaemon {

    public function getNext($slot)
    {
        $num = $this->getVar('num');
        if ($num == null) $num = 1;

        
        $rand = rand();
        echo 'Next for slot ' . $slot . ' : ' . $rand . "\n";
        return null;
        return $rand;
    }

    public function run($next, $slot)
    {
        $rand = rand(0, 100);
        $this->lock();
        $num = $this->getVar('num');
        $this->setVar('num', $this->getVar('num') + 1);
        $this->unlock();
        echo '## Iteration #' . number_format($num) . ' in ' . $rand . 'sec' . "\n";
        
        usleep($rand);
        return 0;
    }

}

$mttest = new MTTest(8);
$mttest->handle();

?>
