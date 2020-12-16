<?php
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\Test;

class WorldSkillsPrinter extends PHPUnit\TextUI\ResultPrinter {
    private $results = [];

    protected function printFooter(TestResult $result): void
    {
        parent::printFooter($result);

        $this->write("\n\n\n");
        $this->writeWithColor('fg-black, bg-green', '------------       RESULT       ------------');
        $this->write("\nSummary:\n");

        foreach ($this->results as $key => $tests) {
            $this->writeWithColor('bold', '  ' . $key . ': ', false);

            $status = 'ok';

            foreach ($tests as $method => $result) {
                if ($result['main'] === false) {
                    $status = 'failed';
                }
            }

            if ($status === 'ok') {
                $this->writeWithColor('fg-green', 'ok, full points');
            } else if ($status === 'failed') {
                $this->writeWithColor('fg-red', 'failed, 0 points');
            }

            foreach ($tests as $method => $result) {
                $this->write('    ' . $method . ': ');

                if ($result['main'] === false) {
                    $this->write("failed\n");
                } else if ($result['main'] === true) {
                    $this->write("ok\n");
                } else {
                    $this->write("unkown\n");
                }
            }
        }

        $this->write("\n(scroll up to see the raw output of phpunit)\n");

        $this->write("\n\n");
    }

    public function endTest(Test $test, float $time): void
    {
        $info = \PHPUnit\Util\Test::describe($test);
        $category = substr($info[1], 4, 3);

        if (!isset($this->results[$category])) {
            $this->results[$category] = [];
        }

        if (!isset($this->results[$category][$info[1]])) {
            $this->results[$category][$info[1]] = [];
        }

        $this->results[$category][$info[1]]['main'] = !$this->lastTestFailed;

        parent::endTest($test, $time);
    }
}
